<?php if ( ! defined('ABSPATH')) {
    die('Direct access forbidden.');
}

class Brizy_Public_Main
{

    /**
     * @var Brizy_Public_Main[]
     */
    static $instance = null;
    static $the_content_fitler_addded = false;

    /**
     * @var Brizy_Editor_Post
     */
    private $post;

	static $is_excerpt = false;

    /**
     * Brizy_Public_Main constructor.
     *
     * @param $post
     */
    private function __construct(Brizy_Editor_Entity $post)
    {

        $this->post = $post;
    }

    /**
     * @param Brizy_Editor_Entity $post
     *
     * @return Brizy_Public_Main
     */
    static public function get(Brizy_Editor_Entity $post = null)
    {
        if (self::$instance) {
            return self::$instance;
        }

        if ( ! $post) {
            throw new Exception('Unable to create Brizy_Public_Main instance with null post');
        }

        return self::$instance = new self($post);
    }

    static public function isInitialized() {
		return is_object( self::$instance );
	}public function initialize_wordpress_editor()
    {

        if (self::is_editing_page_without_editor( $this->post)) {
            add_action('admin_bar_menu', array($this, '_action_add_admin_bar_update_button'), 9999);
        }
    }

    public function initialize_front_end()
    {

        if (self::is_editing_page_with_editor( $this->post) && Brizy_Editor_User::is_user_allowed()) {
            // When some plugins want to redirect to their templates.
            remove_all_filters('template_redirect');
            add_filter('template_include', array($this, 'templateInclude'), 10000);

        } elseif (self::is_editing_page_with_editor_on_iframe( $this->post) && Brizy_Editor_User::is_user_allowed()) {
            remove_all_filters( 'template_redirect' );
			add_filter('template_include', array($this, 'templateIncludeForEditor'), 10000);
            add_filter('show_admin_bar', '__return_false');
            add_filter('body_class', array($this, 'body_class_editor'));
            add_action('wp_enqueue_scripts', array($this, '_action_enqueue_editor_assets' ), 9999);
            add_filter('the_content', array($this, '_filter_the_content' ), - 12000);
            add_action('brizy_template_content', array($this, '_action_the_content' ) );

            add_action( 'post_password_required', '__return_false' );
			$this->plugin_live_composer_fixes();

            /*
                The plugin https://wordpress.org/plugins/wp-copyright-protection/ loads a script js which disable the right click on frontend.
                Its purpose is to prevent users from copying the text from the site, a way to prevent copyright.
             */
            remove_action('wp_head', 'wp_copyright_protection');


        } elseif (self::is_view_page( $this->post)) {



            $this->preparePost();

			add_action( 'template_include', array( $this, 'templateIncludeForEditor' ), 10000 );
			remove_filter( 'the_content', 'wpautop' );
			// insert the compiled head and content
			add_filter( 'body_class', array( $this, 'body_class_frontend' ) );
			add_action( 'wp_head', array( $this, 'insert_page_head' ) );
			add_action( 'admin_bar_menu', array( $this, 'toolbar_link' ), 999 );
			add_action( 'wp_enqueue_scripts', array( $this, '_action_enqueue_preview_assets' ), 9999 );
			add_filter( 'the_content', array( $this, 'insert_page_content' ), - 12000 );
			add_action( 'brizy_template_content', array( $this, 'brizy_the_content' ) );
			//add_filter( 'get_the_excerpt', array( $this, 'start_excerpt' ), 0 );
			//add_filter( 'get_the_excerpt', array( $this, 'end_excerpt' ), 1000 );
			$this->plugin_live_composer_fixes();
		}
	$this->addTheContentFilters();
    }

