<?php 
	get_header()
?>

<!-- Каталог -->

    <main>
        <section class="page-header">
            <div class="container">
                <h1>Лестницы</h1>
            </div>
        </section>

        <section class="filters">
            <div class="container">
                <div class="filter-buttons">
                    <button class="filter-btn" type="button" data-sort="order:asc">По возрастанию цены</button>
                    <button class="filter-btn" type="button" data-sort="order:desc">По убыванию цены</button>
                  </div>
            </div>
        </section>

        <section class="products">
            <div class="container">
                <div class="products-grid popular-goods">
                    <?php

                        if ( have_posts() ){
                        while ( have_posts()){
                            the_post(); 
                            $all_category = get_the_category(); 
                            $res_name = ''; 
                            foreach( $all_category as $category ) {
                     
                            if($category-> term_id == 6 || $category-> term_id == 7 || $category-> term_id == 8) {
                                $res_name = $category->slug;
                            }
                            }
                            ?>
                            <div class="product-card mix  <?= $res_name ?>" data-order="<?= CFS()-> get('stair_price')?>">
                                <?php $loop = CFS()->get('stair_img_list'); ?>
                                <?php $first_img = !empty($loop) ? reset($loop) : null; ?>
                                <img src="<?= $first_img ? $first_img['stair_img'] : 'https://placehold.co/600x400/8B4513/FFFFFF?text=Основное+фото' ?>" 
                                alt="<?= $first_img ? get_post_meta(attachment_url_to_postid($first_img['stair_img']), '_wp_attachment_image_alt', true) : 'Деревянная лестница' ?>" 
                                class="product-img">
                                <h3><?php the_title(); ?></h3>
                                <p class="product-price">от <?= CFS()-> get('stair_price')?> ₽</p>
                                <p class="product-desc"><?= CFS()-> get('stair_short_desc')?></p>
                                <a href="<?php the_permalink()?>" class="btn btn-secondary">Подробнее</a>
                            </div>
                        <?php
                        }
                        }  
                        ?>
                </div>
            </div>
        </section>
        <section class="catalog-seo">
            <div class="container">
                <div class="seo-content">
                    <h2>Лестницы на заказ от производителя BERKEM</h2>
                    <p>Компания BERKEM предлагает изготовление лестниц на заказ по индивидуальным размерам. Мы производим лестницы из натурального дерева более 10 лет, используя качественные материалы и современные технологии обработки древесины.</p>
                    
                    <h3>Виды лестниц в нашем каталоге</h3>
                    <p>В каталоге представлены различные типы лестниц для частного дома и квартиры:</p>
                    <ul>
                        <li><strong>Маршевые лестницы</strong> — классическое решение с прямыми или поворотными маршами. Оптимальны для просторных помещений, обеспечивают удобное и безопасное перемещение между этажами.</li>
                        <li><strong>Винтовые лестницы</strong> — компактное решение для небольших помещений. Экономят пространство, сохраняя функциональность и эстетичный внешний вид.</li>
                        <li><strong>Лестницы на металлокаркасе</strong> — прочные конструкции с деревянными ступенями. Сочетают надёжность металла и красоту натурального дерева.</li>
                        <li><strong>Лестницы с забежными ступенями</strong> — позволяют эффективно использовать пространство при повороте марша.</li>
                    </ul>

                    <h3>Материалы для изготовления лестниц</h3>
                    <p>Для производства лестниц мы используем древесину ценных пород:</p>
                    <ul>
                        <li><strong>Дуб</strong> — прочная древесина с выраженной текстурой, устойчивая к износу и влаге.</li>
                        <li><strong>Бук</strong> — твёрдая древесина светлых оттенков, хорошо поддаётся обработке.</li>
                        <li><strong>Ясень</strong> — эластичная древесина с красивым рисунком, устойчивая к нагрузкам.</li>
                        <li><strong>Сосна</strong> — доступный материал с приятной текстурой и смолистым ароматом.</li>
                    </ul>

                    <h3>Преимущества заказа лестницы в BERKEM</h3>
                    <ul>
                        <li>Индивидуальное проектирование с учётом особенностей вашего помещения</li>
                        <li>Использование экологически чистых материалов и безопасных лакокрасочных покрытий</li>
                        <li>Собственное производство — контроль качества на всех этапах</li>
                        <li>Гарантия на продукцию до 5 лет</li>
                        <li>Профессиональный замер, доставка и монтаж</li>
                    </ul>

                    <p>Закажите бесплатную консультацию нашего специалиста — мы поможем подобрать оптимальное решение для вашего дома и рассчитаем стоимость лестницы по вашим размерам.</p>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>