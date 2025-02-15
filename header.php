<?php
/**
 * Head and Header Template
 * @package Kybernethik
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header>
    	<div class="header-inner">
			<h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>

			<nav>
				<?php wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'menu_class' => 'header-menu'
				)); ?>
			</nav>
		</div>
    </header>
