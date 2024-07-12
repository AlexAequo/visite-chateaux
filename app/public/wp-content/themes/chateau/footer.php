<?php wp_footer(); ?>

<?php
    // Récupérer l'image du footer via ACF
    $footer_image = get_field('footer_image');
?>


<footer>
    <div class="footer-content">
        <div class="footer-image">
            <?php if ($footer_image): ?>
                <img src="<?php echo esc_url($footer_image['url']); ?>" alt="<?php echo esc_attr($footer_image['alt']); ?>">
            <?php endif; ?>
        </div>
        <div class="footer-links">
            <a href="<?php echo esc_url(home_url('/notre-histoire')); ?>">Notre Histoire</a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
            <a href="<?php echo esc_url(home_url('/mentions-legales')); ?>">Mentions Légales</a>
        </div>
    </div>
</footer>

</body>
</html>




