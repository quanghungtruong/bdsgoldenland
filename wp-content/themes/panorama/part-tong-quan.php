<!-- make -->
<div class="make wthree all_pad bg-condotel">
    <div class="container">
        <h2 class="title">Dự Án Condotel<span></span></h2>
        <div class="make-grids">
            <?php $condotel = getThePostByTaxonomy(4, 'condotel', 'condotel_tag', 'show-home'); ?>
            <?php while ($condotel->have_posts()): $condotel->the_post(); ?>
            <?php
                $condotel_img = get_field('img_tongquan', get_the_ID());
                $condotel_introduce = get_field('introduce', get_the_ID());
            ?>
            <div class="intro-box col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="counter-box dark-color">                          
                    <div class="img-demo">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php  echo $condotel_img; ?>">
                        </a>
                    </div>
                    <div class="intro-content">                            	
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <div class="quote-demo">
                            <?php echo mb_substr($condotel_introduce, 0, 200); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //make -->