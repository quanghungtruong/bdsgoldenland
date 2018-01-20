<?php if( ! empty(get_field('slide_1', get_the_ID()))): ?>
<div class="different agileits all_pad padding-6">
    <div class="container">
        <h3 class="title">Dự Án <?php the_title(); ?><span></span></h3>
        <div class="box-slide">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php for($j = 1; $j <= 4; $j++): ?>
                        <?php if( ! empty(get_field('slide_'. $j, get_the_ID()))): ?>
                    <div class="item <?php echo $j == 1 ? 'active' : '' ; ?>">
                        <img src="<?php  echo get_field('slide_'. $j, get_the_ID()); ?>">
                    </div>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                </a>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
