<?php get_header(); ?>
<?php while(have_posts()): ?>
    <?php the_post();?>
    <?php global $post; ?>
    <span id="box-slide"></span>
    <?php get_template_part('content/condotel/box', 'slide'); ?>
    <span id="tong-quan"></span> 
    <?php get_template_part('content/condotel/box', 'tong-quan'); ?>
    <span id="vi-tri"></span>  
    <?php get_template_part('content/condotel/box', 'vi-tri'); ?>
    <span id="chuoi-tien-ich"></span> 
    <?php get_template_part('content/condotel/box', 'chuoi-tien-ich'); ?>
    <span id="thiet-ke"></span> 
    <?php get_template_part('content/condotel/box', 'thiet-ke'); ?>
    <span id="chinh-sach"></span> 
    <?php get_template_part('content/condotel/box', 'chinh-sach'); ?>
    <span id="hinh-anh"></span> 
    <?php get_template_part('content/condotel/box', 'hinh-anh'); ?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>