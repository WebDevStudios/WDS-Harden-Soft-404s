<?php
/**
 * Plugin Name: WDS - Harden Soft 404s
 * Plugin URI:  http://webdevstudios.com
 * Description: Return a hard 404 error in place of soft 404s.
 * Version:     1.0.0
 * Author:      WebDevStudios
 * Author URI:  http://webdevstudios.com
 * License:     GPLv2+
 * Text Domain: wds-soft-404s
 * Domain Path: /languages
 */

/**
 * Hook into template_redirect, and if in an acceptable condition, harden a soft 404 if no posts exist.
 *
 * Using template_redirect because while we are not going to redirect a template, WP is loaded enough
 * to determine what type of page we are loading, but has not yet output anything. Allowing us to
 * output a different HTTP status code.
 *
 * @return void
 */
function wds_harden_soft_404s() {
	/**
	 * Check if we are in an acceptable condition to harden a soft 404.
	 */
	if( wds_maybe_harden_soft_404s() ) {
		if( ! have_posts() ) {
			status_header( 404 );
		}
	}
}
add_action( 'template_redirect', 'wds_harden_soft_404s' );

/**
 * Determine if we are in an acceptable condition to attempt to harden a soft 404.
 *
 * @return bool
 */
function wds_maybe_harden_soft_404s() {
	/**
	 * No need to run on admin pages
	 */
	if( is_admin() ) {
		return false;
	}

	/**
	 * Array of conditional callbacks of when to harden soft 404s if no posts exist.
	 * Filterable so it can easily be extended to support customizations.
	 */
	$conditionals = apply_filters( 'wds_harden_soft_404s_conditionals', array(
		'is_tax',
		'is_category',
		'is_archive',
		'is_search'
	) );

	/**
	 * Loop through all the callbacks and if any return true, return true also.
	 */
	foreach( $conditionals as $conditional ) {
		$return = is_array( $conditional ) ? call_user_method( $conditional ) : call_user_func( $conditional );
		if( true === $return ) {
			return true;
		}
	}

	/**
	 * If we have not returned true that we are in an acceptable condition to harden a soft 404, return false;
	 */
	return false;
}