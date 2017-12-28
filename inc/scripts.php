<?php

// Front-end scripts
function ct_critic_load_scripts_styles() {

	$font_args = array(
		'family' => urlencode( 'Rokkitt:400,700|Lato:400,700|Open Sans:400,700' ),
		'subset' => urlencode( 'latin,latin-ext' )
	);
	$fonts_url = add_query_arg( $font_args, '//fonts.googleapis.com/css' );

	wp_enqueue_style( 'ct-critic-google-fonts', $fonts_url );

	wp_enqueue_script( 'ct-critic-js', get_template_directory_uri() . '/js/build/production.min.js', array( 'jquery' ), '', true );
	wp_localize_script( 'ct-critic-js', 'ct_critic_objectL10n', array(
		'openPrimaryMenu'  => esc_html__( 'open primary menu', 'critic' ),
		'closePrimaryMenu' => esc_html__( 'close primary menu', 'critic' ),
		'openChildMenu'    => esc_html__( 'open child menu', 'critic' ),
		'closeChildMenu'   => esc_html__( 'close child menu', 'critic' )
	) );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'ct-critic-style', get_stylesheet_uri() );

	// enqueue comment-reply script only on posts & pages with comments open ( included in WP core )
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Load Polyfills */

	wp_enqueue_script( 'ct-critic-html5-shiv', get_template_directory_uri() . '/js/build/html5shiv.min.js' );

	wp_enqueue_script( 'ct-critic-respond', get_template_directory_uri() . '/js/build/respond.min.js', '', '', true );

	// prevent fatal error on < WP 4.2 (load files unconditionally instead)
	if ( function_exists( 'wp_script_add_data' ) ) {
		wp_script_add_data( 'ct-critic-html5-shiv', 'conditional', 'IE 8' );
		wp_script_add_data( 'ct-critic-respond', 'conditional', 'IE 8' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_critic_load_scripts_styles' );

// Back-end scripts
function ct_critic_enqueue_admin_styles( $hook ) {

	if ( $hook == 'appearance_page_critic-options' ) {
		wp_enqueue_style( 'ct-critic-admin-styles', get_template_directory_uri() . '/styles/admin.min.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'ct_critic_enqueue_admin_styles' );

// Customizer scripts
function ct_critic_enqueue_customizer_scripts() {

	wp_enqueue_style( 'ct-critic-customizer-styles', get_template_directory_uri() . '/styles/customizer.min.css' );
	wp_enqueue_script( 'ct-critic-customizer-js', get_template_directory_uri() . '/js/build/customizer.min.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ct_critic_enqueue_customizer_scripts' );

/*
 * Script for live updating with customizer options. Has to be loaded separately on customize_preview_init hook
 * transport => postMessage
 */
function ct_critic_enqueue_customizer_post_message_scripts() {
	wp_enqueue_script( 'ct-critic-customizer-post-message-js', get_template_directory_uri() . '/js/build/postMessage.min.js', array( 'jquery' ), '', true );
}
add_action( 'customize_preview_init', 'ct_critic_enqueue_customizer_post_message_scripts' );

// load scripts asynchronously
function ct_critic_add_async_script( $url ) {

	// if async parameter not present, do nothing
	if ( strpos( $url, '#ct_critic_asyncload' ) === false ) {
		return $url;
	}

	// if async parameter present, add async attribute
	return str_replace( '#ct_critic_asyncload', '', $url ) . "' async='async";
}
add_filter( 'clean_url', 'ct_critic_add_async_script', 11, 1 );
