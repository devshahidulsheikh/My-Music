<?php
// Theme Widgets
function zboom_right_sidebar() {
    register_sidebar(array(
        "name" => __("Right Sidebar","zboom"),
        "description" => __("Add your right sidebar widgets here","zboom"),
        "id" => "right-sidebar",
        "before_widget" => "<div class='box'>",
        "after_widget" => "</div>",
        /* "after_widget" => "</div></div>",
        "before_title" => "<div class='heading'><h2>",
        "after_title" => "</h2></div><div class='content'>", */
    ));

    register_sidebar(array(
        "name" => __("Contact Sidebar","zboom"),
        "description" => __("Add your contact sidebar widgets here","zboom"),
        "id" => "contact-sidebar",
        "before_widget" => "<div class='box'>",
        "after_widget" => "</div>",
        /* "after_widget" => "</div></div>",
        "before_title" => "<div class='heading'><h2>",
        "after_title" => "</h2></div><div class='content'>", */
    ));
    
    register_sidebar(array(
        "name" => __("Footer Widgets","zboom"),
        "description" => __("Add your footer widgets here","zboom"),
        "id" => "footer-widget",
        "before_widget" => "<div class='col-1-4'><div class='wrap-col'><div class='box'>",
        "after_widget" => "</div></div></div>",
        /* "after_widget" => "</div></div></div></div>",
        "before_title" => "<div class='heading'><h2>",
        "after_title" => "</h2></div><div class='content'>", */
    ));
}
add_action("widgets_init","zboom_right_sidebar");