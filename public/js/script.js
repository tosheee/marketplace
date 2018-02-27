
    $('.product_buttons').on('click', '.button-like', function() {
        var idProduct = $(this).parent().find('input#id-product').val()

        $.ajax({
            method: "post",
            url: "/store/like_product/" + idProduct,
            data: { "_token": $('meta[name="_token"]').attr('content') },
            success: function( new_cart ) {
                $('.header-item.mr-5').find('sub').html(new_cart);
            }
        });
    });



    $('ol.items, p#button-wrapper-sc').on('click','.remove-item-button', function() {
        var remove_item_button = $(this);
        var idProduct = $(this).find('#id-product').val();
        var row_product = remove_item_button.parent().parent().parent();

        $.ajax({
            method: "post",
            url: "/remove/" + idProduct,
            data: { "_token": $('meta[name="_token"]').attr('content') },
            success: function( new_cart ) {

                if(new_cart[0] == 0)
                {
                    $('ol.items').children().remove();
                    $('#nav-total-price').remove();
                    $('div.cart-footer').remove();
                    $('span.hidden-xs').find('.text-primary').html('');

                    if(window.location.pathname == '/shopping-cart')
                    {
                        window.location.href = '/';
                    }

                    $('ol.items').append('<li style="text-align: center;"> Вашата количката е празна! </li>');
                    
                    var buttons = $('.add-product-button.add_to_cart');

		   buttons.each(function()
		   {
		     if($(this).find('#id-product').val() == idProduct)
                        {
                            $(this).find('#sup-product-qty').html('');
                            $(this).find('#quantity-product').val(1);
                        }
                    });
                }
                else
                {
                    $('#nav-total-price').html(new_cart[0].toFixed(2));
                    $('ol.items').children().remove();
                    $('sup.text-primary').html(new_cart[1]);
                    var items_obj = $.each( new_cart[2], function( _, value ){ value });

                    $.each(items_obj, function(product_id, value){
                        $('ol.items').append('<li><a href="#" class="product-image"><img src=" '+ value['item_pic'] +' "class="img-responsive"></a>'
                        +'<div class="product-details">'
                        +'<div class="close-icon">'
                        +'<button type="button" class="remove-item-button btn-danger" style="background: transparent; border-color: #ffffff; border-style: solid;">'
                        +'<input id="id-product" type="hidden" value="'+ product_id +'"/>'
                        +'<i class="fa fa-close" style="color: #ff0000"></i>'
                        +'</button>'
                        +'</div>'
                        +'<p class="product-name"> <a href="/store/'+ product_id +'" target="_blank">'+ value['item_title'] +'</a></p>'
                        +'<strong id="product-qty">'+ value['qty'] +'</strong> x <span class="price text-primary">'+ value['item_price'] +' лв.</span>'
                        +'</div></li>');
                     });

                    $('ol.items').append('<h5>Общо: <strong id="nav-total-price">'+ new_cart[0] +'</strong> <strong> лв.</strong></h5>');

                    if($('div.cart-footer').length < 1){
                        $('ul.dropdown-menu.cart.w-250').append(
                                '<li>'
                                + '<div class="cart-footer">'
                                + '<a href="/shopping-cart" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>'
                                + '<a href="/checkout" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Плащане</a>'
                                + '</div>'
                                + '</li>'
                        );
                    }

                    var buttons = $('.add-product-button.add_to_cart');

console.log(buttons);

                    buttons.each(function(){

                        if($(this).find('#id-product').val() == idProduct)
                        {
                            $(this).find('#sup-product-qty').html('');
                            $(this).find('#quantity-product').val(1);
                        }
                    });

                    if(window.location.pathname == '/shopping-cart')
                    {
                        var row_tr = remove_item_button.parent().parent().parent().parent().parent();
                        row_tr.remove();
                        
                        $('.totalspent-orders h2').html(new_cart[0] + ' лв.')
                        $('.printqty-orders h2').html(new_cart[1] + ' бр.')
                    }

                    $('.price.totalPrice strong').html(new_cart[0]);

                }
            }
        });
    });


    $( ".add-product-button" ).click(function() {

	var idProductShowPage = $('#id-product-show-page').val();
	var add_product_button = $(this);
	var idProduct = $(this).find('#id-product').val();
	var quantityProductWrapper = $(this).find('#quantity-product');
	var quantityProduct = quantityProductWrapper.val();
	
	if(typeof idProductShowPage != "undefined")
	{
	     idProduct = idProductShowPage
             quantityProduct = $('.show-page#quantity-product').val();
	}
	

        if(window.location.pathname == '/shopping-cart')
        {
            quantityProduct = $(this).parent().parent().find('#quantity-product').val();
        }

        $.ajax({
            method: "POST",
            url: "/add-to-cart?product_id=" + idProduct + "&product_quantity=" + quantityProduct,
            data: { "_token": $('meta[name="_token"]').attr('content') },
            success: function( new_cart ) {
                $('#nav-total-price').html(new_cart[0]);
                $('ol.items').children().remove();
                $('sup.text-primary').html(new_cart[1]);
                var items_obj = $.each( new_cart[2], function( _, value ){ value });

                $.each(items_obj, function(product_id, value){
                    $('ol.items').append('<li><a href="#" class="product-image"><img src=" '+ value['item_pic'] +' "class="img-responsive"></a>'
                    + '<div class="product-details">'
                    + '<div class="close-icon">'
                    + '<button type="button" class="remove-item-button btn-danger" style="background: transparent; border-color: #ffffff; border-style: solid;" >'
                    + '<input id="id-product" type="hidden" value="'+ product_id +'"/>'
                    + '<i class="fa fa-close" style="color: #ff0000"></i>'
                    + '</button>'
                    + ' </div>'
                    + '<p class="product-name"> <a href="/store/'+ product_id +'" target="_blank">'+ value['item_title'] +'</a></p>'
                    + '<strong id="product-qty">'+ value['qty'] +'</strong> x <span class="price text-primary">'+ value['item_price'] +' лв.</span>'
                    + '</div></li>');
                });

                $('ol.items').append('<h5>Общо: <strong id="nav-total-price">'+ new_cart[0] +'</strong> <strong> лв.</strong></h5>');

                if($('div.cart-footer').length < 1){
                    $('ul.dropdown-menu.cart.w-250').append(
                            '<li>'
                            + '<div class="cart-footer">'
                            + '<a href="/shopping-cart" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>'
                            + '<a href="/checkout" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Плащане</a>'
                            + '</div>'
                            + '</li>'
                    );
                }

                add_product_button.find('#sup-product-qty').html(quantityProduct);
                
                add_product_button.find('#quantity-product').val(parseInt(quantityProduct) + 1);
                
                $('.price.totalPrice strong').html(new_cart[0]);
                
                add_product_button.parent().parent().parent().find('b#common-product-price-sc').html(items_obj[idProduct]['total_item_price'] + ' лв.');
                add_product_button.parent().parent().parent().find('b#common-product-qty-sc').html(quantityProduct);
                
                
                $('.totalspent-orders h2').html(new_cart[0] + ' лв.')
                $('.printqty-orders h2').html(new_cart[1] + ' бр.')
            
            }
        
        });
    });

