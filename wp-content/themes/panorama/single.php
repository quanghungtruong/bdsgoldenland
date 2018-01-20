<?php get_header()?>
<div class="single wthree all_pad pad-top-9 padding-6">
	<div class="container">            
            <div class="col-lg-8">
                <?php while(have_posts()): ?>
                    <?php the_post(); ?>
                <div class="content-box col-lg-12">
                   <h4 class="title-single"><?php the_title();?></h4>
                    <div class="content-single"><?php the_content();?></div>
                </div>
                
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
            <div class="col-lg-4">
                <?php
                    get_sidebar('right');
                ?>
            </div>
	</div>
</div>
<?php get_footer()?>