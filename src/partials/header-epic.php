<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
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
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/img/favicons/browserconfig.xml">
		<meta name="theme-color" content="#374b64">
		<?php wp_head(); ?>
		<?php if( is_single($post) ){ ?>
		<meta property="og:title" content="<?php echo single_post_title(); ?>" />
		<meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
		<?php } ?>
	</head>
	<body <?php body_class(); ?> data-spy="scroll" data-offset="50">
		<!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5KS55M"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-5KS55M');</script><!-- End Google Tag Manager -->
		<!-- <div id="preloader" class="preloader">&nbsp;</div> -->
		<nav id="epic-nav" class="epic-nav navbar navbar-default">
			<div class="dropdown signature-nav">
				<a href="#" title="<?php bloginfo('name'); ?>" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-bars" aria-hidden="true"></i>
					<span><?php bloginfo('name'); ?></span>
				</a>
				<!-- ul>li -->
				<?php
					wp_nav_menu( array(
						'menu'				=> 'global_nav',
						'theme_location'	=> 'global_nav',
						'depth'				=> 2,
						'container'			=> '',
						'menu_class'		=> 'dropdown-menu nav navbar-nav',
						'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
						'walker'			=> new wp_bootstrap_navwalker())
					);
				?>
		  </div>
			<h1>
				<?php
				$pagetitle = the_title('','',false);
				//$pagetitle = substr($pagetitle,0,30)."...";
				echo $pagetitle;
				?>
			</h1>
			<div class="navbar-right topics-nav">
				<a href="#" class="dropdown-toggle topic-selection" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tópicos</a>
				<ul class="dropdown-menu nav nabar-nav" id="topic-nav"></ul>
			</div>
			<div class="tracker">
				<div class="progress"></div>
			</div>
		</nav>
		<div class="social">
			<?php function getBitly($url) { $bitly = file_get_contents("http://api.bit.ly/v3/shorten?login=marketingrd&apiKey=R_7d8776cf13bd45b0bf4fa9376b1212c4&longUrl=$url%2F&format=txt"); return $bitly; } ?>
			<ul>
				<li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">Facebook</a></li>
				<li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php $bitly = getBitly(get_permalink($post->ID)); echo $bitly ?>&text=<?php echo single_post_title(); ?>&via=resdigitais" target="_blank">Twitter</a></li>
				<li class="google"><a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank">Google+</a></li>
				<li class="linkedin hidden-md"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo single_post_title(); ?>&source=<?php bloginfo('url'); ?>" target="_blank">LinkedIn</a></li>
				<li class="whatsapp hidden-sm hidden-md hidden-lg"><a href="whatsapp://send?text=<?php echo get_permalink(); ?>" data-action="share/whatsapp/share" target="_blank">LinkedIn</a></li>
			</ul>
			<div class="scroll-top"><span class="hidden-xs">Voltar ao Topo</span></div>
		</div>
		<main>
