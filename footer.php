<footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">

                    <?php
						$settings=get_posts( array(
							'numberposts'=> 1, 
							'category_name'=>'settings', // название рубрики на английском
							'post_type'   =>'post',
						) );
						foreach($settings as $post ) {
							?>  
                                <a class="footer-contact-link" href="mailto:<?= CFS() -> get('email')?>"><?= CFS() -> get('email')?></a>
								<a class="footer-contact-link" href="tel:<?= CFS() -> get('tel_link')?>"><?= CFS() -> get('tel_text')?></a>
							<?php
							}
						wp_reset_postdata();
					?>
                </div>
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'bottom',
                        'container' => '',
                        'menu_class'=> 'footer-links',
                        'menu_id' => ''
                    ]);
                ?>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>