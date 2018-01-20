<?php $tien_ich = get_field('content_tienich', get_the_ID() ); ?>
<?php if( ! empty($tien_ich)): ?>
<div class="single wthree all_pad <?php echo $post->post_name; ?>-cti">
    <div class="container">
            <h3 class="title-single title">TIỆN ÍCH<span></span></h3>   
            <div class="col-lg-12">
                <?php echo ! empty($tien_ich) ? $tien_ich : ''; ?>
            </div>
    </div>
</div>
<?php endif; ?>