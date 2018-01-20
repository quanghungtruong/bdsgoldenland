<div class="fluid_container">
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <?php
            $slidePost = getThePost(4,'slide_show','date','DESC');
            
                while($slidePost->have_posts()){
                    $slidePost->the_post();
                    $image=get_post_meta(get_the_ID(),'slide_image',true);
                    $thumb=get_image($image['guid'],100,54);
                    echo '<div data-thumb="'.$thumb.'" data-src="'.$image['guid'].'"></div>';
                }
                wp_reset_postdata();
            
        ?>
    </div>
    <!-- #camera_wrap_1 -->
    
    <div class="clearfix"></div>
</div>