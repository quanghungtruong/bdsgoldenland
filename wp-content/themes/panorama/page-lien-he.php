<?php get_header() ?>

<!-- contact -->
<div class="contact wthree all_pad single">
    <div class="container">	
        <h3 class="title margin-bottom">Thông Tin Liên Hệ<span></span></h3>
        <div class="contact-form">
            <div class="col-md-5 contact-grid">
                <?php echo do_shortcode('[newsletter_registration_form]'); ?>
            </div>
            <div class="col-md-7 contact-in">
                <?php while(have_posts()): ?>
                    <?php the_post(); ?>
                <div class="top-title title-form-dk"><?php the_field('company_name', get_the_ID()); ?></div> 
                <div class="para1">
                    <div>
                    <span class="bold">Trụ sở chính:</span>
                    <?php the_field('address', get_the_ID()); ?>
                    </div>
                </div>
                <div class="more-address"> 
                    <div class="address-more">
                        <p><span class="glyphicon glyphicon-phone-alt"></span><span class="padding phone-contact"><?php the_field('phone', get_the_ID()); ?></span></p>
                        <p><span class="glyphicon glyphicon-earphone"></span><span class="padding phone-contact"><?php the_field('hot_line', get_the_ID()); ?></span></p>
                        <p>
                            <span class="glyphicon glyphicon-envelope"></span>
                            <a href="mailto:<?php the_field('email', get_the_ID()); ?>"><span class="padding email-contact"><?php the_field('email', get_the_ID()); ?></span></a></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php get_footer()?>