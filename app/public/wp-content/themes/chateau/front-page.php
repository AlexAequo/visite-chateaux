<?php get_header(); ?>

<?php
    // Récupérer les valeurs des champs ACF
    $header_image = get_field('home__header_image'); // Assurez-vous que ce nom de champ correspond à celui défini dans ACF
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/minireset.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="front-page-header" style="background-image: url('<?php echo esc_url($header_image); ?>');">
        <div class="header-top">
        </div>
    </header>

    <main class="home-main">
        <section class="latest-posts">
            <div class="container">
                <?php
                // Query pour récupérer les 3 derniers articles
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                        <article class="post-column">
                            <?php if (get_field('post_image')) : ?>
                                <div class="post-thumbnail">
                                    <img src="<?php the_field('post_image'); ?>" alt="<?php the_title(); ?>" />
                                </div>
                            <?php endif; ?>
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_field('post_title'); ?></a></h2>
                            <div class="post-categories">
                                <?php echo get_the_category_list(', '); ?>
                            </div>
                            <div class="post-excerpt">
                                <?php echo wp_trim_words(get_field('post_excerpt'), 15, '...'); ?>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p><?php esc_html_e('No posts found.', 'text-domain'); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <section>
        <div class="related-posts-chateaux">
                <h2>Châteaux récents</h2>
                <main class="home-main-chateaux">
                    <section class="related-posts-chateaux">
                        <div class="container-chateaux">
                            <?php
                            // Query pour récupérer les 3 derniers articles du type de post personnalisé "chateaux"
                            $related_posts = new WP_Query(array(
                                'post_type' => 'chateaux',
                                'posts_per_page' => 3,
                                'post_status' => 'publish',
                                'post__not_in' => array(get_the_ID())
                            ));

                            if ($related_posts->have_posts()) :
                                while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <article class="post-column-chateaux">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="post-thumbnail-chateaux">
                                                <?php the_post_thumbnail('medium'); ?>
                                                <div class="overlay-chateaux">
                                                    <h2 class="post-title-chateaux"><?php the_title(); ?></h2>
                                                    <a href="<?php the_permalink(); ?>" class="discover-button-chateaux">Je découvre</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                <?php endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <p><?php esc_html_e('No posts found.', 'text-domain'); ?></p>
                            <?php endif; ?>
                        </div>
                    </section>
                </main>
            </div>
                </section>
    </main>

    <?php get_footer(); ?>

</body>
</html>
