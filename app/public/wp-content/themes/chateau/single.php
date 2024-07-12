<?php get_header(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/minireset.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/single.css">
    <?php wp_head(); ?>
</head>

<?php
    // Récupérer les valeurs des champs ACF
    $post_image = get_field('post_image');
?>
<header class="single-header" style="background-image: url('<?php echo esc_url($post_image); ?>');">
</header>

<div class="content">
    <div class="container">
    <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <div class="post-meta">
                        <span class="post-category">
                            <?php 
                            $category = get_the_category(); 
                            if ( $category ) {
                                echo esc_html( $category[0]->name );
                            }
                            ?>
                        </span>
                        <span class="post-date">
                            <?php echo get_the_date('j F Y'); ?>
                        </span>
                        <span class="post-author">
                            par <?php the_author(); ?>
                        </span>
                    </div>

                   

                    <div class="entry-summary">
                        <?php if ( get_field('summary') ) : ?>
                            <p><?php the_field('summary'); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="entry-content">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; 
        endif; 
        ?>
        
        <div class="related-posts">
            <h2>Articles récents</h2>
            <main class="home-main">
                <section class="related-posts">
                    <div class="container">
                        <?php
                        // Query pour récupérer les 3 derniers articles, en excluant l'article actuel (différence avec la page front-page)
                        $related_posts = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'post__not_in' => array(get_the_ID())
                        ));
                        if ($related_posts->have_posts()) :
                            while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                <article class="post-column">
                                    <?php if (get_field('post_image')) : ?>
                                        <div class="post-thumbnail">
                                            <img src="<?php the_field('post_image'); ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                    <?php endif; ?>
                                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_field('post_title'); ?></a></h2>
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
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>
