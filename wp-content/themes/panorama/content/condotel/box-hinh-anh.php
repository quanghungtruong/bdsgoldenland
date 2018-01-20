<?php if( ! empty(get_field('img_canho_1', get_the_ID()))): ?>
<!-- differencials -->
<div class="different agileits all_pad" id="canhomau">
    <div class="container">
        <h3 class="title">Căn hộ mẫu<span></span></h3>
        <div class="diff-grids">
            <?php for($j = 1; $j <= 6; $j++): ?>
                <?php if( ! empty(get_field('img_canho_'. $j, get_the_ID()))): ?>
            <div class="col-md-4 diff-grid diff-one bor-bot wow bounceInDown bor-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                <div class="port-<?php echo $j; ?> effect-3">
                    <div class="image-box">
                        <a class="fancybox" href="<?php echo get_field('img_canho_'. $j, get_the_ID()); ?>" data-fancybox-group="gallery" title="Căn hộ mẫu <?php echo $j; ?>">
                            <img class="img-responsive" src="<?php echo get_field('img_canho_'. $j, get_the_ID()); ?>" alt=" căn hộ mẫu <?php echo $j; ?>"> 
                        </a>
                    </div>
                </div>
            </div>
                <?php endif; ?>
            <?php endfor; ?>
            <div class="clearfix"></div>

        </div>
    </div>
</div>
<!-- differencials --> 
<?php endif; ?>