    public static function libAggregator($libSet, $post, $callback = null, $isPro = false)
    {
        // get assets list
        $assets = [];

        if (isset($libSet['main'])) {
            $assets[] = $libSet['main'];
        }

        foreach ($libSet['generic'] as $style) {
            $assets[] = $style;
        }

        $selectors      = $libSet['libsSelectors'];
        $selectorsCount = count($selectors);

        if ($selectorsCount != 0) {
            $selectedLib = array_reduce(
                $libSet['libsMap'],
                function ($lib, $alib) use ($selectors, $selectorsCount) {
                    if ($lib) {
                        return $lib;
                    }

                    return count(array_intersect($alib['selectors'], $selectors)) == $selectorsCount ? $alib : null;
                }
            );

            if ($selectedLib) {
                $assets[] = $selectedLib;
            }
        }

        foreach ($assets as $i => $asset) {
            $asset['pro'] = $isPro;
            $assets[$i]   = $asset;
        }

        // get pro assets
        if ($callback) {
            $assets = $callback($assets, $post);
        }

        $assets = array_filter(
            $assets,
            function ($a) {
                return ! is_null($a);
            }
        );

        return $assets;
    }

    /**
     * @internal
     */
    function _action_add_admin_bar_update_button()
    {
        global $wp_admin_bar;

        $wp_admin_bar->add_menu(
            array(
                'id'    => Brizy_Editor::get_slug().'-post-preview-url',
                'title' => __('Preview'),
                'href'  => get_preview_post_link(),
                'meta'  => array(
                    'target' => '_blank',
                ),
            )
        );

        $status = get_post_status($this->post->getWpPostId());
        if (in_array($status, array('publish', 'future', 'private'))) {
            $wp_admin_bar->add_menu(
                array(
                    'id'    => Brizy_Editor::get_slug().'-post-view-url',
                    'title' => __('View'),
                    'href'  => get_permalink(),
                    'meta'  => array(
                        'target' => '_blank',
                    ),
                )
            );
        }
    }

    /**
     * @internal
     */
    public function _action_enqueue_editor_assets()
    {
        if (wp_script_is('wp-mediaelement') === false) {
            wp_register_script(
                'wp-mediaelement',
                "/wp-includes/js/mediaelement/wp-mediaelement.min.js",
                array('mediaelement'),
                false,
                1
            );
        }

        if (wp_style_is('wp-mediaelement') === false) {
            wp_register_style(
                'wp-mediaelement',
                "/wp-includes/js/mediaelement/wp-mediaelement.min.css",
                array('mediaelement')
            );
        }

        wp_enqueue_media();

		$config_object    = $this->getConfigObject();
		$assets_url       = $config_object->urls->assets;
		$editor_js_deps   = [ 'brizy-editor-polyfill', 'brizy-editor-vendor' ];
		$editor_js_config = json_encode( $config_object );

        if ( class_exists( 'WooCommerce' ) ) {
			$editor_js_deps[] = 'zoom';
			$editor_js_deps[] = 'photoswipe';
			$editor_js_deps[] = 'flexslider';
			$editor_js_deps[] = 'wc-single-product';
		}wp_enqueue_style('brizy-editor', "${assets_url}/editor/css/editor.css", array(), null);
        wp_register_script('brizy-editor-polyfill', "${assets_url}/editor/js/polyfill.js", array(), null, true);
        wp_register_script('brizy-editor-vendor', "${assets_url}/editor/js/editor.vendor.js", array(), null, true);
        wp_enqueue_script('brizy-editor', "${assets_url}/editor/js/editor.js", apply_filters( 'brizy_editor_js_deps', $editor_js_deps ), null, true);
        wp_add_inline_script('brizy-editor', "var __VISUAL_CONFIG__ = ${editor_js_config};", 'before');

        do_action('brizy_editor_enqueue_scripts');

        // include REST api authenticate nonce
        wp_localize_script(
            'wp-api',
            'wpApiSettings',
            array(
                'root'          => esc_url_raw(rest_url()),
                'nonce'         => wp_create_nonce('wp_rest'),
                'editorVersion' => BRIZY_EDITOR_VERSION,
                'pluginVersion' => BRIZY_VERSION,
            )
        );

        if ( BRIZY_DEVELOPMENT === true ) {
            wp_add_inline_script(
                'brizy-editor',
                "window.__REACT_DEVTOOLS_GLOBAL_HOOK__ = window.parent.__REACT_DEVTOOLS_GLOBAL_HOOK__;",
                'before'
            );
        }
    }


