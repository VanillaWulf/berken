<?php
	/* 
	Template name: примеры работ
	*/
	get_header() 
?>
   
   <main>
        <section class="page-header">
            <div class="container">
                <h1><?php the_title();?></h1>
            </div>
        </section>

        <section class="examples-list">
            <div class="container">
                <div class="works-list">

                <?php

                    $posts=get_posts( array(
                    'numberposts'=>0, 
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
                                         <p class="card-price">цена: <?= CFS()->get('example_price') ?></p>
                                        <?php 
                                    }?>
                                    <a class="btn btn-primary" href="#call">Заказать</a>
                                </div>
                             </div>   



                            <?php

                        $counter++;
                        }
                    wp_reset_postdata();

                    ?> 
                </div>
            </div>
        </section>
        <section class="callback" id="call">
           

           <div class="container">
               <h2 class="section-title">Закажите звонок</h2>
               <?= do_shortcode('[contact-form-7 id="54a05e0" title="call-form" html_class="callback-form"]') ?>
           </div>
       </section>
    </main>
<?php get_footer(); ?>