<?php
/* Post Type Register- 1 */
register_post_type("zboom-slider",array(
    "labels" => array(
        "name" => "Slider",
        "add_new_item" => __("Add New Slider","zboom")
    ),
    "public" => true,
    "supports" => array("title","editor","excerpt","thumbnail","custom-fields"),
    "menu_positon" => 7,
    // "menu_icon" => "https://",
    "menu_icon" => get_template_directory_uri() ."/images/slideshow.png",
));
/* Post Type Register- 2 */
register_post_type("zboom-services",array(
    "labels" => array(
        "name" => "Blocks",
        "add_new_item" => __("Add New Block","zboom")
    ),
    "public" => true,
    "supports" => array("title","editor","excerpt")
));
/* Post Type Register- 3 */
register_post_type("zboom-gallery",array(
    "labels" => array(
        "name" => "Gallery",
        "add_new_item" => __("Add New Gallery Item","zboom")
    ),
    "public" => true,
    "supports" => array("title","editor","excerpt","thumbnail")
));