<!DOCTYPE html>
<html>
    <head>
        <meta content='4/UKS4cKm4dwN1fjsWxDbfRwOWagPCpkU6Dj52eR-bQ2g' name='google-site-verification'/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
        <meta http-equiv="content-language" content="vi" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
        <title><?php wp_title()?></title>
        <meta content='CÔNG TY TNHH ĐẦU TƯ BĐS GOLDEN LAND - Trụ sở chính: Lô 13.19, Đường số 13, KĐT Lê Hồng Phong II, P. Phước Hải, Tp. Nha Trang - Hotline: 0963.01.00.79' name='description'/>
        <meta content='BĐS Golden Land Nha Trang' name='keywords'/>
        <meta content='Kim Oanh' name='Author'/>
        <meta content='general' name='rating'/>
        <meta content='all' name='robots'/>
        <meta content='index, follow' name='robots'/>
        <meta content='id' name='geo.country'/>
        <meta content='1 days' name='revisit-after'/>
        <meta content='Vietnamese' name='geo.placename'/>
        <meta content='vi' http-equiv='content-language'/>
        
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php wp_head(); ?> 

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111270633-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-111270633-1');
        </script>

        
    </head>
        <body <?php body_class(); ?>>
        
        <!-- header -->
        <div class="banner w3l">
        <?php if( is_home()): ?>
            <div class="slide">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $images = get_slide_img(); ?>
                        <?php foreach($images as $k => $img): ?>
                        <?php $class = $k == 0 ? 'active' : ''; ?>    
                        <div class="item <?php echo $class; ?>">
                            <a href="<?php echo home_url();?>/?page_id=189">
                                <img src="<?php bloginfo('stylesheet_directory') ?>/images/slide/<?php echo $img; ?>.jpg">
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">                                              
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <div class="header w3ls wow bounceInUp" data-wow-duration="1s" data-wow-delay="0s">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header logo">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1>
                                <a class="navbar-brand link link--yaku" href="<?php echo home_url()?>" style="color: #edc551;">
                                    <img src="<?php bloginfo('stylesheet_directory') ?>/images/logo_golden.png">
                                </a>
                            </h1>

                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                            <nav class="cl-effect-1">
                                <?php
                                    $args_menu = array(
                                        'menu' => 'Main Menu',
                                        'menu_class' => 'nav navbar-nav'
                                    );
                                    wp_nav_menu($args_menu);
                                ?>                        
                            </nav>
                        </div><!-- /navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>
        <!-- //header -->
       
        <!-- navigation -->
        <?php if( is_home()): ?>
        <div class="head_top wow zoomIn hidden-xs" data-wow-duration="1.5s" data-wow-delay="0.3s">
            <div class="container">
                <div class="banner-right">
                    <ul>
                    <?php 
                        $du_an = getThePost(5, 'logo_du_an');
                        while($du_an->have_posts()): 
                            $du_an->the_post();
                            $duan_id = get_the_ID();
                            $logo_img = get_post_meta( $duan_id, 'logo', true);
                            $link_du_an = get_post_meta($duan_id, 'link_du_an', true);
                    ?>
                        <li class="col-lg-3 col-xs-3 logo-du-an">
                            <a href="<?php echo $link_du_an['guid']; ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo $logo_img['guid']; ?>" />
                            </a>
                        </li>
                    </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php endif; ?>
        <!-- //navigation -->