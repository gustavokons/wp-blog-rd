<?php
/*
Template Name: Página Épica
*/
get_template_part('partials/header', 'epic');
?>

<?php
if (have_posts()) :
while (have_posts()) : the_post();
?>
<article class="epic-article" data-spy="scroll" data-target="#topic-nav">

	<?php the_content(); ?>

	<?php
		endwhile;
		endif;
	?>

	<section>
	  <div class="container">
	    <div class="row">
	      <div class="col-md-10 col-md-offset-1">
	        <h3>Lista de Posts Relacionados a <?php
					$pagetitle = the_title('','',false);
					//$pagetitle = substr($pagetitle,0,30)."...";
					echo $pagetitle;
					?>:</h3>
					<?php
					  global $related;
					  $rel = $related->show( get_the_ID(), true );
					?>
	        <ul class="related_posts row">
	          <?php
	            if( is_array( $rel ) && count( $rel ) > 0 ) {
	              foreach ( $rel as $r ) {
	                if ( is_object( $r ) ) {
	                  if ($r->post_status != 'trash') {
	                    setup_postdata( $r );
	          ?>
	          <li class="col-md-4">
	            <a href="<?php echo get_the_permalink( $r->ID ) ?>" title="Clique para ler o post completo" class="rp_thumbnail">
	              <?php if ( has_post_thumbnail($r->ID) ) { echo get_the_post_thumbnail($r->ID,array(64,64),'thumbnail'); } else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/no_image.svg" class="img-responsive img-rounded" alt="<?php the_title(); ?>"><?php } ?>
	            </a>
	            <a href="<?php echo get_the_permalink( $r->ID ) ?>" title="Clique para ler o post completo" class="rp_title">
	              <?php
	                $posttitle = get_the_title( $r->ID );
	                echo mb_strimwidth($posttitle, 0, 56, '...');
	              ?>
	            </a>
	          </li>
	          <?php
	              }
	            }
	          }
	          wp_reset_postdata();
	          }
	          ?>
	        </ul>
	    </div>
	   </div>
	  </div>
	</section>
	<footer class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3>Deixe seu comentário</h3>
				<div class="alert alert-warning" role="alert">
					<p><strong>Atenção</strong>: Os comentários abaixo são de inteira responsabilidade de seus respectivos autores e não representam, necessariamente, a opinião da Resultados Digitais.</p>
				</div>
				<?php if (comments_open()) : ?>
				<div id="disqus_thread"></div>
				<?php endif; ?>
			</div>
		</div>
	</footer>

</article>

<?php get_template_part('partials/footer', 'epic'); ?>
