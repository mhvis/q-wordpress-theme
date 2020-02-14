<?php
/**
 * Enqueue stylesheet (https://codex.wordpress.org/Child_Themes).
 */
add_action( 'wp_enqueue_scripts', 'quadrivium_enqueue_styles' );
function quadrivium_enqueue_styles() {
    $parent_style = 'flocks-style';

	// Enqueue Flocks stylesheet
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	// Enqueue our stylesheet
    wp_enqueue_style( 'quadrivium',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}


/**
 * Remove some unnecessary functions from Flocks.
 */
function quadrivium_remove_parent_functions() {
    // Remove Flocks login page customization
    remove_action( 'login_enqueue_scripts', 'flocks_wp_login_logo' );
    remove_action( 'login_enqueue_scripts', 'flocks_login_stylesheet' );
    remove_filter( 'login_headerurl', 'flocks_login_logo_url' );
    remove_filter( 'login_headertitle', 'flocks_login_logo_url_title' );
    remove_action( 'login_message', 'flocks_gears_wp_login' );
    remove_action('login_footer', 'flocks_wp_login_forget_pass');
}
add_action( 'wp_loaded', 'quadrivium_remove_parent_functions' );


/**
 * Remove 'logged-out' class from body.
 * 
 * This fixes the 'for members' button style in upper right corner.
 */
function quadrivium_remove_logged_out_class(array $classes) {
    if (in_array('logged-out', $classes)) {
		unset( $classes[array_search('logged-out', $classes)] );
    }
	return $classes;
}
add_filter( 'body_class', 'quadrivium_remove_logged_out_class', 1000 );