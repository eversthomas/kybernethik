<?php
/**
 * Single Blogpost Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<main id="main-content">
	<article <?php post_class(); ?>>

		<!-- Beitragsbild (falls vorhanden) -->
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php get_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
		<?php endif; ?>


		<h2><?php get_the_title(); ?></h2>

    	<!-- Metadaten: Erstellungsdatum & Autor -->
		<p>Veröffentlicht am <?php get_the_date(); ?> von <?php get_the_author(); ?></p>

    	<!-- Excerpt (Kurzbeschreibung) -->
		<p><?php get_the_excerpt(); ?></p>
    	<?php the_content(); ?>
	<?php wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Seiten:', 'kybernethik'),
			'after'  => '</div>',
		)); ?>
    
		<!-- Navigation zu vorherigem und nächstem Beitrag -->
    	<?php
			the_post_navigation(array(
        		'prev_text' => __('« %title', 'kybernethik'),
        		'next_text' => __('%title »', 'kybernethik'),
    		));
		?>
        
	</article>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
