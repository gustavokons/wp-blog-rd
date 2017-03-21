<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<?php get_template_part('partials/tagmanager', 'head'); ?>

		<!-- Meta tags -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicons/manifest.json">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg" color="#374b64">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#374b64">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/img/favicons/browserconfig.xml">
		<meta name="theme-color" content="#374b64">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php get_template_part('partials/tagmanager', 'body'); ?>

		<nav class="global-nav navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-nav" aria-expanded="false">
						<span class="sr-only">Menu</span>
					</button>
					<a class="navbar-brand" href="http://resultadosdigitais.com.br" target="_blank">Resultados Digitais</a>
				</div>
				<?php
					wp_nav_menu( array(
						'menu'				=> 'global_nav',
						'theme_location'	=> 'global_nav',
						'depth'				=> 2,
						'container'			=> 'div',
						'container_class'	=> 'collapse navbar-collapse',
						'container_id'		=> 'global-nav',
						'menu_class'		=> 'nav navbar-nav navbar-right',
						'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
						'walker'			=> new wp_bootstrap_navwalker())
					);
				?>
			</div>
		</nav>
		<header>
			<div class="container">
				<?php if ( ! is_child_theme() ) { ?>
				<a href="<?php bloginfo('url'); ?>/blog/" title="<?php bloginfo('name'); ?>"><h1><?php bloginfo('name'); ?></h1></a>
				<?php } else { ?>
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><h1><?php bloginfo('name'); ?></h1></a>
				<?php } ?>
				<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
					<?php dynamic_sidebar( 'header-sidebar' ); ?>
				<?php endif; ?>
			</div>
			<nav class="main-nav navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
							<span class="sr-only">Menu</span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="main-nav">
						<?php
							wp_nav_menu( array(
								'menu'				=> 'main_nav',
								'theme_location'	=> 'main_nav',
								'depth'				=> 2,
								'container'			=> '',
								'container_class'	=> '',
								'container_id'		=> '',
								'menu_class'		=> 'nav navbar-nav',
								'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
								'walker'			=> new wp_bootstrap_navwalker())
							);
						?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#" data-toggle="modal" data-target="#search-modal">Buscar Post Again</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<main>
