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
            <?php 

				$settings=get_posts( array(
					'numberposts'=> 1, 
					'category_name'=>'settings', 
					'post_type'   =>'post',
				) );
            ?>
            <div class="header-content menu">
               <a href="<?= home_url(); ?>" class="logo">
               <?php foreach($settings as $post ) { ?>
                 <img src="<?= CFS() -> get('logo')?>" alt="logo">
                <?php } ?>
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
