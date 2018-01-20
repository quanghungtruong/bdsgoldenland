<?php get_header()?>
<div class="category wthree all_pad padding-6">
	<div class="container">
            <?php
                $cat_id = get_query_var('cat');
                $cat_post = getPostByCategory(15, 'nha_dat', $cat_id);
            ?>
            <h3 class="title"><?php echo get_cat_name($cat_id)?><span></span></h3>
            <div class="col-lg-8">
                <?php
                    while($cat_post->have_posts()):
                        $cat_post->the_post();
                    $post_id = get_the_ID();
                    $image = get_field('image_1', $post_id);
                    $dien_tich = get_field('acreage', $post_id);
                    $price = get_field('price', $post_id);
                ?>                
                <div class="content-box col-lg-12">
                    <div class="image-news col-lg-5">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo ! empty($image) ? $image : bloginfo('stylesheet_directory') . '/images/noimage.jpg'; ?>">
                        </a>
                    </div>
                    <div class="main-news col-lg-7">
                        <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                        <div class="nhadat-info">
                        <ul>
                            <li class="dt-nhadat"><span class="bold">Diện tích:</span> <span class="blue"><?php echo $dien_tich; ?></span></li>
                            <li class="gia-nhadat"><span class="bold">Giá:</span> <span class="red"> <?php echo $price; ?></span></li>
                        </ul>
                    </div>
                        <div class="quote-news"><?php the_excerpt();?></div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <div class="clear"></div>
                <div class="paginator">
                    <?php wp_pagenavi(array('query'=>$cat_post)); ?>
                </div>
                
            </div>

            <div class="col-lg-4">
                <?php
                    get_sidebar('right');
                ?>
            </div>
	</div>
</div>
<?php get_footer()?>