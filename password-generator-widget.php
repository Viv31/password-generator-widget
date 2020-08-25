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
require_once(plugin_dir_path(__FILE__).'/include/password-generator-class.php');



function register_password_generator(){
	register_widget("Password_generator_Widget");
}

add_action('widgets_init','register_password_generator');


//Adding Jquery in our plugin

function load_admin_js(){
       //including inbuilt jquery from wordpress core folder
		wp_enqueue_script( 'custom-Jquery', site_url( 'wp-includes/js/jquery/jquery.js' , __FILE__ ) ); 
 }
    add_action('widgets_init', 'load_admin_js');


?>