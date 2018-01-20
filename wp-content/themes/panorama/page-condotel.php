<?php get_header()?>
<div class="condotel all_pad padding-6">
	<div class="container">
            <?php
                $condotel = getThePost(-1, 'condotel');
            ?>
            <h3 class="title">Dự án Condotel<span></span></h3>
            <div class="col-lg-12 content-condotel">
                <?php
                    while($condotel->have_posts()):
                        $condotel->the_post();
                    $image = get_field('img_tongquan', get_the_ID());
                    $condotel_introduce = get_field('introduce', get_the_ID());
                ?>                
                <div class="content-box col-lg-6">
                    <div class="image-condotel col-lg-12">
                        <a href="<?php the_permalink();?>"><img src="<?php echo $image; ?>"></a>
                    </div>
                    <div class="main-condotel col-lg-12">
                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        <div class="quote-condotel">
                            <?php echo $condotel_introduce; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <div class="clear"></div>
                <div class="paginator">
                    <?php wp_pagenavi(array('query'=>$condotel)); ?>
                </div>
            </div>
	</div>
</div>
<?php get_footer()?>