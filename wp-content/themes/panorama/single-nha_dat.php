<?php get_header()?>
<div class="single wthree all_pad padding-6">
	<div class="container">            
            <div class="col-lg-8">
                <?php while(have_posts()): ?>
                    <?php the_post(); ?>
                    <?php 
                        $post_id = get_the_ID();
                        $img_nha = get_field('image_1', $post_id);
                        $dien_tich = get_field('acreage', $post_id);
                        $price = get_field('price', $post_id);
                    ?>
                <div class="content-box col-lg-12">
                   <h4 class="title-single"><?php the_title();?></h4>
                   <ul>
                       <?php if( ! empty($dien_tich)): ?> 
                       <li><i class="glyphicon glyphicon-asterisk"></i> <span class="bold">Diện tích: </span> <span class="blue"><?php echo $dien_tich; ?></span></li>
                        <?php endif; ?>
                       <?php if( ! empty($price)): ?>
                       <li><i class="glyphicon glyphicon-asterisk"></i> <span class="bold">Giá: </span> <span class="red"><?php echo $price; ?></span></li>
                   <?php endif; ?>
                   </ul>
                    <div class="content-single"><?php the_content();?></div>
                    <?php if( ! empty($img_nha)): ?>
                        <div class="img-nhadat">
                            <?php for($j = 1; $j <= 6; $j++): ?>
                                <?php if( ! empty(get_field('image_'. $j, $post_id))): ?>
                                    <div class="col-md-4 diff-grid diff-one bor-bot wow bounceInDown bor-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                        <div class="port-<?php echo $j; ?> effect-3">
                                            <div class="image-box">
                                                <a class="fancybox" href="<?php echo get_field('image_'. $j, $post_id); ?>" data-fancybox-group="gallery" title="">
                                                    <img class="img-responsive" src="<?php echo get_field('image_'. $j, $post_id); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
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