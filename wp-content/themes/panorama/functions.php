<?php
include (TEMPLATEPATH . '/inc/widget.php' );
include (TEMPLATEPATH . '/inc/BFI_Thumb.php' );

//==================DEFAULT FUNCTION=============================
function setup_theme_hung()
{
    add_theme_support( 'menus',true );
    add_theme_support('post-formats',array('aside','image','quote','link','status'));
    add_theme_support( 'post-thumbnails' );
    add_theme_support('widgets');
    add_theme_support('editor-style');
    add_theme_support('custom-header');
    $defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );
}
add_action('after_setup_theme','setup_theme_hung');

function  add_style_js()
{    
    wp_enqueue_style('bootstrapmin-css',  get_template_directory_uri().'/bootstrap/css/bootstrap.css','',true);
    wp_enqueue_style('template-css',  get_template_directory_uri().'/css/style.css','',true);
    wp_enqueue_style('camera-css',  get_template_directory_uri().'/css/template.css','',true);
    wp_enqueue_style('iconeffects-css',  get_template_directory_uri().'/css/iconeffects.css','',true);
    wp_enqueue_style('jquery-ui1-css',  get_template_directory_uri().'/css/jquery-ui1.css','',true);
    wp_enqueue_style('jquery.fancybox-css',  get_template_directory_uri().'/css/jquery.fancybox.css','',true);
    wp_enqueue_style('animate-css',  get_template_directory_uri().'/css/animate.css','',true);
   
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js',  get_template_directory_uri().'/bootstrap/js/bootstrap.min.js','',true,true);    
    wp_enqueue_script('wow.min.js-js',  get_template_directory_uri().'/js/wow.min.js','',true,true);
    wp_enqueue_script('easing.js',  get_template_directory_uri().'/js/easing.js','',true,true);
    wp_enqueue_script('move-top.js-js',  get_template_directory_uri().'/js/move-top.js','',true,true);
    wp_enqueue_script('jquery-ui.js-js',  get_template_directory_uri().'/js/jquery-ui.js','',true,true);
    wp_enqueue_script('jquery.flexisel.js-js',  get_template_directory_uri().'/js/jquery.flexisel.js','',true,true);
    wp_enqueue_script('jquery.fancybox.js-js',  get_template_directory_uri().'/js/jquery.fancybox.js','',true,true);
    wp_enqueue_script('jquery.validate.js-js',  get_template_directory_uri().'/js/jquery.validate.js','',true,true);
    wp_enqueue_script('common-js',  get_template_directory_uri().'/js/code.js','',true,true);
}
add_action('wp_enqueue_scripts','add_style_js');
add_filter('show_admin_bar', '__return_false');


//=========================ADD FUNTION=======================================


/*
 * Get image by bfi thumb
 **/
function get_image($url,$width,$height,$crop=false)
{
    $parame=array('width'=>$width,'height'=>$height,'crop'=>$crop);
    if($url)
    {
         $image=  bfi_thumb($url,$parame);
         return $image;
    }
    return false;  
}
//===Get image in post news
function get_first_image($post_id) {
    $post = get_post($post_id);
    if(!$post) {
        return '';
    }
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    return $matches[1][0];
}


/*========================================================================*/
/*
 * Get normal post
 **/
function getThePost($num = 3, $post_type, $otherby = 'date', $order = 'DESC')
{
    $args=array(
        'posts_per_page'=>$num,
        'post_type'=>$post_type,        
        'orderby'=>$otherby,
        'order'=>$order        
    );
    $query=new WP_Query($args);
    return $query;
}

/*
 * Get custompost by taxonomy option
 **/
function getThePostByTaxonomy($num,$post_type,$taxonomy,$term)
{
    $args=array(
        'posts_per_page'=>$num,
        'post_type'=>$post_type,
        'tax_query'=>array(
            array(
                'taxonomy'=>$taxonomy,
                'field'=>'slug',
                'terms'=>$term
            )
        ),
        'orderby'=>'date',
        'order'=>'DESC'
    );
    $query = new WP_Query($args);
    return $query;
}

/*
 * Get post by category
 */
function getPostByCategory($num, $post_type, $cat, $orderby = 'date', $order = 'DESC')
{
    global $wp_query, $paged;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => $num,
        'post_type' => $post_type,
        'paged' => $paged,
        'cat' => $cat,
        'orderby' => $orderby,
        'order' => $order
    );
    $query = new WP_Query($args);
    return $query;
}

/*
 * Handle add product into cart 
 * 
 **/

function getThePostByTaxonomyAndCat($num,$post_type, $cat, $taxonomy, $term)
{
    $args=array(
        'posts_per_page'=>$num,
        'post_type'=>$post_type,        
        'tax_query'=>array(
            array(
                'taxonomy'=>$taxonomy,
                'field'=>'slug',
                'terms'=>$term
            ),
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' =>$cat
            )
        ),
        'orderby'=>'date',
        'order'=>'DESC'
    );
    $query = new WP_Query($args);
    return $query;
}

function getPostByTag($num, $post_type, $tag)
{
    $args = array(
        'posts_per_page' => $num,
        'post_type' => $post_type,
        'tag' => $tag,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query =  new WP_Query($args);
    return $query;
}
function get_slide_img()
{
    $img = array();
    if(is_home())
    {
        $img = array('t_slide3', 'd_slide2', 'v_slide3','p_slide3', 's_slide1');
    }
    return $img;
}

function add_class_body($classes)
{
    if(! is_page('lien-he'))
    {
        $classes[] = 'home';
    }
    return $classes;
}
add_filter('body_class', 'add_class_body');