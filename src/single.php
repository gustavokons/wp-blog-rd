<?php get_header(); ?>
<div class="container">
	<section class="row" itemscope itemtype="http://schema.org/BlogPosting">
		<?php
			if (have_posts()) :
			while (have_posts()) : the_post();
		?>
		<div class="col-md-2 about" itemprop="author" itemscope itemtype="https://schema.org/Person">
			<?php echo get_avatar(get_the_author_meta('ID'), 64 ); ?>
			<p>Por <span itemprop="name"><?php the_author_posts_link(); ?></span></p>
			<time datetime="<?php the_time('Y-n-j'); ?>"><?php the_date(); ?></time>
			<p class="reading-time hidden-sm hidden-xs"><span class="minutes"></span> min. de leitura</p>
			<div class="social">
				<?php function getBitly($url) { $bitly = file_get_contents("http://api.bit.ly/v3/shorten?login=marketingrd&apiKey=R_7d8776cf13bd45b0bf4fa9376b1212c4&longUrl=$url%2F&format=txt"); return $bitly; } ?>
				<ul>
					<li class="facebook"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">Facebook</a></li>
					<li class="twitter"><a href="https://twitter.com/intent/tweet?url=<?php $bitly = getBitly(get_permalink($post->ID)); echo $bitly ?>&text=<?php echo single_post_title(); ?>&via=resdigitais" target="_blank">Twitter</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank">Google+</a></li>
					<li class="linkedin hidden-md"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo single_post_title(); ?>&source=<?php bloginfo('url'); ?>" target="_blank">LinkedIn</a></li>
					<li class="whatsapp hidden-sm hidden-md hidden-lg"><a href="whatsapp://send?text=<?php echo get_permalink(); ?>" data-action="share/whatsapp/share" target="_blank">LinkedIn</a></li>
				</ul>
				<p class="hidden-sm hidden-xs sharing" data-url="<?php echo get_permalink(); ?>"></p>
				<a class="hidden-sm hidden-xs comments" href="<?php echo get_permalink(); ?>#disqus_thread">Nenhum comentário</a>
			</div>
		</div>
		<article class="col-md-10">
			<header>
				<?php the_title('<h1 itemprop="headline">','</h1>'); ?>
				<?php if (has_excerpt()) {?><p itemprop="description"><?php echo get_the_excerpt(); ?></p><?php } ?>
				<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>
				<meta itemprop="datePublished" content="<?php the_time('Y-n-j'); ?>"/>
				<meta itemprop="dateModified" content="<?php the_modified_date('Y-n-j'); ?>"/>
				<span class="hidden" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/img/resultados_digitais.png">
						<meta itemprop="width" content="1000">
						<meta itemprop="height" content="130">
					</span>
					<meta itemprop="name" content="Resultados Digitais">
				</span>
				<span class="hidden" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
					<meta itemprop="url" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>">
					<meta itemprop="width" content="<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $img[1] ?>">
					<meta itemprop="height" content="<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $img[2] ?>">
				</span>
			</header>
			<div class="row">
				<main class="col-md-9 post" itemprop="articleBody">
					<?php the_content(); ?>
					<h2 class="categories-list">Marcadores:</h2>
					<?php echo get_the_category_list(); ?>
				</main>
				<aside class="col-md-3 hidden-sm hidden-xs" role="complementary">
					<?php if ( is_active_sidebar( 'posts-sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'posts-sidebar' ); ?>
					<?php endif; ?>
				</aside>
			</div>
			<footer class="row">
				<div class="col-md-9">
					<h2>Deixe seu comentário</h2>
					<div class="alert alert-warning" role="alert">
						<p><strong>Atenção</strong>: Os comentários abaixo são de inteira responsabilidade de seus respectivos autores e não representam, necessariamente, a opinião da Resultados Digitais.</p>
					</div>
					<?php if (comments_open()) : ?>
					<div id="disqus_thread"></div>
					<?php endif; ?>
				</div>
			</footer>
		</article>
		<?php
			endwhile;
			endif;
		?>
	</section>
</div>
<?php get_footer(); ?>
