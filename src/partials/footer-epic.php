<div class="modal fade search-box" id="search-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <h2>Faça uma busca</h2>
      <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
        <div class="input-group">
          <input type="search" class="form-control" name="s" placeholder="Insira aqui os termos de busca" required>
          <span class="input-group-btn"><button class="btn btn-default" type="submit">Pesquisar</button></span>
        </div>
      </form>
      <h3 class="hidden-sm hidden-xs">Navegue pelas categorias</h3>
      <ul class="categories-list hidden-sm hidden-xs">
        <?php
          $args = array(
            'show_option_all'	=> '',
            'orderby'			=> 'term_group',
            'exclude'			=> '1, 113',
            'title_li'			=> '',
            'depth'				=> 2
          );
          wp_list_categories( $args );
        ?>
      </ul>
    </div>
  </div>
</div>
</main>
<footer>
<div class="signup">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Não perca mais nenhum post!</h2>
        <p>Assine nosso blog e receba novos posts diretamente em seu email.</p>
        <form id="rsssignsidebarform" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=ResultadosDigitais', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Digite aqui seu email" name="email" id="rsssignsidebarinputemail" required>
            <input type="hidden" value="ResultadosDigitais" name="uri">
            <input type="hidden" name="loc" value="pt_BR">
            <span class="input-group-btn">
              <input class="btn btn-primary" type="submit" id="rsssignsidebarbtnsubmit" value="Assinar">
            </span>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="" checked>Desejo também receber novidades sobre marketing digital.</label>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>Resultados Digitais</h2>
        <p>Copyright © <?php echo date('Y'); ?>. Conheça nossa <a href="<?php bloginfo('url'); ?>/politica-de-privacidade/" title="Política de privacidade">Política de privacidade</a>.</p>
      </div>
      <ul class="social-proof col-md-5">
        <li><a class="facebook" href="https://facebook.com/resultadosdigitais" target="_blank"><span>Facebook: </span><?php echo do_shortcode('[scp code="facebook"]') ?></a></li>
        <li><a class="twitter" href="https://twitter.com/resdigitais" target="_blank"><span>Twitter: </span><?php echo do_shortcode('[scp code="twitter"]') ?></a></li>
        <li><a class="google" href="https://plus.google.com/+ResultadosdigitaisBr" target="_blank"><span>Google: </span><?php echo do_shortcode('[scp code="googleplus"]') ?></a></li>
        <li class="hidden-xs"><a class="linkedin" href="https://www.linkedin.com/company/2629565" target="_blank"><span>Linkedin: </span><?php echo do_shortcode('[scp code="linkedin"]') ?></a></li>
      </ul>
    </div>
  </div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
