<?php
/* Shortcode 1 */
function zboom_heading($atts,$content) {
    
    /* $attribute = shortcode_atts( array(
        "position" => "center"
    ), $atts, );

    return "<h1 align='". $attribute['position'] ."'>". $content ."</h1>"; */

    $h1_attribute = extract(shortcode_atts( array(
        "position" => "left"
    ), $atts, ));

    return "<h1 align='". $position. "'>". $content ."</h1>";
}
add_shortcode( "heading", "zboom_heading" );

/* Shortcode 2 */
function zboom_image($atts,$content) {
    
    $img_attribute = extract(shortcode_atts( array(
        "src" => "http://localhost/grow_big/kickyourstartups/wp-content/themes/zBoomMusic/images/logo.png",
        "width" => "300px",
        "height" => "auto",
        "alt" => "group photo"
    ), $atts, ));

    return "<img src='". $src ."' alt='". $alt ."' style='width:". $width ."'; height:'". $height ."'><h2>$content</h2>";
}
add_shortcode( "image", "zboom_image" );

/* Shortcode 2 */
function zboom_blocks_services() {
    ob_start(); ?>

<div class="row block01">

    <?php
    $block_items = new WP_Query(array(
        "post_type" => "zboom-services",
        "posts_per_page" => 3
    ));

    while($block_items->have_posts()) : $block_items->the_post() ?>
    <div class="col-1-3">
        <div class="wrap-col box">
            <h2><?php the_title() ?></h2>
            <p><?php read_more(10) ?></p>
            <div class="more"><a href="<?php the_permalink() ?>">[...]</a></div>
        </div>
    </div>
    <?php endwhile ?>

</div>
    
    <?php $blocks = ob_get_clean();
    return $blocks;
}
add_shortcode( "blocks", "zboom_blocks_services" );