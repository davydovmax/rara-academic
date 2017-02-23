<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rara Academic
 */

function hook_css() {
    $testimonial_background_image_id = get_theme_mod( 'art_people_testimonials_background' );
    if($testimonial_background_image_id) {
        list($testimonial_background_image_url) = wp_get_attachment_image_src( $testimonial_background_image_id, 'full' );
        if($testimonial_background_image_url) {
            ?>
                <style>
                    .testimonial {
                        background-image: url(<?php echo $testimonial_background_image_url ?>);
                    }
                </style>
            <?php
        }
    }
}

add_action('wp_head', 'hook_css');

get_header();
    
    $rara_academic_page_sections = array( 'banner', 'courses', 'welcome', 'service', 'notice', 'blog', 'testimonial', 'cta' );
    
    foreach( $rara_academic_page_sections as $section ){ 
        if( get_theme_mod( 'rara_academic_ed_' . $section . '_section' ) == 1 ){
            get_template_part( 'sections/' . esc_attr( $section ) );
        } 
    }
    
get_footer();