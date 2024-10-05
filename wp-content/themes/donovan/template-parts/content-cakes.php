<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    // Exibe a imagem de referência
    $imagem_de_referencia = get_field('imagem_de_referencia');
    if ($imagem_de_referencia) : ?>
        <div class="post-image">
            <img src="<?php echo esc_url($imagem_de_referencia); ?>" alt="<?php the_title(); ?>" />
        </div>
    <?php endif; ?>

    <div class="post-content">

        <header class="entry-header">

        <?php
        $titulo = get_field('titulo_');
        if ($titulo) {
            echo '<h2 class="entry-title" style="font-size: 23px; margin: 7px 0;"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . esc_html($titulo) . '</a></h2>';
        } else {
            echo '<h2 class="entry-title" style="font-size: 23px; margin: 7px 0;"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . esc_html(get_the_title()) . '</a></h2>';
        }
        ?>

        <div class="entry-meta">
            <?php
            echo donovan_entry_meta();

            $terms = get_the_terms(get_the_ID(), 'categoria');
            if ($terms && !is_wp_error($terms)) {
                $term_names = wp_list_pluck($terms, 'name');
                echo '<span class="cat-links">' . esc_html(implode(', ', $term_names)) . '</span>';
            }

            $tempo_de_preparo = get_field('tempo_de_preparo');
            if ($tempo_de_preparo) {
                echo '<p><strong>Preparo:</strong> ' . esc_html($tempo_de_preparo) . ' minutos</p>';
            }
            ?>
        </div><!-- .entry-meta -->

        </header><!-- .entry-header -->

        <div class="entry-content clearfix">
            <div class="post-description" style="display: flex; align-items: flex-start; flex-wrap: wrap;">
                <?php 
                // Exibe a descrição
                $modo_de_preparo = get_field('descricao');
                if ($modo_de_preparo) {
                    $modo_de_preparo_linhas = wp_trim_words($modo_de_preparo, 40, '...');
                    echo nl2br(wp_kses_post($modo_de_preparo_linhas));
                } else {
                    echo '<p>A descrição do modo de preparo não está disponível.</p>';
                }
                ?>
                
                <div class="read-more" style="margin-left: auto; margin-top: 0;">
                    <?php 
                    // Botão "Leia mais"
                    echo '<a href="' . esc_url(get_permalink()) . '" class="read-more-button">' . esc_html(donovan_get_option('read_more_text')) . '</a>'; 
                    ?>
                </div>
            </div><!-- .post-description -->

            <?php wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'donovan' ),
                'after'  => '</div>',
            ) ); ?>

        </div><!-- .entry-content -->

    </div>

    <footer class="entry-footer post-details">
        <?php donovan_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article>

