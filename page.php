<?php
/**
 * Page Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<?= get_header(); ?>

<main>
    <article>
        <h2><?= the_title(); ?></h2>
        <?= the_content(); ?>
    </article>
</main>

<aside>
	<?= get_sidebar(); ?>
</aside>

<?= get_footer(); ?>