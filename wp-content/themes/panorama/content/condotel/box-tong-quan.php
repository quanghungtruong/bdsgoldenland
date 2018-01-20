<?php $content_tongquan = get_field('content_tongquan', get_the_ID()); ?>
<?php if( ! empty($content_tongquan)): ?>
<!-- make -->
<div class="make wthree all_pad" id="<?php echo $post->post_name; ?>_tong_quan">
    <div class="container">
        <h2 class="title">Tổng quan dự án<span></span></h2>
        <div class="make-grids">
            <div class="tq-img col-lg-5">
                <?php $img_tongquan = get_field('img_tongquan', get_the_ID()); ?>
                <img src="<?php echo !empty($img_tongquan)? $img_tongquan : ''; ?>">
            </div>
            <div class="tq-content col-lg-7">
                <?php echo ! empty($content_tongquan) ? $content_tongquan : ''; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //make -->
<?php endif; ?>