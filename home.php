<?php
/**
 * Bloglist Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<?php // Beitragsbild (falls vorhanden)
				if (has_post_thumbnail()) { ?>
					<a href="<?php get_permalink(); ?>">
					<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>
			
			<!-- Titel mit Permalink -->
			<h2><a href="<?php get_permalink(); ?>"><?php get_the_title(); ?></a></h2>

			<!-- Metadaten: Erstellungsdatum & Autor -->
			<p>Veröffentlicht am <?php get_the_date(); ?> von <?php get_the_author(); ?></p>

			<!-- Excerpt (Kurzbeschreibung) -->
			<p><?php get_the_excerpt(); ?></p>

			<!-- "Weiterlesen" Link -->
			<p><a href="<?php get_permalink(); ?>"><?php __('Weiterlesen »', 'kybernethik'); ?></a></p>

		</article>
    <?php endwhile; ?>

    <!-- Pagination -->
    <?php
		the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('« Vorherige', 'kybernethik'),
        'next_text' => __('Nächste »', 'kybernethik'),
    	));
	endif; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
