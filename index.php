<?php
	/* 
	Template name: главная
	*/
	get_header() 
?>
    <main>
        <!-- Hero Section -->
        <section class="hero" style="background-image: url(<?=CFS()->get('hero_bkg') ?>);">
            <div class="container hero-content">
                <h1 class="hero-title"><?= CFS()->get('hero_title')?></h1>
                <p class="hero-subtitle"><?= CFS()->get('hero_text')?></p>
                <a class="btn btn-primary" href="#call">Заказать звонок</a>
            </div>
        </section>

        <!-- Products Section -->
        <section class="popular-products">
            <div class="container">
                <h2 class="section-title">Популярные товары</h2>

                <div class="products-grid popular-products-wrp">

                    <?php
                        $popular_posts = get_posts(array(
                            'category' => 10, 
                            'numberposts' => 12,
                            'post_status' => 'publish'
                        ));

                        foreach ($popular_posts as $post) :
                            setup_postdata($post);
                        ?>
                            <div class="product-card">
                                    <?php $loop = CFS()->get('stair_img_list'); ?>
                                    <?php $first_img = !empty($loop) ? reset($loop) : null; ?>
                                    <img src="<?= $first_img ? $first_img['stair_img'] : 'https://placehold.co/600x400/8B4513/FFFFFF?text=Основное+фото' ?>" 
                                    alt="<?= $first_img ? get_post_meta(attachment_url_to_postid($first_img['stair_img']), '_wp_attachment_image_alt', true) : 'Деревянная лестница' ?>" 
                                    class="product-img">
                                    <h3><?php the_title(); ?></h3>
                                    <p class="product-price">от <?= CFS()-> get('stair_price')?> ₽</p>
                                    <a href="<?php the_permalink()?>" class="btn btn-secondary">Подробнее</a>
                                </div>
                        <?php endforeach; 
                        wp_reset_postdata(); 
                        ?>

            
                </div>
                <a class="btn btn-primary btn-center btn-big" href="<?= esc_url(get_category_link(get_term_by('slug', 'stairs', 'category'))); ?>">В каталог</a>
            </div>
          
        </section>
      

        <!-- Stages Section -->
        <section class="stages">
            <div class="container">
                <h2 class="section-title">Этапы работы</h2>
                <div class="stages-list">
                    <?php 
                        $loop = CFS()->get('stages_list'); 
                        $counter = 1;    
                        foreach($loop as $row){
                            ?>

                            <div class="stage-item">
                                <span class="stage-number"><?= $counter ?></span>
                                <h3 class="stage-title"><?= $row['stages_title']?></h3>
                                <p class="stage-desc"><?= $row['stages_text']?></p>
                            </div>
                        <?php 
                        $counter++;
                        }

                    ?>
                </div>
            </div>
        </section>

        <!-- Example section -->

        <section class="examples-list">
            <div class="container">
                <h2 class="section-title">Примеры работ</h2>

                <div class="works-list main-work-list">

                <?php

                    $posts=get_posts( array(
                    'numberposts'=>3, 
                    'category_name'=>'examples',
                    'orderby'     =>'title', 
                    'order'       =>'ASC', 
                    'post_type'   =>'post',
                    'suppress_filters'=>true,

                    ) );
                    
                    $counter = 1;  
                    
                    foreach( $posts as $post ){

                        setup_postdata($post);

                            ?>
                            <div class="work-card" data-card-id="<?= $counter?>">
                                <div class="card-slider">
                                     <div class="slider-images">
                                     <?php 
                                        $img_loop =  CFS()->get('example_img_loop');
                                        foreach($img_loop as $index => $img_row){
                                            $active_class = $index === 0 ? 'active' : '';
                                            ?>
                                            <img class="slider-img <?= $active_class ?>"
                                                onclick="slideNext(<?= $counter?>)" 
                                                src="<?= $img_row['example_img'] ?>" 
                                                alt="<?= get_post_meta(attachment_url_to_postid($img_row['example_img']), '_wp_attachment_image_alt', true) ?>">
                                        <?php
                                        }


                                    ?>
                                    </div>
                                    <?php if(count($img_loop) > 1) {?>
                                        <button class="slider-btn prev" onclick="slidePrev(<?= $counter?>)">&#10094;</button>
                                        <button class="slider-btn next" onclick="slideNext(<?= $counter?>)">&#10095;</button>
                                        <div class="slider-dots">
                                            <?php 
                                                foreach($img_loop as $index => $slide_row){ 
                                                    $active_class = $index === 0 ? 'active' : '';
                                                    ?>
                                                
                                                    <span class="dot <?= $active_class ?>" onclick="goToSlide(<?= $counter?>, <?=$index?>)"></span>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    <?php 
                                        }
                                    ?>
                                </div>
                                <div class="card-info">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="card-description"><?php the_content(); ?></div>
                                    <?php if(!empty( CFS()->get('example_price'))) {
                                        ?>
                                         <p class="card-price">цена <?= CFS()->get('example_price') ?></p>
                                        <?php 
                                    }?>
                                    <!-- <a class="btn btn-primary" href="#call">Заказать</a> -->
                                </div>
                             </div>   



                            <?php
                            $counter++;
                        }
                    wp_reset_postdata();

                    ?> 
                </div>
                <a class="btn btn-primary btn-center btn-big" href="<?= home_url('/primery-rabot') ?>">Еще примеры</a>
           
            </div>
        </section>

                <!-- About Section -->
                <section class="advantages">
            <div class="container">
                <h2 class="section-title">Наши преимущества</h2>
                <div class="advantages-grid">

                <?php 
                    $loop = CFS()->get('adv_list');    
                    foreach($loop as $row){
                        ?>
                        <div class="advantage-card">
                            <img class="advantage-icon" src="<?= $row['adv_img']?>" 
                            alt="<?= get_post_meta(attachment_url_to_postid($row['adv_img']), '_wp_attachment_image_alt', true)?>">
                          

                            <h3 class="advantage-title"><?= $row['adv_title']?></h3>
                            <p class="advantage-desc"><?= $row['adv_text']?></p>
                        </div>
                        <?php 
                    }
  
                ?>
                </div>
            </div>
        </section>


        <!-- About section -->
        <section class="about-company">
            <div class="container">
                <h2 class="section-title">О компании</h2>
                <div class="text">
                    <?php the_content();?>              
                </div>
            </div>
        </section>

        <!-- Callback Form -->
        <section class="callback" id="call">
           

            <div class="container">
                <h2 class="section-title">Закажите обратный звонок</h2>
                <?= do_shortcode('[contact-form-7 id="54a05e0" title="call-form" html_class="callback-form"]') ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>