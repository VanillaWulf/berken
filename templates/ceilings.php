<?php
	/* 
	Template name: Кесонные потолки
	*/
	get_header() 
?>

    <main>
        <section class="page-header">
            <div class="container">
                <h1><?php the_title();?></h1>
            </div>
        </section>

        <section class="custom-furniture">
            <div class="container">
                <div class="furniture-cards">
                    <?php 
                            $loop = CFS()->get('ceilings_list'); 
                           
                            foreach($loop as $row){
                                ?>
                                 <div class="furniture-card">
                                    <img src="<?= $row['ceilings_img']?>" 
                                    alt="<?= get_post_meta(attachment_url_to_postid($row['ceilings_img']), '_wp_attachment_image_alt', true)?>">
                                   
                                    <div class="card-content">
                                        <h3><?= $row['ceilings_title']?></h3>
                                        <p><?= $row['ceilings_text']?></p>
                                        <p class="card-duration">Срок изготовления: <?= $row['ceilings_deadlines']?></p>
                                        <p class="card-duration">Стоимость: <?= $row['ceilings_price']?></p>
                                        <button class="btn btn-primary order-btn" onclick="openOrderForm('<?= esc_js( $row['ceilings_title'] ); ?>')">Заказать</button>
                                    </div>
                                </div>
                            <?php 
                           
                            }

                        ?>
                </div>
            </div>
        </section>
        <section class="catalog-seo text">
            <div class="container">
                <div class="text">
                    <?php the_content();?>
                </div>
            </div>
        </section>

        <!-- Order Form Modal -->
        <div id="order-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeOrderForm()">&times;</span>
                <h2 class="modal-title">Заказать мебель</h2>
                <?= do_shortcode('[contact-form-7 id="431690b" title="furniture-form" html_class="order-furnitre-form"]')?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>