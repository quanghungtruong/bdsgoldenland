<?php get_header()?>
<div class="category wthree all_pad padding-6">
    <div class="container">
            <?php
                global $wp_query;
                $cat_post = getThePostByTaxonomy(-1, 'tin_tuc', 'category_news', 'tin-tuc');
                $pagename = $wp_query->post->post_title;
            ?>
            <h3 class="title"><?php echo $pagename; ?><span></span></h3>
            <div class="col-lg-8">
                <?php
                    while($cat_post->have_posts()):
                        $cat_post->the_post();
                    $post_id = get_the_ID();
                    $image = get_the_post_thumbnail_url($post_id, 'full');
                ?>                
                <div class="content-box col-lg-12">
                    <div class="image-news col-lg-5">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo ! empty($image) ? $image : bloginfo('stylesheet_directory') . '/images/noimage.jpg'; ?>">
                        </a>
                    </div>
                    <div class="main-news col-lg-7">
                        <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
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