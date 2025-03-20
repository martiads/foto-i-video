<?php
/**
 * El archivo principal de WordPress
 *
 * @package Master_Photography_Videography
 */

get_header();

if (is_home() && !is_front_page()) {
    // Página de blog
    get_template_part('template-parts/content', 'blog');
} elseif (is_front_page()) {
    // Página de inicio
    get_template_part('template-parts/content', 'home');
} else {
    // Otras páginas
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'page');
    endwhile;
}

get_sidebar();
get_footer();