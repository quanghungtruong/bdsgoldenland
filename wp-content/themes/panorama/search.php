<?php
/*
 * Template Name: Search page 
 */
?>
<?php get_header() ?>
<div class="page-phat-trien">
    <div class="search-location">
        <?php 
            get_template_part('box', 'search');
        ?>
    </div>
    <div class="main-category">
        <div class="left-category">
            <?php
                $args = array(
                    'menu' => 'Category Menu'
                );
                wp_nav_menu($args);
            ?>
        </div>
        <div class="right-dev">
           
            <div class="box-category">
                <div class="title-category">
                    <span class="name-cat">Kết quả tìm kiếm</span>
                    <span class="date-cat">Ngày cập nhật</span>
                </div>
                <ul>
                    <?php 
                        global $query_string;               
                        $query_args = explode("&", $query_string);
                        $search_query = array();            
                        foreach($query_args as $key => $string) {
                                $query_split = explode("=", $string);
                                $search_query[$query_split[0]] = urldecode($query_split[1]);
                        } // foreach
                        $search = new WP_Query($search_query);
                        //print_r($search);             
                        while ($search->have_posts()):
                            $search->the_post();
                    ?>
                        <li>
                            <div class="left-article">
                                <span class="title-article">
                                    <a href="<?php the_permalink()?>"><?php the_title();?></a>
                                </span><br>
                                <span class="author"><?php the_author();?></span>
                            </div>
                            <div class="right-time">
                                <?php echo get_the_date('d/m/Y'); ?>
                            </div>
                        </li>
                    	<?php
                             endwhile;
                             wp_reset_postdata();
                        ?>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<?php get_footer()?>