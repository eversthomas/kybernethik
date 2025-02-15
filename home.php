<?php
/**
 * Bloglist Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<?= get_header(); ?>

<main>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<?php // Beitragsbild (falls vorhanden)
				if (has_post_thumbnail()) { ?>
					<a href="<?= get_permalink(); ?>">
					<?php the_post_thumbnail('medium'); ?>
					</a>
				<?php } ?>
			
			<!-- Titel mit Permalink -->
			<h2><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h2>

			<!-- Metadaten: Erstellungsdatum & Autor -->
			<p>Veröffentlicht am <?= get_the_date(); ?> von <?= get_the_author(); ?></p>

			<!-- Excerpt (Kurzbeschreibung) -->
			<p><?= get_the_excerpt(); ?></p>

			<!-- "Weiterlesen" Link -->
			<p><a href="<?= get_permalink(); ?>"><?=__('Weiterlesen »', 'textdomain'); ?></a></p>

		</article>
    <?php endwhile; ?>

    <!-- Pagination -->
    <?php
		the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('« Vorherige', 'textdomain'),
        'next_text' => __('Nächste »', 'textdomain'),
    	));
	endif; ?>

</main>

<?= get_sidebar(); ?>

<?= get_footer(); ?>