<?php 
/**
* Plugin Name:  Password Generator Widget 
* Plugin URI:
* Description:A Widget for generating random password.
* Version:1.0
* Author:Vaibhav Gangrade
* Author URI:
*/

//Prevent Direct Access to page
if(!defined('ABSPATH')){
	 exit;
}
//Adding Jquery in our plugin from wp-includes folder

function pgw_load_admin_js(){
        wp_enqueue_script( 'custom-Jquery', site_url( 'wp-includes/js/jquery/jquery.js' , __FILE__ ) ); 
 }
    add_action('widgets_init', 'pgw_load_admin_js');

require_once(plugin_dir_path(__FILE__).'/include/password-generator-class.php');



function pgw_register_password_generator(){
	register_widget("Password_generator_Widget");
}

add_action('widgets_init','pgw_register_password_generator');

?>
