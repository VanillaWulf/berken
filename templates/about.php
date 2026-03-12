<?php
	/* 
	Template name: о нас
	*/
	get_header() 
?>


    <main>
        <section class="page-header">
            <div class="container">
                <h1><?php the_title();?></h1>
            </div>
        </section>

        <section class="about-company">
            <div class="container">
                <div class="about-content text">
                    <div class="about-text">
                        <?php the_content();?>  
                    </div>
                    
                    
                    <div class="about-image">
                         <img src="<?= CFS()->get('about_img')?>" 
                            alt="<?= get_post_meta(attachment_url_to_postid(CFS()->get('about_img')), '_wp_attachment_image_alt', true)?>">
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>