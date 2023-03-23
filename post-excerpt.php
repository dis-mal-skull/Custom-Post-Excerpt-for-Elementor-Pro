<?php
/*
Plugin Name: Custom Post Excerpt for Elementor Pro
Plugin URI: https://dismal.site
Description: Adds a custom shortcode to control post excerpts for elementor loop item
Version: 1.0
Author: Dismal
Author URI: https://dismal.site
*/

// Add the shortcode
function custom_post_excerpt_shortcode($atts) {
    // Set default values for the shortcode
    $atts = shortcode_atts(array(
        'words' => '50'
    ), $atts);

    // Get the post excerpt
    $excerpt = get_the_excerpt();

    // If there is no excerpt, use the post content
    if (!$excerpt) {
        $excerpt = get_the_content();
    }

    // Strip any HTML tags from the excerpt
    $excerpt = strip_tags($excerpt);

    // Trim the excerpt to the specified number of words
    $excerpt = wp_trim_words($excerpt, $atts['words'], '[...]');

    // Return the excerpt
    return $excerpt;
}
add_shortcode('p-ex', 'custom_post_excerpt_shortcode');
?>
