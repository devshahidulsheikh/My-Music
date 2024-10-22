<?php
// Admin CSS Enqueue
function theme_option_custom_css() {
    wp_register_style("fontawesome","https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css",array(),"6.4.0","all");
    wp_enqueue_style("fontawesome");
}
// add_action("admin_enqueue_scripts","theme_option_custom_css");

// Theme CSS JS Enqueue
function zboom_css_js_file_calling() {
    wp_enqueue_style("zboom-style",esc_url(get_stylesheet_uri()));
    
    wp_register_style("zerogrid",esc_url(get_template_directory_uri()) ."/css/zerogrid.css",array(),"1.0.1","all");
    wp_enqueue_style("zerogrid");
    
    wp_register_style("style",esc_url(get_template_directory_uri()) ."/css/style.css",array(),"1.0.1","all");
    wp_enqueue_style("style");
    
    wp_register_style("responsiveslides",esc_url(get_template_directory_uri()) ."/css/responsiveslides.css",array(),"1.0.1","all");
    wp_enqueue_style("responsiveslides");

    wp_register_style("responsive",esc_url(get_template_directory_uri()) ."/css/responsive.css",array(),"1.0.1","all");
    wp_enqueue_style("responsive");
  
    /* jQuery */
    wp_enqueue_script("jquery");
    /* <!--[if lt IE 9]>
    // wp_enqueue_script("html5",esc_url(get_template_directory_uri()) ."/js/html5.js",array(),"3.6","true");
    // wp_enqueue_script("css3-mediaqueries",esc_url(get_template_directory_uri()) ."/js/css3-mediaqueries.js",array(),"1.0.1","true");
	<![endif]--> */
    wp_enqueue_script("responsiveslides",esc_url(get_template_directory_uri()) ."/js/responsiveslides.js",array(),"1.32","true");
    wp_enqueue_script("script",esc_url(get_template_directory_uri()) ."/js/script.js",array(),"1.1.1","true");
  
}
add_action("wp_enqueue_scripts","theme_option_custom_css");
add_action("wp_enqueue_scripts","zboom_css_js_file_calling");