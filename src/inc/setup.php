<?php
    require_once('class/wp_bootstrap_navwalker.php');

    function resdigitais_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('html5');
        add_theme_support('post-thumbnails');

        register_nav_menus( array(
            'global_nav' => __('Navegação Global', 'resdigitais'),
            'main_nav' => __('Navegação Principal', 'resdigitais')
        ));
    }
    add_action('after_setup_theme', 'resdigitais_setup');

    function add_theme_scripts() {
    	wp_enqueue_style('style', get_stylesheet_uri(), array(), 1.80);
    	wp_enqueue_script('script-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array ('jquery'), 1.0, true);
    	wp_enqueue_script('script-integration', 'https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js', array (), 1.0, true);
    	wp_enqueue_script('script-tracking', 'https://d335luupugsy2.cloudfront.net/js/loader-scripts/a61266fa-9dde-44e3-8068-cfb69d8fe4aa-loader.js', array (), 1.0, true);
        wp_enqueue_script('script-headroom', 'https://npmcdn.com/headroom.js@0.9.3/dist/headroom.min.js', array ('jquery'), null, false);
    	wp_enqueue_script('script-disqus', 'https://resultadosdigitais.disqus.com/count.js', array () , 1.0, true);
        wp_enqueue_script('script-blog', get_template_directory_uri() . '/js/scripts.js', array ('jquery'), 1.0, true);
    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts');

    function resdigitais_widgets_init() {
    	register_sidebar( array(
    		'name'          => __('Página inicial', 'resdigitais'),
    		'id'            => 'home-sidebar',
    		'description'   => __('Adicione aqui widgets que serão exibidos na página inicial.', 'resdigitais'),
    		'before_widget' => '<section>',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>',
    	));
    	register_sidebar( array(
    		'name'          => __('Posts', 'resdigitais'),
    		'id'            => 'posts-sidebar',
    		'description'   => __('Adicione aqui widgets que serão exibidos nos posts.', 'resdigitais'),
    		'before_widget' => '<section>',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>',
    	));
    	register_sidebar( array(
    		'name'          => __('Listas de arquivo', 'resdigitais'),
    		'id'            => 'archives-sidebar',
    		'description'   => __('Adicione aqui widgets que serão exibidos nas listas de posts.', 'resdigitais'),
    		'before_widget' => '<section>',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>',
    	));
    	register_sidebar( array(
    		'name'          => __('Páginas', 'resdigitais'),
    		'id'            => 'pages-sidebar',
    		'description'   => __('Adicione aqui widgets que serão exibidos nas páginas.', 'resdigitais'),
    		'before_widget' => '<section>',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>',
    	));
    	register_sidebar( array(
    		'name'          => __('Oferta de Cabeçalho', 'resdigitais'),
    		'id'            => 'header-sidebar',
    		'description'   => __('Adicione aqui uma oferta de destaque no cabeçalho do blog.', 'resdigitais'),
    		'before_widget' => '<section class="global-offer hidden-sm hidden-xs">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>',
    	));
    }
    add_action('widgets_init', 'resdigitais_widgets_init');

    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'wp_generator');

    global $wp_rewrite;
    $wp_rewrite->author_base = 'autor';
    $wp_rewrite->flush_rules();
