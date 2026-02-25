<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERKEM - Производство мебели и лестниц на заказ</title>
    <?php wp_head() ?>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content menu">
               <a href="<?= home_url(); ?>" class="logo">
                logo
                  <!-- <img src="./assets/images/logo.png" alt="logo"> logo -->
              </a>

                <nav class="nav">
                    <?php 
                        wp_nav_menu([
                            'theme_location' => 'top',
                            'container' => '',
                            'menu_class'=> 'nav-list',
                            'menu_id' => ''
                        ]);
                    ?>
                </nav>
                
                <div class="header-contact">
                    <?php
							$settings=get_posts( array(
								'numberposts'=> 1, 
								'category_name'=>'settings', // название рубрики на английском
								'post_type'   =>'post',
							) );
							foreach($settings as $post ) {
								?>
									<a href="tel:<?= CFS() -> get('tel_link')?>" class="phone-link"><?= CFS() -> get('tel_text')?></a>
								<?php
								}
								wp_reset_postdata();
					?>
                </div>
            </div>
        </div>
    </header>
