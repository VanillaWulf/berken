<?php
  add_action('wp_enqueue_scripts', 'add_scripts_and_styles');

  add_action('after_setup_theme', 'add_menu');
  function add_scripts_and_styles() {

    wp_enqueue_style( 'main', get_stylesheet_uri(), null);

    if (is_category('stairs')){
      wp_enqueue_script('mixitup',  get_template_directory_uri() . '/assets/js/mixitup.min.js', null, null, true);
    }

    if (is_single() && in_category('stairs')){
      wp_enqueue_script('product',  get_template_directory_uri() . '/assets/js/product.js', null, null, true);
    }

    if (is_page_template('templates/examples.php')){
      wp_enqueue_script('example-slider',  get_template_directory_uri() . '/assets/js/example.js', null, null, true);
    }

  }

  function add_menu(){
    register_nav_menu( 'top', 'Главное меню сайта');
    register_nav_menu( 'bottom', 'Политики');
  }

?>
