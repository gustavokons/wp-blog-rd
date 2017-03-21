<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="category-info col-md-12">
			<h1><?php single_cat_title( '', true ); ?></h1>
			<p class="posts-count"><?php if ( $wp_query->found_posts == 1){ echo $wp_query->found_posts ?> post publicado <?php } else { echo $wp_query->found_posts ?> posts publicados <?php } ?></p>
			<?php echo category_description(); ?>
		</section>
		<section class="col-md-9">
			<ul class="post-list">
			<?php
				if ( have_posts() ) :
				while ( have_posts() ) : the_post();
			?>

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

			<?php
				endwhile;
				endif;
			?>
			</ul>
			<?php wp_pagenavi(); ?>
		</section>
		<aside class="col-md-3 hidden-sm hidden-xs" role="complementary">
			<?php if ( is_active_sidebar( 'archives-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'archives-sidebar' ); ?>
			<?php endif; ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>
