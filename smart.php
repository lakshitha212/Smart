<?php
/*
Plugin Name: Smart
Plugin URI: #
Description: Smart plugin is a wordpress plugin
Version: 1.0
Author: Lakshitha212
Author URI: https://github.com/lakshitha212
*/
define('SMART_DIR', dirname(__FILE__));
define('SMART_THEMES_DIR', SMART_DIR . "/themes");
define('SMART_URL', WP_PLUGIN_URL . "/" . basename(SMART_DIR));
define('SMART_VERSION', '1.0');
global $jal_db_version;
$smart_db_version = '1.0';
function smart_install()
{
    global $wpdb;
    global $smart_db_version;

    $table_name = $wpdb->prefix . 'smart';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		text text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    add_option('smart_db_version', $smart_db_version);
}

register_activation_hook(__FILE__, 'smart_install');