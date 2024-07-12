<?php /* Template Name: Custom template name */ ?>

<?php get_header() ?>

<header></header>


<?php
    // Récupérer les valeurs des champs ACF
    $header_image = get_field('home__header_image'); // Assurez-vous que ce nom de champ correspond à celui défini dans ACF
    $header_logo = get_field('home__header_logo'); // Idem
    $header_title = get_field('home__header_title'); // Idem
    ?>

    <header class="site-header" style="background-image: url('<?php echo esc_url($header_image); ?>');">
        <div class="header-top">
            <div class="logo">
                <?php if ($header_logo): ?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>">
                <?php else: ?>
                    <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>
            </div>





<main></main>

<?php get_footer() ?>
