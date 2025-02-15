<?php
/**
 * Single Blogpost Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<?= get_header(); ?>

<main>
	<article>

		<!-- Beitragsbild (falls vorhanden) -->
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?= get_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
		<?php endif; ?>


		<h2><?= get_the_title(); ?></h2>

    	<!-- Metadaten: Erstellungsdatum & Autor -->
		<p>Veröffentlicht am <?= get_the_date(); ?> von <?= get_the_author(); ?></p>

    	<!-- Excerpt (Kurzbeschreibung) -->
		<p><?= get_the_excerpt(); ?></p>
    	<?= the_content(); ?>
    
		<!-- Navigation zu vorherigem und nächstem Beitrag -->
    	<?php
			the_post_navigation(array(
        		'prev_text' => __('« %title', 'textdomain'),
        		'next_text' => __('%title »', 'textdomain'),
    		));
		?>
        
	</article>
</main>

<?= get_sidebar(); ?>

<?= get_footer(); ?>