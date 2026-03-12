<?php
	/* 
	Template name: контакты
	*/
	get_header() 
?>

    <main>
        <section class="page-header">
            <div class="container">
                <h1><?php the_title();?></h1>
            </div>
        </section>

        <section class="contact-info">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-details">
                        <h2>Наши контакты</h2>

                        <?php
                            $settings=get_posts( array(
                                'numberposts'=> 1, 
                                'category_name'=>'settings',
                                'post_type'   =>'post',
                            ) );
                            foreach($settings as $post ) {
                                ?>  
                                <div class="contact-item">
                                    <h3>Адрес</h3>
                                    <p><?= CFS() -> get('address')?></p>
                                </div>
                                <div class="contact-item">
                                    <h3>Телефон</h3>
                                    <p><a href="tel:<?= CFS() -> get('tel_link')?>"><?= CFS() -> get('tel_text')?></a></p>
                                </div>


                                <div class="contact-item">
                                    <h3>Email</h3>
                                    <p><a href="mailto:<?= CFS() -> get('email')?>"><?= CFS() -> get('email')?></a></p>
                                </div>
                                
                                <div class="contact-item">
                                    <h3>Время работы</h3>
                                    <p>Пн-Пт: <?= CFS() -> get('weekdays')?></p>
                                    <p>Сб: <?= CFS() -> get('saturday')?></p>
                                    <p>Вс: выходной</p>
                                </div>
                                <?php
                                }
                            wp_reset_postdata();
					    ?>
                        
                    </div>
                    
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2249.123456789012!2d37.12345678901234!3d55.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTXCsDcwJzA0LjQiTiAzN8KwMDcnMjQuNCJF!5e0!3m2!1sen!2sru!4v1234567890123" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>