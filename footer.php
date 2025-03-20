<?php
/**
 * El pie de página del tema
 *
 * @package Master_Photography_Videography
 */
?>

    </div><!-- #content -->

    <?php if (is_active_sidebar('adsense-bottom')) : ?>
        <div class="adsense-bottom-container">
            <?php dynamic_sidebar('adsense-bottom'); ?>
        </div>
    <?php endif; ?>

    <footer id="colophon" class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3>Sobre Nosotros</h3>
                            <p>Master Photography and Videography es tu recurso definitivo para aprender fotografía y videografía, desde conceptos básicos hasta técnicas avanzadas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3>Enlaces Rápidos</h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer-menu',
                                'depth'          => 1,
                            ));
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3>Síguenos</h3>
                            <div class="social-icons">
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>Diseñado con <i class="fas fa-heart"></i> para fotógrafos y videógrafos.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>