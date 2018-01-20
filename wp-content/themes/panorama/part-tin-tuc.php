<h3 class="title">Tin Tức<span></span></h3>       
<div class="explore-grids form-dk">
    <div class="col-md-12 explore-right wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <div class="flex-slider">
            <?php $news = getThePostByTaxonomy(-1, 'tin_tuc', 'tags', 'show-homepage'); ?>                    
            <ul id="flexiselDemo1">
            <?php while($news->have_posts()): ?>
                <?php $news->the_post(); ?>
                <li>
                    <div class="laptop">
                        <div class="team-right">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                    $get_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    $image = get_image($get_img, 850, 450, true);
                                ?>
                                <img src="<?php echo $image ; ?>">
                            </a>    
                        </div>
                    </div>
                    <div class="team-pic">
                        <div class="team-pic-left">
                            <h5><?php the_title(); ?></h5>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>