/*
 *  Handle ajax site
 */ 
 var ajax = function(){};
 
 ajax.prototype.ajaxInit = function()
 {
     var ajaxThat =  this;
     jQuery('document').ready(function() {
         ajaxThat.ajaxAddCart();
         ajaxThat.ajaxRemoveProduct();
     });
 }
 /*
  *  Ajax handle add Cart
  */
 ajax.prototype.ajaxAddCart = function() {
     jQuery('.btnAddCart').on('click', function(){
        var pro_id = jQuery(this).attr('id');        
            jQuery.post(
                LoadAjax.ajaxurl,
                {
                    action:'do-ajax-jobs',
                    event:'addcart',
                    product_id:pro_id                    
                },
                function(response){
                    if(response != 'done') {
                        jQuery('.c-number').html(response);
                        alert('Đã thêm vào giỏ hàng của bạn !');
                    } else {
                        alert('Sản phẩm này đã có trong giỏ hàng !');
                    }                    
                }
            );        
    });
 }
 
 /*
  *  Remove product on cart view
  * 
  */
 ajax.prototype.ajaxRemoveProduct = function() {
     jQuery('.btnRemove').on('click', function(){
         var parent = jQuery(this).parents('.content-cart');
         // Remove number product on cart
         var number = jQuery('.c-number').html();
         jQuery('.c-number').html(parseInt(number-1));
         
         // Remove price of this product at total price
         var price = 0;
         var totalPrice = jQuery('.sumMoney').val();
         var numberRemove = parent.children('.col-2').children('.num-product').val();
         var priceProduct = parent.children('.col-2').children('.gia_sp').val();
         var getPrice = (parseInt(priceProduct))*(parseInt(numberRemove));
         var removePrice = (parseInt(totalPrice) - getPrice);
         jQuery('.tong-gia').html(removePrice.toLocaleString());
         jQuery('.sumMoney').val(removePrice);
         
         // Remove this product on cart
         parent.html('');
         
         // handle ajax
          var pro_id = jQuery(this).attr('id'); 
            jQuery.post(
                LoadAjax.ajaxurl,
                {
                    action:'do-ajax-jobs',
                    event:'removecart',
                    product_id:pro_id                    
                },
                function(response){
                    
                    if(response == 'done') {                       
                        alert('Đã xóa sản phẩm này khỏi giỏ hàng của bạn !');
                    } else {
                        alert('Có lỗi !');
                    }                    
                }
            );
     });
 }
 
