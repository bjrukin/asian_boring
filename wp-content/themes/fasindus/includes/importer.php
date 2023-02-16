<?php

function fasindus_backups_demos( $demos ) {
	
	$demo_content_installer	 = 'https://wp.quomodosoft.com/fasindus/content';
	$demos_array			 = array(

		'home_1'			 => array(
			'title'			 => esc_html__( 'Fasindus Demo Content', 'fasindus' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/home_1.jpg',
			'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/fasindus' ),
		),
	);

	$download_url			 = esc_url( $demo_content_installer ) . '/download.php';
	
	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'		 => $download_url,
			'file_id'	 => $id,
		) );
		$demo->set_title( $data[ 'title' ] );
		$demo->set_screenshot( $data[ 'screenshot' ] );
		$demo->set_preview_link( $data[ 'preview_link' ] );
		$demos[ $demo->get_id() ] = $demo;
		unset( $demo );
	}

	return $demos;
}

add_filter( 'fw:ext:backups-demo:demos', 'fasindus_backups_demos' );