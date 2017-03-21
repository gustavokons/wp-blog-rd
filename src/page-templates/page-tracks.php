<?php
/*
Template Name: Percursos
*/
get_header();
?>

<div class="container">
	<div class="row">
		<section class="category-info col-md-12">
			<?php
				global $related;
				$rel = $related->show( get_the_ID(), true );
				the_title('<h1>','</h1>');
			?>
			<p class="posts-count"><?php if (count($rel) == 1){ echo count($rel) ?> post publicado <?php } else { echo count($rel) ?> posts publicados <?php } ?></p>
			<?php the_content(); ?>
		</section>
		<section class="col-md-9">
			<ol class="post-list">
				<?php
					if( is_array( $rel ) && count( $rel ) > 0 ) {
						foreach ( $rel as $r ) {
							if ( is_object( $r ) ) {
								if ($r->post_status != 'trash') {
									setup_postdata( $r );
				?>
				<li>
					<a href="<?php echo get_the_permalink( $r->ID ) ?>" title="Clique para ler o post completo">
						<h2><?php echo get_the_title( $r->ID ) ?></h2>
						<p class="info">Por <strong><?php the_author(); ?></strong> em <time datetime="<?php echo get_the_time('Y-n-j',$r->ID); ?>"><?php echo get_the_time('d\/m\/Y',$r->ID); ?></time></p>
					</a>
				</li>
				<?php
						}
					}
				}
				wp_reset_postdata();
				}
				?>
			</ol>
		</section>
		<aside class="col-md-3 hidden-sm hidden-xs" role="complementary">
			<?php if ( is_active_sidebar( 'archives-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'archives-sidebar' ); ?>
			<?php endif; ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>
