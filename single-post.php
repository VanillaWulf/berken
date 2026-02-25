<?php get_header(); ?>

    <main>
        <section class="product-page">
            <div class="container">
                <div class="product-content">
                    <div class="product-gallery">
                        <?php $loop = CFS()->get('stair_img_list'); ?>

                        <div class="gallery-main">
                            <?php $first_img = !empty($loop) ? reset($loop) : null; ?>
                            <img src="<?= $first_img ? $first_img['stair_img'] : 'https://placehold.co/600x400/8B4513/FFFFFF?text=Основное+фото' ?>" 
                                alt="<?= $first_img ? get_post_meta(attachment_url_to_postid($first_img['stair_img']), '_wp_attachment_image_alt', true) : 'Деревянная лестница' ?>" 
                                id="main-image">
                        </div>

                        <div class="gallery-thumbs">
                            <?php foreach($loop as $index => $row){ ?>
                                <img class="thumb <?= $index == 0 ? 'active' : '' ?>" 
                                    src="<?= $row['stair_img'] ?>" 
                                    onclick="changeImage(this)"
                                    alt="<?= get_post_meta(attachment_url_to_postid($row['stair_img']), '_wp_attachment_image_alt', true) ?>">
                            <?php } ?>
                        </div>
                    </div>            
                
                    
                    <div class="product-info">
                        <h1 class="product-title"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <div class="product-price">от <?= CFS()->get('stair_price'); ?> &#8381;</div>
                        
                        <div class="product-specs">
                            <h3>Характеристики:</h3>
                            <ul>
                                <?php 
                                    $loop = CFS()->get('stairs_param_list');    
                                    foreach($loop as $row){
                                        ?>
                                        <li><?= $row['stairs_param_name']?>: <?= $row['stairs_param_value']?> </li>
                                    <?php 
                                }
                                ?>
                            </ul>
                        </div>
                        
                        <div class="order-form">
                            <h3>Закажите замер</h3>
                            <form>
                                <input type="text" placeholder="Ваше имя" required>
                                <input type="tel" placeholder="Ваш телефон" required>
                                <textarea placeholder="Комментарий"></textarea>
                                <label class="checkbox-label">
                                    <input type="checkbox" required>
                                    <span>Я согласен на <a href="personal-data.html" target="_blank">обработку персональных данных</a> в соответствии с <a href="privacy.html" target="_blank">политикой конфиденциальности</a></span>
                                </label>
                                <button type="submit" class="btn btn-primary">Заказать консультацию</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>