    /**
     * Do not remove this function it is used to compatibilities like astra theme
     *
     * @internal
     */
    public function _action_enqueue_preview_assets()
    {
        $current_user  = wp_get_current_user();
        $config_json   = json_encode(
            array(
                'serverTimestamp' => time(),
                'currentUser'     => [
                    'user_login'     => $current_user->user_login,
                    'user_email'     => $current_user->user_email,
                    'user_level'     => $current_user->user_level,
                    'user_firstname' => $current_user->user_firstname,
                    'user_lastname'  => $current_user->user_lastname,
                    'display_name'   => $current_user->display_name,
                    'ID'             => $current_user->ID,
                    'roles'          => $current_user->roles,
                ],
            )
        );

	    wp_register_script( 'brizy-preview', '' );
	    wp_enqueue_script( 'brizy-preview' );
        wp_add_inline_script('brizy-preview', "var __CONFIG__ = ${config_json};", 'before');

        do_action('brizy_preview_enqueue_scripts');
    }

    public function toolbar_link($wp_admin_bar)
    {

        global $wp_post_types;

        if ( ! Brizy_Editor_User::is_user_allowed()) {
            return;
        }

        $type          = $this->post->getWpPost()->post_type;
        $postTypeLabel = $wp_post_types[$type]->labels->singular_name;
        $args          = array(
            'id'    => 'brizy_Edit_page_link',
            'title' => __("Edit ".$postTypeLabel." with ".__bt('brizy', 'Brizy')),
            'href'  => apply_filters( 'brizy_toolbar_link', $this->post->edit_url(), $this->post ),
            'meta'  => array(),
        );
        $wp_admin_bar->add_node($args);
    }

    public function templateIncludeForEditor($template)
    {
		$post = $this->post->getWpPost();

        $template_path = get_post_meta($post->ID, '_wp_page_template', true);
        $template_path = ! $template_path && $post->post_type == Brizy_Admin_Templates::CP_TEMPLATE ? Brizy_Config::BRIZY_TEMPLATE_FILE_NAME : $template_path;

        if (in_array(
            basename($template_path),
            array(
                Brizy_Config::BRIZY_BLANK_TEMPLATE_FILE_NAME,
                Brizy_Config::BRIZY_TEMPLATE_FILE_NAME,
            )
        )) {
            $urlBuilder = new Brizy_Editor_UrlBuilder();

            return $urlBuilder->plugin_path('/public/views/templates/'.$template_path);
        }

        return $template;
    }

    public function templateInclude($atemplate)
    {
        $config_object = $this->getConfigObject();

        $iframe_url = add_query_arg(
            array(Brizy_Editor::prefix('-edit-iframe') => ''),
            get_permalink($this->post->getWpPostId())
        );

        $favicon = '';
        if (has_site_icon()) {
            ob_start();
            ob_clean();
            wp_site_icon();
            $favicon = ob_get_clean();
        }

        $context = array(
            'editorData'    => $config_object,
            'editorVersion' => BRIZY_EDITOR_VERSION,
            'iframe_url'    => $iframe_url,
            'page_title'    => apply_filters(
                'the_title',
                $this->post->getWpPost()->post_title,
                $this->post->getWpPostId()
            ),
            'favicon'       => $favicon,
            'styles'        => [$config_object->urls->assets."/editor/css/editor.css"],
            'scripts'       => [$config_object->urls->assets."/editor/js/polyfill.js"],
        );

        if (defined('BRIZY_DEVELOPMENT')) {
            $context['DEBUG'] = true;
        }

        $context = apply_filters('brizy_editor_page_context', $context);

        if ( ! $context) {
            throw new Exception('Invalid template context. Probably a bad filter implementation');
        }

        echo Brizy_TwigEngine::instance(self::path('views'))
                             ->render('page.html.twig', $context);

        return self::path('views/empty.php');
    }

