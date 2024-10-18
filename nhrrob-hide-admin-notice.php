<?php
/**
 * Plugin Name: NHR Hide Admin Notice
 * Plugin URI: http://wordpress.org/plugins/nhrrob-hide-admin-notice/
 * Description: Hide all unwanted notices and keep your dashboard clean.
 * Author: Nazmul Hasan Robin
 * Author URI: https://profiles.wordpress.org/nhrrob/
 * Version: 1.0.6
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: nhrrob-hide-admin-notice
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'NHRROB_HIDE_ADMIN_NOTICE_VERSION', '1.0.6' );
define( 'NHRROB_HIDE_ADMIN_NOTICE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function nhrrob_hide_admin_notice_init(){
    $current_screen = get_current_screen();

    if ($current_screen && $current_screen->id !== 'profile') {
        remove_all_actions('user_admin_notices');
        remove_all_actions('admin_notices');
    }
}

add_action('in_admin_header', 'nhrrob_hide_admin_notice_init', 99);