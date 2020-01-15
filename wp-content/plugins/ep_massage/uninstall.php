<?php
defined('wp_uninstall_plugin_') || die('این پلاگین وجود ندارد');
global $wpdb;
$ep_table= $wpdb->prefix;
$wpdb->query('drop table if exists {ep_table}');
?>