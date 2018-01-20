<?php $content_vitri = get_field('content_vitri', get_the_ID()); ?>
<?php if( ! empty($content_vitri)): ?>
<!-- make -->
<div class="make wthree all_pad vi-tri <?php echo $post->post_name; ?>-vi-tri">
    <div class="container">
        <h2 class="title">Vị trí dự án<span></span></h2>
        <div class="make-grids col-lg-12">
            <div class="vt-content col-lg-6">
                <?php echo ! empty($content_vitri) ? $content_vitri : ''; ?> 
            </div>
            <div class="tropicana-vt-image col-lg-6">
            <?php $img_vitri = get_field('img_vitri', get_the_ID()); ?>
                <img src="<?php echo !empty($img_vitri)? $img_vitri : ''; ?>">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //make -->
<?php endif; ?>