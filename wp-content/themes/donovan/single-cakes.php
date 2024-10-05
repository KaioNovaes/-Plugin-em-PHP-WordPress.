<?php
/**
 * The template for displaying single posts of post type 'cakes'
 *
 * @package Donovan
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php
            // Exibir imagem de referência
            $imagem_de_referencia = get_field('imagem_de_referencia');
            if ($imagem_de_referencia) : ?>
                <div class="post-image">
                    <img src="<?php echo esc_url($imagem_de_referencia); ?>" alt="<?php the_title(); ?>" />
                </div>
            <?php endif; ?>

            <div class="post-content">

                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <?php
                        echo donovan_entry_meta();
                        
                        $tempo_de_preparo = get_post_meta(get_the_ID(), 'tempo_de_preparo', true);
                        if ($tempo_de_preparo) {
                            echo '<p><strong>Preparo:</strong> ' . esc_html($tempo_de_preparo) . ' minutos</p>'; // HH:MM
                        }
                        ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php

                    // Exibir descrição
                    $modo_de_preparo = get_field('descricao');
                    if ($modo_de_preparo) {
                        echo wp_kses_post($modo_de_preparo);
                    } else {
                        echo '<p>A descrição do modo de preparo não está disponível.</p>';
                    }
					// Exibe o campo "ingredientes"
                	$ingredientes = get_field('ingredientes');
					if ($ingredientes) {
						echo '<h2 style="margin-top: 15px; margin-bottom: 3px;">Ingredientes</h2>';
						echo nl2br(wp_kses_post($ingredientes));
					} else {
						echo '<p>A lista de ingredientes não está disponível.</p>';
					}

					?>
                </div><!-- .entry-content -->

            </div><!-- .post-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php
    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