    public function body_class_frontend($classes)
    {

        $classes[] = 'brz';
        $classes[] = (function_exists('wp_is_mobile') && wp_is_mobile()) ? 'brz-is-mobile' : '';

        return $classes;
    }

    public function body_class_editor($classes)
    {

        $classes[] = 'brz';
        $classes[] = 'brz-ed';
        $classes[] = 'brz-ed--desktop';

        if (class_exists('WooCommerce')) {
            if ($this->post->getWpPost()->post_type == Brizy_Admin_Templates::CP_TEMPLATE) {
                $classes[] = 'woocommerce';
            }
        }

        return $classes;
    }

    /**
     * @return bool
     */
    public static function is_editing_page_with_editor( Brizy_Editor_Post $post = null )
    {
        return ! is_admin() && isset($_REQUEST[Brizy_Editor::prefix('-edit')]) && ( $post ? $post->uses_editor() : true );
    }

    /**
     * @return bool
     */
    public static function is_editing_page_with_editor_on_iframe( Brizy_Editor_Post $post = null )
    {
        return ! is_admin() && isset($_REQUEST[Brizy_Editor::prefix('-edit-iframe')]) && ( $post ? $post->uses_editor() : true );
    }

    /**
     * @return bool
     */
    public static function is_editing_page_without_editor( Brizy_Editor_Post $post = null )
    {
        return isset($_REQUEST['post']) && $_REQUEST['post'] == $post->getWpPostId();
    }

	/**
	 * @return bool
	 */
	public static function is_view_page( Brizy_Editor_Post $post = null ) {

	    /* old code
	       return ! is_admin() && $post && $post->uses_editor() && ! isset(
                $_GET[Brizy_Editor::prefix(
                    '-edit-iframe'
                )]
            ) && ! isset($_GET[Brizy_Editor::prefix('-edit')]);
	     */

		$isView = false;

		if ( ! is_admin() && $post && $post->uses_editor() && ! isset( $_GET[ Brizy_Editor::prefix( '-edit-iframe' ) ] ) && ! isset( $_GET[ Brizy_Editor::prefix( '-edit' ) ] ) ) {
			$isView = true;

			if ( in_array( get_post_status( $post->getWpPost() ), [ 'future', 'draft', 'pending', 'private' ] ) && ! Brizy_Editor_User::is_user_allowed() ) {
				$isView = false;
			}
		}

		return $isView;
	}

