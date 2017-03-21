<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="author-info">
			<figure>
				<?php echo get_avatar(get_the_author_meta('ID'), 112 ); ?>
			</figure>
			<div>
				<h2><?php the_author(); ?></h2>
				<p class="posts-count"><?php if ( get_the_author_posts() == 1){ echo get_the_author_posts(); ?> post publicado <?php } else { echo get_the_author_posts(); ?> posts publicados <?php } ?></p>
				<?php if(get_the_author_meta('description') ): ?><p><?php the_author_meta('description'); ?></p><?php endif; ?>
				<?php if(get_the_author_meta('user_url') || get_the_author_meta('facebook') || get_the_author_meta('twitter') || get_the_author_meta('googleplus') || get_the_author_meta('snapchat') || get_the_author_meta('linkedin') ): ?>
				<ul class="social">
					<?php if(get_the_author_meta('user_url') ): ?><li><a rel="nofollow" href="<?php the_author_meta('user_url'); ?>" target="_blank" class="website" title="Clique para ver o website"><?php the_author_meta('user_url'); ?></a></li><?php endif; ?>
					<?php if(get_the_author_meta('linkedin') ): ?><li><a rel="nofollow" href="https://www.linkedin.com/in/<?php the_author_meta('linkedin'); ?>" target="_blank" class="linkedin" title="Clique para ver o perfil no LinkedIn"><?php the_author_meta('linkedin'); ?></a></li><?php endif; ?>
					<?php if(get_the_author_meta('facebook') ): ?><li><a rel="nofollow" href="<?php the_author_meta('facebook'); ?>" target="_blank" class="facebook" title="Clique para ver o perfil no Facebook"><?php the_author_meta('facebook'); ?></a></li><?php endif; ?>
					<?php if(get_the_author_meta('twitter') ): ?><li><a rel="nofollow" href="https://twitter.com/<?php the_author_meta('twitter'); ?>" target="_blank" class="twitter" title="Clique para ver o perfil no Twitter"><?php the_author_meta('twitter'); ?></a></li><?php endif; ?>
					<?php if(get_the_author_meta('googleplus') ): ?><li><a rel="nofollow" href="https://plus.google.com/+<?php the_author_meta('googleplus'); ?>" target="_blank" class="google" title="Clique para ver o perfil no Google+"><?php the_author_meta('googleplus'); ?></a></li><?php endif; ?>
					<?php if(get_the_author_meta('snapchat') ): ?><li><a rel="nofollow" href="https://www.snapchat.com/add/<?php the_author_meta('snapchat'); ?>" target="_blank" class="snapchat" title="Clique para adicionar ao Snapchat"><?php the_author_meta('snapchat'); ?></a></li><?php endif; ?>
				</ul>
				<?php endif; ?>
			</div>
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
						<p class="info">Publicado em <time datetime="<?php the_time('Y-n-j'); ?>"><?php the_time('d\/m\/Y'); ?></time> | <span class="hidden-xs sharing" data-url="<?php the_permalink() ?>"></p>
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
