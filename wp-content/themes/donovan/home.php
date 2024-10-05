<?php
get_header(); ?>

<div id="primary" class="content-archive content-area">
    <main id="main" class="site-main" role="main">

    <?php
    // Define os argumentos para a consulta
    $args = array(
        'post_type' => array('post', 'cakes'), 
        'posts_per_page' => 10, 
        'paged' => 1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        echo '<div id="post-wrapper" class="post-wrapper">';

        while ($query->have_posts()) : $query->the_post();
            if (get_post_type() === 'cakes') {
                get_template_part('template-parts/content', 'cakes');
            } else {
                get_template_part('template-parts/content', esc_attr(donovan_get_option('blog_content')));
            }
        endwhile;

        echo '</div>';
        if ($query->found_posts > 5) : ?>
            <button id="load-more" data-page="1"><?php esc_html_e('Veja mais...', 'donovan'); ?></button>
        <?php endif;

        wp_reset_postdata();

    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer(); 
?>

<script>
    document.getElementById('load-more').addEventListener('click', function() {
        var button = this;
        var page = parseInt(button.getAttribute('data-page')) + 1;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Adiciona os novos posts ao post-wrapper
                    document.getElementById('post-wrapper').innerHTML += response.data;

                    button.setAttribute('data-page', page); // Atualiza o número da página

                    if (response.no_more_posts) {
                        button.style.display = 'none'; // Esconde o botão se não houver mais posts
                    }
                }
            }
        };

        xhr.send('action=load_more&page=' + page + '&nonce=<?php echo wp_create_nonce('load_more_posts_nonce'); ?>');
    });
</script>


