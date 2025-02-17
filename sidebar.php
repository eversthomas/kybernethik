<aside id="secondary" class="widget-area">
    <?php get_search_form(); ?>

    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <p><?php esc_html_e('Hier könnten Widgets erscheinen.', 'textdomain'); ?></p>
    <?php endif; ?>
</aside>
