<?php get_header(); ?>

<main id="main" class="site-main">
    <header class="page-header">
        <h1 class="page-title">
            <?php printf(esc_html__('Suchergebnisse für: %s', 'textdomain'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>
    </header>

    <?php if (have_posts()) : ?>
        <ul class="search-results">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>

        <?php the_posts_navigation(); ?>
    
    <?php else : ?>
        <p><?php esc_html_e('Keine Ergebnisse gefunden.', 'textdomain'); ?></p>
    <?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