    /**
     * @param $content
     *
     * @return string
     *
     * @internal
     */
    function _filter_the_content($content)
    {
        if (is_main_query()&& ! doing_filter( 'brizy_content' ) ) {

            try {
                //$config_object = $this->getConfigObject();
                $context = array(
                    //'editorData'    => $config_object,
                    'editorVersion' => BRIZY_EDITOR_VERSION,
                );

                if (WP_DEBUG) {
                    $context['DEBUG'] = true;
                }

                $render_block = Brizy_TwigEngine::instance(self::path('views'))
                                                ->render('editor.html.twig', $context);

                return $render_block;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        return $content;
    }

    public function _action_the_content()
    {
        echo $this->_filter_the_content('');
    }

    /**
     *  Show the compiled page head content
     */
    public function insert_page_head()
    {

        $params = array('content' => '');

        if ( ! $this->post->get_compiled_html()) {

            $compiled_html_head = $this->post->get_compiled_html_head();
            $compiled_html_head = Brizy_SiteUrlReplacer::restoreSiteUrl($compiled_html_head);
            $this->post->set_needs_compile(true)
                       ->saveStorage();

            $params['content'] = $compiled_html_head;
        } else {
            $compiled_page     = $this->post->get_compiled_page();
            $head              = $compiled_page->get_head();
            $params['content'] = $head;
        }


        // get all assets needed for this page
        $project = Brizy_Editor_Project::get();
        $styles  = $this->post->getCompiledStyles();
	    $assetGroups = [];
        if(isset($styles['free']) && !empty($styles['free'])) {
            $assetGroups[] = \BrizyMerge\Assets\AssetGroup::instanceFromJsonData($styles['free']);
        }
	    $assetGroups =  apply_filters('brizy_pro_head_assets', $assetGroups, $this->post);

	    // add popups and popup assets
	    $popupMain         = Brizy_Admin_Popups_Main::_init();
        $params['content'] .= $popupMain->getPopupsHtml($project, $this->post, 'head');

	    $assetGroups = array_merge($assetGroups, $popupMain->getPopupsAssets($project, $this->post, 'head'));
	    $assetAggregator = new \BrizyMerge\AssetAggregator($assetGroups);


       // include content
        $params['content'] .= "<!-- BRIZY ASSETS -->\n\n";
        foreach ($assetAggregator->getAssetList() as $asset) {
            $params['content'] .= $asset->getContent()."\n";
        }
        $params['content'] .= "\n\n<!-- END BRIZY ASSETS -->";

        $params['content'] = apply_filters(
            'brizy_content',
            $params['content'],
            Brizy_Editor_Project::get(),
            $this->post->getWpPost(),
            'head'
        );

        echo Brizy_TwigEngine::instance(self::path('views'))
                             ->render('head-partial.html.twig', $params);

        return;
    }

    /**
     * @param $content
     *
     * @return null|string|string[]
     * @throws Exception
     */
    public function insert_page_content($content)
    {

        global $post;

		if ( doing_filter( 'brizy_dc_excerpt' ) ) {
			return $content;
		}

		if ( false === strpos( $content, 'brz-root__container' ) ||
		     ( $post && $post->ID !== $this->post->getWpPostId() && !wp_is_post_autosave($this->post->getWpPostId()) ) ) {
			return $content;
		}

		if ( self::$is_excerpt ) {
			return apply_filters( 'brizy_content', $content, Brizy_Editor_Project::get(), $this->post->getWpPost(), 'body' );
		}

	    $project = Brizy_Editor_Project::get();

		if ( ! $this->post->get_compiled_html() ) {
			$compiled_html_body = $this->post->get_compiled_html_body();
			$content            = Brizy_SiteUrlReplacer::restoreSiteUrl( $compiled_html_body );
			$this->post->set_needs_compile( true )->saveStorage();
		} else {
			$compiled_page = $this->post->get_compiled_page();
			$content       = $compiled_page->get_body();
		}

        // get all assets needed for this page
        $scripts = $this->post->getCompiledScripts();
	    $assetGroups = [];
        if(isset($scripts['free']) && !empty($scripts['free'])) {
            $assetGroups[] = \BrizyMerge\Assets\AssetGroup::instanceFromJsonData($scripts['free']);
        }
	    $assetGroups =  apply_filters('brizy_pro_body_assets', $assetGroups, $this->post);

	    // add popups and popup assets
	    $popupMain         = Brizy_Admin_Popups_Main::_init();
	    $content .= $popupMain->getPopupsHtml($project, $this->post, 'body');

	    $assetGroups = array_merge($assetGroups, $popupMain->getPopupsAssets($project, $this->post, 'body'));
	    $assetAggregator = new \BrizyMerge\AssetAggregator($assetGroups);

        // include content
        $content .= "<!-- BRIZY ASSETS -->\n\n";
        foreach ($assetAggregator->getAssetList() as $script) {
            $content .= $script->getContent()."\n";
        }
        $content .= "\n\n<!-- END BRIZY ASSETS -->";

        $content = apply_filters(
            'brizy_content',
            $content,
            $project,
            $this->post->getWpPost(),
            'body'
        );

        return $content;
    }

    public function brizy_the_content() {
		global $post;

		if ( doing_filter( 'brizy_dc_excerpt' ) ) {
			return '';
		}

		if ( ! $this->post->get_compiled_html() ) {
			$compiled_html_body = $this->post->get_compiled_html_body();
			$content            = Brizy_SiteUrlReplacer::restoreSiteUrl( $compiled_html_body );
			$this->post->set_needs_compile( true )->saveStorage();
		} else {
			$compiled_page = $this->post->get_compiled_page();
			$content       = $compiled_page->get_body();
		}

		echo apply_filters( 'the_content', apply_filters( 'brizy_content', $content, Brizy_Editor_Project::get(), $this->post->getWpPost(), 'body' ) );
	}/**
     * @param string $rel
     *
     * @return string
     */
    public static function path($rel)
    {
        return dirname(__FILE__)."/$rel";
    }

    private function getConfigObject($context = Brizy_Editor_Editor_Editor::EDITOR_CONTEXT)
    {
        $editor        = Brizy_Editor_Editor_Editor::get(Brizy_Editor_Project::get(), $this->post);
        $config_json   = json_encode($editor->config($context));
        $config_object = json_decode($config_json);

        return $config_object;
    }

    private function preparePost()
    {
        $is_preview    = is_preview() || isset($_GET['preview']);
        $needs_compile = ! $this->post->isCompiledWithCurrentVersion() || $this->post->get_needs_compile();
        $autosaveId = null;
        if ($is_preview) {
            $user_id      = get_current_user_id();
            $postParentId = $this->post->getWpPostId();
            $autosaveId   = Brizy_Editor_AutoSaveAware::getAutoSavePost($postParentId, $user_id);

            if ($autosaveId) {
                $this->post    = Brizy_Editor_Post::get($autosaveId);
                $needs_compile = ! $this->post->isCompiledWithCurrentVersion() || $this->post->get_needs_compile();
            } else {
                // we make this false because the page was saved.
                $is_preview = false;
            }
        }

        try {
            if ($is_preview || $needs_compile) {
                $this->post->compile_page();
            }

            if ( ! $is_preview && $needs_compile|| $autosaveId) {
                $this->post->saveStorage();
                $this->post->savePost();
            }

        } catch (Exception $e) {
            Brizy_Logger::instance()->exception($e);
        }
    }



    private function plugin_live_composer_fixes()
    {
        // Conflict with Live Composer builder when it has set a template for single post.
        remove_filter('the_content', 'dslc_filter_content', 101);
        // Remove button "Edit Template" from single when it is builded with brizy.
        remove_filter('wp_footer', array('DSLC_EditorInterface', 'show_lc_button_on_front'));
    }

    public function addTheContentFilters()
    {

        if (self::$the_content_fitler_addded) {
            return;
        }

        if ($this->is_editing_page_with_editor_on_iframe() && Brizy_Editor_User::is_user_allowed()) {
            add_filter('the_content', array($this, '_filter_the_content'));
            add_action('brizy_template_content', array($this, '_action_the_content'));
        } elseif ($this->is_view_page()) {
            if ( ! post_password_required($this->post->getWpPost())) {
                add_filter('the_content', array($this, 'insert_page_content'));
            }
        }

        self::$the_content_fitler_addded = true;
    }

    public function removeTheContentFilters()
    {

        if ( ! self::$the_content_fitler_addded) {
            return;
        }

        if ($this->is_editing_page_with_editor_on_iframe() && Brizy_Editor_User::is_user_allowed()) {
            remove_filter('the_content', array($this, '_filter_the_content'));
            remove_action('brizy_template_content', array($this, '_action_the_content'));
        } elseif ($this->is_view_page()) {
            if ( ! post_password_required($this->post->getWpPost())) {
                remove_filter('the_content', array($this, 'insert_page_content'));
            }
        }

        self::$the_content_fitler_addded = false;
    }


	public function start_excerpt( $content ) {
		self::$is_excerpt = true;

		return $content;
	}

	public function end_excerpt( $content ) {
		self::$is_excerpt = false;

		return $content;
	}
}
