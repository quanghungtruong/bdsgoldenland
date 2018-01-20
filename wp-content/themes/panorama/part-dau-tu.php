<!-- make -->
<div class="make wthree all_pad dau-tu">
    <div class="container">
        <h2 class="title">Dịch vụ<span></span></h2>
        <div class="note-text" style="margin-top:15px; text-align: center; font-style: italic; font-size:18px;">* CHUYÊN: Tư vấn, đầu tư, giao dịch, nhận ký gửi và cho thuê các dự án:</div>
        <?php
            $dich_vu = getThePost(5, 'dich_vu');
        ?>
        <div class="make-grids">
            <?php 
            $i = 1;
                while($dich_vu->have_posts()): 
                    $dich_vu->the_post();
                    $id = get_the_ID();
                    $link = get_post_meta($id, 'link', true);
                    $image = get_post_meta($id, 'image', true);
                    $show_fisrt = get_post_meta( $id, 'show_first', true);
                    $col_class = $show_fisrt == 1 ? 'col-lg-8' : 'col-lg-4';
            ?>
            <div class="dt-content <?php echo $col_class; ?> wow bounceInDown">
                <div class="img-duan port-1 effect-3">
                    <a href="<?php echo $link; ?>">
                        <img class="img-responsive " src="<?php echo $image['guid']; ?>" />
                    </a>
                </div>
                <p class="color-paragraph justify">
                   	<b><i class="glyphicon glyphicon-star"></i> <?php the_title(); ?></b>
                </p>
            </div>
            <?php echo $i == 2 ? '<div class="clear"></div>' : ''; ?>
            <?php 
                $i++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<!-- //make -->