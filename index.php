<?php
	/* 
	Template name: главная
	*/
	get_header() 
?>
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
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
                            'category' => 10, // или 'popular' (slug)
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
      

        <!-- Advantages Section -->
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

        <!-- Callback Form -->
        <section class="callback" id="call">
            <div class="container">
                <h2 class="section-title">Закажите обратный звонок</h2>
                <form class="callback-form">
                    <input type="text" placeholder="Ваше имя" required>
                    <input type="tel" placeholder="Ваш телефон" required>
                    <label class="checkbox-label">
                        <input type="checkbox" required>
                        <span>Я согласен на <a href="personal-data.html" target="_blank">обработку персональных данных</a> в соответствии с <a href="privacy.html" target="_blank">политикой конфиденциальности</a></span>
                    </label>
                    <button type="submit" class="btn btn-primary">Заказать консультацию</button>
                </form>
            </div>
        </section>
    </main>

<?php get_footer(); ?>