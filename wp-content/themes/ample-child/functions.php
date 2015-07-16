<?php

function ample_child_scripts(){
	wp_enqueue_script("all_reg",get_stylesheet_directory_uri().'/js/main_reg.js');
	wp_enqueue_script("all_bootstrap_js",get_stylesheet_directory_uri().'/js/bootstrap.min.js');
	wp_enqueue_style( "all_bootstrap_cs", get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
}
add_action('wp_enqueue_scripts','ample_child_scripts');