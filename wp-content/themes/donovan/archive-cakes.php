<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

        <header class="archive-header">
            <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
            <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
        </header><!-- .archive-header -->

        <div id="post-wrapper" class="post-wrapper">

            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                    </header><!-- .entry-header -->
                </article><!-- .post -->
            <?php endwhile; ?>

        </div><!-- #post-wrapper -->

        <?php
        // Paginação
        the_posts_navigation();

    else :
        get_template_part( 'template-parts/content', 'none' );
    endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
