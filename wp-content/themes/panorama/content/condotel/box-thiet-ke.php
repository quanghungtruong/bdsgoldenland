<?php $content_thietke = get_field('content_thietke', get_the_ID()); ?>
<?php if( ! empty($content_thietke)): ?>
<div class="single wthree all_pad">
    <div class="container">
            <h3 class="title-single title">MẶT BẰNG THIẾT KẾ<span></span></h3>
            <div class="col-lg-12">                              
                <div class="content-box col-lg-12">
                    <div class="content-single">
                        <div class="main-content">
                            <div>
                                <?php echo ! empty($content_thietke) ? $content_thietke : ''; ?>
                            </div>
                            <div class="tab-list col-lg-12">
                                <ul class="nav nav-tabs" role="tablist">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if( ! empty(get_field('text_tab_'. $i, get_the_ID()))): ?>
                                    <li role="presentation" class="<?php echo $i == 1 ? 'active' : ''; ?>">
                                        <a href="#tab-list-<?php echo $i; ?>" aria-controls="tab-list-<?php echo $i; ?>" role="tab" data-toggle="tab"><?php echo get_field('text_tab_'. $i, get_the_ID()); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php endfor; ?>
                                </ul>
                                <div class="clear"></div>
                                <div class="tab-content">
                                <?php for($j = 1; $j <= 5; $j++): ?>
                                    <?php if( ! empty(get_field('img_thietke_'. $j, get_the_ID()))): ?>
                                    <div class="<?php echo $j == 1 ? 'tab-active' : ''; ?> ch-tab tab-pane <?php echo $j == 1 ? 'active' : ''; ?>" role="tabpanel" id="tab-list-<?php echo $j; ?>">
                                        <img src="<?php echo get_field('img_thietke_'. $j, get_the_ID()); ?>">
                                    </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
	</div>
</div>
<?php endif; ?>