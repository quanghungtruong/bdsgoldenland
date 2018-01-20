/*
 * Create 25/9/2016
 * Handle jquery of site
 */

var siteJS = function(){};

/**
 * Function init 
 **/
siteJS.prototype.siteInit = function()
{
    var that = this;
    jQuery('document').ready(function(){        
        jQuery().UItoTop({easingType: 'easeOutQuart'});
        that.siteMoveTop();
        that.siteSlider();
        that.siteFlexisel();
        that.siteFancybox();
        that.FormValidate();
        that.ShowSubMenu();
        that.ChangeColorText();
        //
        jQuery(".widget_categories ul li a").prepend('<i class="glyphicon glyphicon-chevron-right"></i>');
    });
}

/*
 *  Site move to top
 */
siteJS.prototype.siteMoveTop = function()
{
    jQuery(".scroll").click(function(event) {
        event.preventDefault();
        jQuery('html,body').animate({scrollTop: jQuery(this.hash).offset().top}, 1000);
    });
}

/*
 * Function handle slider 
 */
siteJS.prototype.siteSlider = function()
{
    jQuery(window).load(function() {
        jQuery("#slider-range").slider({
            range: true,
            min: 0,
            max: 900,
            values: [50, 600],
            slide: function(event, ui) {
                jQuery("#amount").val("jQuery" + ui.values[ 0 ] + " - jQuery" + ui.values[ 1 ]);
            }
        });
        jQuery("#amount").val("jQuery" + jQuery("#slider-range").slider("values", 0) + " - jQuery" + jQuery("#slider-range").slider("values", 1));
    });
}

/*
 * Function handel flexisel 
 */
siteJS.prototype.siteFlexisel = function()
{
    jQuery(window).load(function() {
        jQuery("#flexiselDemo1").flexisel({
            visibleItems: 2,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 568,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 667,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 991,
                    visibleItems: 1
                }
            }
        });
    });
}

/**
 * Modal image
 */
siteJS.prototype.siteFancybox = function()
{
    jQuery('.fancybox').fancybox();
}

/*
 * Funtion validate form Pay Product
 */
siteJS.prototype.FormValidate = function(){
  jQuery('#newletterForm').validate({
    rules: {
        user_name: "required",             
        email: {
          required: true,
          email: true
        },
        phone_number: "required"       
      },
      messages: {
        user_name: "",           
        email: "",
        phone_number: ""        
      } 
  });
}

/*
 * Function display sub menu   
 */
siteJS.prototype.ShowSubMenu = function(){
    jQuery('li.menu-item-has-children').hover(function(){
        jQuery(this).addClass('sub-active');
    }, function(){
       jQuery(this).removeClass('sub-active');
    });
}

siteJS.prototype.ChangeColorText = function(){
    jQuery('.hotline-info').each(function() {
        var elem = jQuery(this);
        setInterval(function() {
            if (elem.attr('style')) {
                elem.removeAttr('style');
            } else {
                elem.attr('style','color:red');
            }    
        }, 800);
    });
}