<?php
    // Récupérer les valeurs des champs ACF
    $header_logo = get_field('header_logo', get_option('page_on_front')); ?>
  



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="header-top">
            <nav class="main-nav">
                <ul class="nav-menu">
                    <li><a href="<?php echo esc_url(home_url('/notre-histoire')); ?>">Notre Histoire</a></li>
                    <li><a href="<?php echo esc_url(home_url('/nos-visites')); ?>">Nos Visites</a></li>
                    <li><a href="<?php echo esc_url(home_url('/nos-tarifs')); ?>">Nos Tarifs</a></li>
                    <li><a href="<?php echo esc_url(home_url('/les-chateaux')); ?>">Les Châteaux</a></li>
                </ul>
            </nav>
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                <div class="logo">
                <?php if ($header_logo): ?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>">
                <?php else: ?>
                    <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>
            </div>
                                       
                </a>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
        <div class="container">
