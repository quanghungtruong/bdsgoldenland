<?php $content_gia = get_field('content_gia', get_the_ID()); ?>
<?php if( ! empty($content_gia)): ?>
<div class="single wthree all_pad panorama-cti">
    <div class="container">
            <h3 class="title-single title">GIÁ - CHÍNH SÁCH<span></span></h3>   
            <div class="col-lg-12 content-single">
                <div class="col-lg-7">
                    <?php echo ! empty($content_gia) ? $content_gia : ''; ?>
                </div>
                <div class="col-lg-5">
                    <?php $img_gia = get_field('img_gia', get_the_ID()); ?>
                    <img src="<?php echo !empty($img_gia)? $img_gia : ''; ?>">
                </div>
            </div>
	</div>
</div>
<?php endif; ?>