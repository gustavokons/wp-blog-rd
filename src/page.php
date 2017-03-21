<?php get_header(); ?>
<div class="container">
	<section class="row">
		<?php
			if (have_posts()) :
			while (have_posts()) : the_post();
		?>
		<article class="col-md-9">
			<?php the_title('<h1>','</h1>'); ?>
			<?php the_content(); ?>
		</article>
		<aside class="col-md-3 hidden-sm hidden-xs" role="complementary">
			<?php if ( is_active_sidebar( 'pages-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'pages-sidebar' ); ?>
			<?php endif; ?>
		</aside>
		<?php
			endwhile;
			endif;
		?>
	</section>
</div>
<?php get_footer(); ?>