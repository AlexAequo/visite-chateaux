<?php get_header(); ?>

<main class="category-main">
    <section class="category-posts">
        <div class="container">
            <?php if (have_posts()) : ?>
                <header class="archive-header">
                    <h1 class="archive-title">
                        <?php single_cat_title(); ?>
                    </h1>
                    <?php
                    // Affiche la description de la catégorie
                    if (category_description()) {
                        echo '<div class="archive-description">' . category_description() . '</div>';
                    }
                    ?>
                </header><!-- .archive-header -->
                
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post-column">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="post-meta">
                                <?php the_time('F j, Y'); ?> | <?php the_author(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div><!-- .posts-grid -->

                <div class="pagination">
                    <?php
                    // Pagination
                    the_posts_pagination(array(
                        'prev_text' => __('Previous', 'text-domain'),
                        'next_text' => __('Next', 'text-domain'),
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p><?php esc_html_e('No posts found.', 'text-domain'); ?></p>
            <?php endif; ?>
        </div><!-- .container -->
    </section><!-- .category-posts -->
</main><!-- .category-main -->

<?php get_footer(); ?>
