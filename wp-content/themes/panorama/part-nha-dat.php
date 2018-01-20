<?php
    $nha_dat = getThePostByTaxonomy(9, 'nha_dat', 'type', 'show-homepage');
    $dat_nen = getThePostByTaxonomy(9, 'nha_dat', 'type', 'dat-nen');
?>
<!-- make -->
<div class="make wthree all_pad nha-dat">
    <div class="container">
        <h2 class="title">Nhà Đất Nổi Bật<span></span></h2>
        <div class="make-grids">
            <?php $i = 0;?>
       <?php while ($nha_dat->have_posts()): $nha_dat->the_post(); ?>
            <?php 
                $post_id = get_the_ID();
                $img_nha = get_field('image_1', $post_id);
                $dien_tich = get_field('acreage', $post_id);
                $price = get_field('price', $post_id);
                $i ++;
            ?>
            <div class="dt-content col-lg-4">
                <div class="left-nhadat col-lg-5">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo ! empty($img_nha) ? $img_nha : bloginfo('stylesheet_directory') . '/images/noimage.jpg'; ?>"/>
                    </a>
                </div>
                <div class="right-nhadat col-lg-7">
                    <div class="title-nhadat">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="nhadat-info">
                        <ul>
                            <li class="dt-nhadat"><span class="bold">Diện tích:</span> <span class="blue"><?php echo $dien_tich; ?></span></li>
                            <li class="gia-nhadat"><span class="bold">Giá:</span> <span class="red"> <?php echo $price; ?></span></li>
                        </ul>
                </div>
                </div>
                <div class="clear"></div>                
                <div class="content-nhadat"><?php echo mb_substr(get_the_excerpt(), 0, 100);?></div>
            </div>
            <?php 
                if(($i % 3) == 0)
                {
                    echo '<div class="clear"></div>';
                }
            ?>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<!-- //make -->
<?php if( ! empty($dat_nen)): ?>
<div class="make wthree all_pad nha-dat">
    <div class="container">
        <h2 class="title">Đất Nền Nổi Bật<span></span></h2>
        <div class="make-grids">
            <?php $i = 0;?>
       <?php while ($dat_nen->have_posts()): $dat_nen->the_post(); ?>
            <?php 
                $dn_post_id = get_the_ID();
                $dn_img_nha = get_field('image_1', $dn_post_id);
                $dn_dien_tich = get_field('acreage', $dn_post_id);
                $dn_price = get_field('price', $dn_post_id);
                $i ++;
            ?>
            <div class="dt-content col-lg-4">
                <div class="left-nhadat col-lg-5">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo ! empty($img_nha) ? $img_nha : bloginfo('stylesheet_directory') . '/images/noimage.jpg'; ?>"/>
                    </a>
                </div>
                <div class="right-nhadat col-lg-7">
                    <div class="title-nhadat">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="nhadat-info">
                        <ul>
                            <li class="dt-nhadat"><span class="bold">Diện tích:</span> <span class="blue"><?php echo $dn_dien_tich; ?></span></li>
                            <li class="gia-nhadat"><span class="bold">Giá:</span> <span class="red"> <?php echo $dn_price; ?></span></li>
                        </ul>
                </div>
                </div>
                <div class="clear"></div>                
                <div class="content-nhadat"><?php echo mb_substr(get_the_excerpt(), 0, 100);?></div>
            </div>
            <?php 
                if(($i % 3) == 0)
                {
                    echo '<div class="clear"></div>';
                }
            ?>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php endif; ?>