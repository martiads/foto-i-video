<?php
/**
 * Plantilla para mostrar el contenido de la página de inicio
 *
 * @package Master_Photography_Videography
 */
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1>Master Photography and Videography</h1>
                    <p>Tu recurso definitivo para dominar el arte de la fotografía y videografía</p>
                    <div class="hero-buttons">
                        <a href="<?php echo esc_url(home_url('/tutoriales-para-principiantes/')); ?>" class="btn btn-primary">Tutoriales para Principiantes</a>
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-secondary">Explorar Blog</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-categories">
            <div class="container">
                <h2 class="section-title">Explora Nuestras Categorías</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="category-card">
                            <div class="category-image">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/photography-tutorials.jpg'); ?>" alt="Tutoriales de Fotografía">
                            </div>
                            <div class="category-content">
                                <h3>Tutoriales de Fotografía</h3>
                                <p>Aprende desde lo básico hasta técnicas avanzadas de fotografía.</p>
                                <a href="<?php echo esc_url(home_url('/categoria/tutoriales-fotografia/')); ?>" class="read-more">Explorar <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="category-card">
                            <div class="category-image">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/video-tutorials.jpg'); ?>" alt="Tutoriales de Video">
                            </div>
                            <div class="category-content">
                                <h3>Tutoriales de Video</h3>
                                <p>Domina la videografía con nuestras guías paso a paso.</p>
                                <a href="<?php echo esc_url(home_url('/categoria/tutoriales-video/')); ?>" class="read-more">Explorar <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="category-card">
                            <div class="category-image">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/gear-reviews.jpg'); ?>" alt="Reseñas de Equipos">
                            </div>
                            <div class="category-content">
                                <h3>Reseñas de Equipos</h3>
                                <p>Análisis detallados de cámaras, lentes y accesorios.</p>
                                <a href="<?php echo esc_url(home_url('/categoria/resenas-equipos/')); ?>" class="read-more">Explorar <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="latest-posts">
            <div class="container">
                <h2 class="section-title">Últimos Artículos</h2>
                <div class="row">
                    <?php
                    $latest_posts = new WP_Query(array(
                        'posts_per_page' => 6,
                        'post_type' => 'post',
                    ));

                    if ($latest_posts->have_posts()) :
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                    ?>
                        <div class="col-md-4">
                            <article class="post-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="post-content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-meta">
                                        <span class="post-date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                                        <span class="post-category"><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
                                    </div>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Leer más <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </main>
</div>