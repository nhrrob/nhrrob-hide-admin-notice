<?php
/*
Plugin Name: NHR Hide Admin Notice
Plugin URI: http://wordpress.org/plugins/nhrrob-hide-notice/
Description: Hide all unwanted notices and keep your dashboard clean.
Author: Nazmul Hasan Robin
Version: 1.0.0
Author URI: https://nazmulrobin.com
*/

// Make sure we don't expose any info if called directly
if ( ! function_exists('add_action') ) {
	echo 'Access Denied!';
	exit;
}

define( 'NHRROB_HIDE_NOTICE_VERSION', '1.0.0' );
define( 'NHRROB_HIDE_NOTICE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function nhrrob_hide_admin_notices(){
    $current_screen = get_current_screen();

    if ($current_screen && $current_screen->id !== 'toplevel_page_nhrrob-hide-notice') {
        remove_all_actions('user_admin_notices');
        remove_all_actions('admin_notices');
    }
}

add_action('in_admin_header', 'nhrrob_hide_admin_notices', 99);