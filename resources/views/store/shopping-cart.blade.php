@extends('layouts.app')

@section('content')
    <div class="col-md-2"> @include('partials.v_nav_bar') </div>
    <script>
        $('#new-view-cart').hide();
        $('#menu-scroll-cart').hide();
    </script>
    <div class="col-sm-10">
        @if(Session::has('cart'))
        <div id="user-orders" class="container">
            <div class="row order_sorter">
    			  <ul id="toggle-orders">
    			      <li class="first"></li>
    			      <li class="fo selected"> <a href="/store">Departments</a></></li>
    			      <li class="oh "><a href="#">Basket</a></li>
    			      <li class="ed selected"><a href="/store/checkout">Checkout</a></></li>
    			   </ul>
    		</div>
        
            <div class="row" id="order-history">
                <div class="row order-summary-shopping-cart">
                    <div class="totalspent-orders">
                        <h3>Total:</h3>
                        <h2> {{ $totalPrice }} лв.</h2>
                    </div>
        
	                <div class="printqty-orders">
	                    <h3>Total products:</h3>
	                    <h2>{{ $totalQuantity }} бр.</h2>
	                </div>

                    <div class="ytd-orders">
			            <p style="font-size: 90%;">
			                Text
			                <br>
                            Text
			                <br>
                            Text
		                </p>
			        </div>
			   
			        <div class="mtd-orders">
                        <p style="font-size: 90%;">Text</p>
                    </div>
			</div>
                     
            @foreach($products as $product)
                <?php $descriptions = json_decode($product['item']->description, true); ?>
                <div class="order-container">
         		    <div class="box">
                        <div class="row">
                        	<div class="col-1">
	                            @if (isset($descriptions['main_picture_url']))
	                                <a class="thumbnail pull-left" href="/store/{{ $product['item']->id}}"> 
	                                <img  style="margin: 0 auto; width: 150px;height: 150px;" src="{{ $descriptions['main_picture_url'] }}" alt="pic" />
	                                </a>
	                            @elseif(isset($descriptions['upload_main_picture']))
	                                <a class="thumbnail pull-left" href="/store/{{ $product['item']->id }}">  
	                                <img  style="margin: 0 auto; width: 150px;height: 150px;" src="/storage/upload_pictures/{{ $product['item']->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
	                                </a>
	                            @else
	                                <a class="thumbnail pull-left" href="/store/{{ $product['item']->id }}">  
	                                <img style="margin: 0 auto; width: 150px;height: 150px;" src="/storage/common_pictures/noimage.jpg" alt="pic" />
	                                </a>
	                            @endif
                            </div>

                            <div class="col-2">
                                <br>
                                    <span class="product-title">
                                        <a href="/store/{{ $product['item']->id }}" target="_blank">{{ $descriptions['title_product'] }}</a>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </span>
                                <p>
                                    <p>Price:  <b>{{ number_format($descriptions['price'], 2) }} {{ $descriptions['currency'] }}</b></p>
                                    <p>Common price: <b id="common-product-price-sc">{{ number_format($product['qty'] * $descriptions['price'], 2) }} {{ $descriptions['currency'] }}</b></p>
                                    <p>Quantity: <b id="common-product-qty-sc">{{ $product['qty'] }}</b><p>
                                    <p>Status: <b>{{ $descriptions['product_status'] }}</b></p>
                                </p>
                            </div>
                                    
                            <div class="col-3">
                                <br>
                                <p>
                                    <div class="price clearfix">
            						    <div class="product-count">
                                           <input type="text" class="count-textbox" value="{{ $product['qty'] }}" id="quantity-product" readonly>
                                           <button class="minus-button"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                                           <button class="plus-button"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
                                           <input id="id-product" type="hidden" name="q" value=""/>
                                        </div>
                                    </div>
                                </p>
                                            
                               <p>
                                  <button id="button-update-quantity" class="add-product-button" style="width:40%; background-color: #5def8a; border-color:#5def8a; " title="Обнови количеството">
                                     <i class="fa fa-check" aria-hidden="true" style="color: #ffffff"></i>
                                     <input id="id-product" type="hidden" name="q" value="{{ $product['item']['id'] }}"/>
                                  </button>
                                                
                                <p id="button-wrapper-sc">
                                   <button type="button" class="remove-item-button" style="width:40%; background-color: #ff4208; border-color:#ff4208; " title="Премахване на продукт">
                                      <i class="fa fa-close" style="color: #ffffff"></i>
                                      <input id="id-product" type="hidden" value="{{ $product['item']->id }}"/>
                                   </button>
                                </p>
                            </div>   
                        </div>
                    </div>
                </div>
            @endforeach
    

            <script>
                $(document).ready(function() {
                    $(".plus-button").on('click', function() {
                        var current_row = $(this).parent().parent().parent().parent().parent();
                        var quantity_product = current_row.find('#quantity-product');
                        var plusValue = parseInt(quantity_product.val());
        
                        if(current_row.find('#button-update-quantity').length < 1)
                        {
                            current_row.find('#button-wrapper-sc').append(button_update_qty);
                        }
        
                        if (!isNaN(plusValue)) {
                            quantity_product.val(plusValue + 1);
                        } else {
                            quantity_product.val(1);
                        }
                    });
        
                    $(".minus-button").on('click', function() {
                        var current_row = $(this).parent().parent().parent().parent().parent();
                        var quantity_product = current_row.find('#quantity-product');
                        var minusValue = parseInt(quantity_product.val());
        
                        if(current_row.find('#button-update-quantity').length < 1)
                        {
                            current_row.find('#button-wrapper-sc').append(button_update_qty);
                        }
        
                        if (!isNaN(minusValue) && minusValue > 1) {
                            quantity_product.val(minusValue - 1);
                        } else {
                            quantity_product.val(1);
                        }
                    });
                });
            </script>
        </div>
        @else
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <script>
                        window.location.href = '/';
                    </script>
                </div>
            </div>
        @endif
    </div>
@endsection