<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Donovan
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) :

            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                    </header><!-- .entry-header -->

                    <?php
                    // Verifique se é do tipo "cakes"
                    if ( get_post_type() === 'cakes' ) :
                        $imagem_de_referencia = get_field('imagem_de_referencia');
                        if ( $imagem_de_referencia ) : ?>
                            <div class="post-image">
                                <img src="<?php echo esc_url( $imagem_de_referencia ); ?>" alt="<?php the_title(); ?>" />
                            </div>
                        <?php endif; ?>

                        <div class="entry-meta">
                            <?php
                            $tempo_de_preparo = get_post_meta(get_the_ID(), 'tempo_de_preparo', true);
                            if ($tempo_de_preparo) {
                                echo '<p><strong>Preparo:</strong> ' . esc_html($tempo_de_preparo) . ' minutos</p>';
                            }
                            ?>
                        </div><!-- .entry-meta -->

                        <div class="entry-content">
                            <?php
                            $modo_de_preparo = get_field('descricao');
                            if ($modo_de_preparo) {
                                echo wp_trim_words($modo_de_preparo, 20, '...'); // Exibe 20 palavras
                            }
                            ?>
                        </div><!-- .entry-content -->

                    <?php else : // Para posts padrão ?>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-content -->
                    <?php endif; ?>

                </article><!-- .post -->

            <?php endwhile;

            donovan_pagination();

        else :
            get_template_part( 'template-parts/content', 'none' );
        endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
