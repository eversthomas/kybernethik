<?php
/**
 * Page Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<main id="main-content">
    <article <?php post_class(); ?>>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </article>
</main>

<aside>
	<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>
