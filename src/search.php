<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="search-info col-md-12">
			<?php
				$mySearch =& new WP_Query("s=$s & showposts=-1");
				$num = $mySearch->post_count;
				if ( $num == 0 ){
			?>
			<h2>Sua busca por “<?php the_search_query(); ?>” não gerou resultados</h2>
			<?php } elseif ( $num == 1 ){ ?>
			<h2>Resultados da busca por “<?php the_search_query(); ?>”</h2>
			<p class="posts-count">Foi encontrado <strong>1</strong> post para sua pesquisa</p>
			<?php } elseif ( $num > 1 ){ ?>
			<h2>Resultados da busca por “<?php the_search_query(); ?>”</h2>
			<p class="posts-count">Foram encontrados <strong><?php echo $num ?></strong> posts para sua pesquisa</p>
			<?php } ?>
		</section>
		<section class="col-md-9">
			<?php if ( have_posts() ) : ?>
			<ul class="post-list">
			<?php while ( have_posts() ) : the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>" title="Clique para ler o post completo">
					<div class="hidden-xs">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/no_image.svg" class="img-responsive img-rounded" alt="<?php the_title(); ?>"><?php } ?>
					</div>
					<div>
						<h2><?php the_title(); ?></h2>
						<p class="info">Por <strong><?php the_author(); ?></strong> em <time datetime="<?php the_time('Y-n-j'); ?>"><?php the_time('d\/m\/Y'); ?></time> | <span class="hidden-xs sharing" data-url="<?php the_permalink() ?>"></p>
						<p class="excerpt"><?php echo shorten_text(get_the_excerpt()); ?></p>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
			</ul>
			<?php wp_pagenavi(); ?>
			<?php else: ?>
			<h3>Você pode tentar refinar sua busca</h3>
			<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
				<div class="input-group">
					<input type="search" class="form-control" name="s" placeholder="Insira aqui os termos de busca" required autofocus>
					<span class="input-group-btn"><button class="btn btn-primary" type="submit">Pesquisar</button></span>
				</div>
			</form>
			<p>Sugestões:</p>
			<ul>
				<li>Confira se os termos de sua busca estão escritos corretamente;</li>
				<li>Tente palavras diferentes;</li>
				<li>Tente palavras mais simples e abrangentes.</li>
			</ul>
			<?php endif; ?>
		</section>
		<aside class="col-md-3" role="complementary">
			<?php if ( is_active_sidebar( 'archives-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'archives-sidebar' ); ?>
			<?php endif; ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>
