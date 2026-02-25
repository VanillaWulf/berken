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
                        $loop = CFS()->get('example_loop'); 
                        $counter = 1;    
                        foreach($loop as $row){
                            ?>

                            <div class="work-card" data-card-id="<?= $counter?>">
                                <div class="card-slider">
                                     <div class="slider-images">
                                     <?php 
                                        $img_loop = $row['example_img_loop'];
                                        foreach($img_loop as $index => $img_row){
                                            $active_class = $index === 0 ? 'active' : '';
                                            ?>
                                            <img class="slider-img <?= $active_class ?>" 
                                                src="<?= $img_row['example_img'] ?>" 
                                                alt="<?= get_post_meta(attachment_url_to_postid($img_row['example_img']), '_wp_attachment_image_alt', true) ?>">
                                        <?php
                                        }


                                    ?>
                                    </div>
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
                                </div>
                                <div class="card-info">
                                    <h3><?= $row['example_name']?></h3>
                                    <p class="card-description"><?= $row['example_text']?></p>
                                    <?php if(!empty($row['example_price'])) {
                                        ?>
                                         <p class="card-price">от <?= $row['example_price']?></p>
                                        <?php 
                                    }?>
                                </div>
                             </div>   
                            <?php 
                            $counter++;
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>