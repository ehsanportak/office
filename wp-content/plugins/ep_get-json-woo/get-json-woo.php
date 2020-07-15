<head>
    <style>
        th{
        padding: 8px;
        text-align: center;
        }
    </style>
</head>
<?php
/*
plugin name:get json woo
*/
define('epgjw_dir' , plugin_dir_path(__FILE__) );

function wpdocs_add_dashboard_widgets() {
    wp_add_dashboard_widget( 'dashboard_widget', 'json', 'dashboard_widget_function' );
}
add_action( 'wp_dashboard_setup', 'wpdocs_add_dashboard_widgets' );
 
function dashboard_widget_function( $post, $callback_args ) {
require(epgjw_dir . '/view/product.php');
require(epgjw_dir . '/view/pending.php');
require(epgjw_dir . '/view/view.php');

}