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

    if (is_page_template('templates/examples.php') || is_page_template('index.php')){
      wp_enqueue_script('example-slider',  get_template_directory_uri() . '/assets/js/example.js', null, null, true);
    }

    if (is_page_template('templates/ceilings.php')){
      wp_enqueue_script('furniture-modal',  get_template_directory_uri() . '/assets/js/ceilings.js', null, null, true);
    }
  }


  add_filter('wpcf7_autop_or_not', '__return_false');

  // Альтернатива через плагин: Rank Math → "Titles & Meta" → отключите индексацию для Date Archives, Tag Archives, Author Archives.

  // На что обратить внимание: noindex, follow позволяет Google передавать вес ссылок, но не индексировать саму страницу. Для полного закрытия используйте noindex, nofollow.

  // phpadd_action('wp_head', 'custom_noindex_archives');
  // function custom_noindex_archives() {
  //     if (is_date() || is_tag() || is_author()) {
  //         echo '<meta name="robots" content="noindex, follow">' . "\n";
  //     }
  // }

  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  function disable_embeds() {
      wp_dequeue_script('wp-embed');
  }
  add_action('wp_footer', 'disable_embeds');


  function add_menu(){
    register_nav_menu( 'top', 'Главное меню сайта');
    register_nav_menu( 'bottom', 'Политики');
  }
  

?>
