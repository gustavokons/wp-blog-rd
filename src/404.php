<?php get_header(); ?>
	<div class="container">
		<section class="row">
			<div class="error-msg col-md-8 col-md-offset-2">
				<img src="<?php echo get_template_directory_uri(); ?>/img/astronauta.svg" class="img-responsive">
				<h2>Página não encontrada :(</h2>
				<p>A página que você tentou acessar está indisponível ou não existe.</p>				
				<a href="javascript:history.go(-1);" class="btn btn-primary">Retornar à página anterior</a>
				<a href="<?php bloginfo('url'); ?>" class="btn btn-default">Ir para a página inicial</a>				
			</div>
			<div class="col-md-8 col-md-offset-2">
				<h2 class="hidden-xs">Faça uma busca</h2>
				<form class="hidden-xs" action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
					<div class="input-group">
						<input type="search" class="form-control" name="s" placeholder="Insira aqui os termos de busca" required autofocus>
						<span class="input-group-btn"><input class="btn btn-primary" type="submit" value="Pesquisar"></span>
					</div>
				</form>
				<h2 class="hidden-xs">Conheça nossos últimos materiais educativos</h2>
				<ul class="row hidden-xs">
					<?php
						global $switched;
						switch_to_blog(4);				
						$args = array (
							'post_type'              => array( 'resources' ),
							'post_status'            => array( 'publish' ),
							'nopaging'               => false,
							'posts_per_page'         => '3',
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();

						?>
						<li class="col-md-4 col-sm-4">
							<a href="<?php echo get_post_meta(get_the_ID(), 'rd_material_link', true); ?>" title="Clique para ver mais detalhes" target="_blank">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/no_image.svg" alt="<?php the_title(); ?>"><?php } ?>
								<h3><?php the_title(); ?></h3>								
							</a>
						</li>							
						<?php
								// do something
							}
						} 
						wp_reset_postdata();
					?>

				<?php restore_current_blog(); //switched back to main site ?>				
			</div>
		</section>
	</div>
<?php get_footer(); ?>
