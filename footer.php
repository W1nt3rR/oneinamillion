<?php
$custom_text = esc_html(get_theme_mod('custom_text', __('© Copyright Cogflake & Snowheel Company.', 'custom-theme')));
$custom_link = esc_html(get_theme_mod('custom_link', __('https://github.com/W1nt3rR', 'custom-theme')));
?>

<footer class="footer">
    <div id="sidebar">
        <?php
        $sidebars = [
            'sidebar-widgets-left',
            'sidebar-widgets-center',
            'sidebar-widgets-right',
        ];

        foreach ($sidebars as $sidebar) {
            if (is_active_sidebar($sidebar)) : ?>
                <ul id="sidebar-widget-list">
                    <?php dynamic_sidebar($sidebar); ?>
                </ul>
        <?php endif;
        }
        ?>
    </div>

    <p class="copyright">
        <a class="copyright-link" href="<?= $custom_link; ?>">
            <?= $custom_text; ?>
        </a>
    </p>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>