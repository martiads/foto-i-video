<?php
/**
 * Funciones y definiciones del tema
 *
 * @package Master_Photography_Videography
 */

if (!function_exists('master_photography_setup')) :
    /**
     * Configuración del tema
     */
    function master_photography_setup() {
        // Soporte para título
        add_theme_support('title-tag');
        
        // Soporte para miniaturas destacadas
        add_theme_support('post-thumbnails');
        
        // Soporte para menús de navegación
        register_nav_menus(array(
            'primary' => esc_html__('Menú Principal', 'master-photography'),
            'footer' => esc_html__('Menú de Pie de Página', 'master-photography'),
        ));
        
        // Soporte para HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        
        // Soporte para logotipo personalizado
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'master_photography_setup');

/**
 * Registrar widgets
 */
function master_photography_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Barra lateral', 'master-photography'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Añade widgets aquí.', 'master-photography'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Área de AdSense Superior', 'master-photography'),
        'id'            => 'adsense-top',
        'description'   => esc_html__('Añade anuncios de AdSense aquí.', 'master-photography'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Área de AdSense Inferior', 'master-photography'),
        'id'            => 'adsense-bottom',
        'description'   => esc_html__('Añade anuncios de AdSense aquí.', 'master-photography'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'master_photography_widgets_init');

/**
 * Encolar scripts y estilos
 */
function master_photography_scripts() {
    wp_enqueue_style('master-photography-style', get_stylesheet_uri());
    wp_enqueue_style('master-photography-main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    
    wp_enqueue_script('master-photography-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('master-photography-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20210501', true);
}
add_action('wp_enqueue_scripts', 'master_photography_scripts');

/**
 * Funciones personalizadas para SEO
 */
function master_photography_meta_description() {
    global $post;
    if (is_singular()) {
        $description = strip_tags(get_the_excerpt($post->ID));
        echo '<meta name="description" content="' . esc_attr($description) . '">';
    }
}
add_action('wp_head', 'master_photography_meta_description');

/**
 * Función para insertar anuncios dentro del contenido
 */
function master_photography_insert_ad_in_content($content) {
    if (is_single() && !is_admin()) {
        $paragraphs = explode('</p>', $content);
        $count = count($paragraphs);
        
        if ($count > 3) {
            $ad_code = '<div class="in-content-ad">' . do_shortcode('[adsense]') . '</div>';
            $paragraphs[2] = $paragraphs[2] . $ad_code;
            
            if ($count > 6) {
                $paragraphs[5] = $paragraphs[5] . $ad_code;
            }
        }
        
        return implode('</p>', $paragraphs);
    }
    
    return $content;
}
add_filter('the_content', 'master_photography_insert_ad_in_content');

/**
 * Shortcode para AdSense
 */
function master_photography_adsense_shortcode() {
    // Reemplaza esto con tu código de AdSense cuando lo tengas
    return '<div class="adsense-placeholder">
        <p>Espacio reservado para Google AdSense</p>
        <!-- Código de AdSense irá aquí -->
    </div>';
}
add_shortcode('adsense', 'master_photography_adsense_shortcode');