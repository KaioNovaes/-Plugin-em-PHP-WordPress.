<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

        <header class="archive-header">
            <h1 class="archive-title"><?php printf( esc_html__( 'Resultados da pesquisa para: %s', 'donovan' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .archive-header -->

        <div id="post-wrapper" class="post-wrapper">

        <?php 
        while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php
                $imagem_de_referencia = get_field('imagem_de_referencia');

                if ($imagem_de_referencia) : ?>
                    <div class="post-image">
                        <img src="<?php echo esc_url($imagem_de_referencia); ?>" alt="<?php the_title(); ?>" />
                    </div>
                <?php endif; ?>

                <div class="post-content">

                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                    </header><!-- .entry-header -->

                    <div class="entry-meta">
                        <?php
                        echo donovan_entry_meta();

                        $tempo_de_preparo = get_post_meta(get_the_ID(), 'tempo_de_preparo', true);
                        if ($tempo_de_preparo) {
                            echo '<p><strong>Preparo:</strong> ' . esc_html($tempo_de_preparo) . ' minutos</p>'; // HH:MM
                        }
                        ?>
                    </div><!-- .entry-meta -->

                    <div class="entry-content clearfix">
                        <div class="post-description">
                            <?php 
                            $modo_de_preparo = get_field('descricao');
                            if ($modo_de_preparo) {
                                $modo_de_preparo_linhas = wp_trim_words($modo_de_preparo, 40, '...'); // 40 palavras
                                echo nl2br(wp_kses_post($modo_de_preparo_linhas));
                            } else {
                                echo '<p>A descrição do modo de preparo não está disponível.</p>';
                            }
                            ?>
                        </div><!-- .post-description -->

                    </div><!-- .entry-content -->

                </div>

            </article><!-- .post -->

        <?php endwhile; ?>

        </div><!-- #post-wrapper -->

    <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();