<?php
/*
 * All Fasindus Theme Related Functions Files are Linked here
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

/* Theme All Fasindus Setup */
require_once( FASINDUS_FRAMEWORK . '/theme-support.php' );
require_once( FASINDUS_FRAMEWORK . '/backend-functions.php' );
require_once( FASINDUS_FRAMEWORK . '/frontend-functions.php' );
require_once( FASINDUS_FRAMEWORK . '/enqueue-files.php' );
require_once( FASINDUS_CS_FRAMEWORK . '/custom-style.php' );
require_once( FASINDUS_CS_FRAMEWORK . '/config.php' );

/* Install Plugins */
require_once( FASINDUS_FRAMEWORK . '/theme-options/plugins/activation.php' );

/* Breadcrumbs */
require_once( FASINDUS_FRAMEWORK . '/theme-options/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( FASINDUS_FRAMEWORK . '/theme-options/plugins/aq_resizer.php' );

/* Bootstrap Menu Walker */
require_once( FASINDUS_FRAMEWORK . '/core/wp_bootstrap_navwalker.php' );

/* Sidebars */
require_once( FASINDUS_FRAMEWORK . '/core/sidebars.php' );

/* Importer */
require_once( FASINDUS_FRAMEWORK . '/importer.php' );

if ( class_exists( 'WooCommerce' ) ) :
	require_once( FASINDUS_FRAMEWORK . '/woocommerce-extend.php' );
endif;

