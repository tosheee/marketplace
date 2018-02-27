@extends('layouts.app')

@section('content')
    <div class="col-md-2" id="vertical_menu"> @include('partials.v_nav_bar') </div>

    <?php $descriptions = json_decode($product->description, true); ?>
    <br>
    <br>

    <ul>
        <li>
          <div class="order-breadcrumb">
            <a href="/" class="">Начало</a>
            @foreach($categories as $category)
                @if($product->category_id == $category->id)
                    › <a href="/store/search?category={{ $category->id }}" class=""> {{ $category->name }}</a>
                @endif
            @endforeach
            
            @foreach($subCategories as $subCategory)
                @if($product->sub_category_id == $subCategory->id)
                     › <a href="/store/search?sub_category={{ $subCategory->identifier }}" class="active">{{ $subCategory->name }}</a>
                @endif
            @endforeach
         
          </div>
        </li>
      
    </ul>

    <hr>
        <div class="col-xs-4 item-photo" id="show-product-images">
            <div class="container-fluid">
                <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="container-fluid">
                                <div class="row" >
                                    @if ($product->sale == 1)
	                                <div class="product_sale">
	                                    <p>Разпродажба</p>
	                                </div>
    	                            @elseif($product->recommended == 1)
    	                                <div class="product_recommended">
    	                                    <p>Препоръчан</p>
    	                                </div>
    	                            @elseif($product->best_sellers == 1)
    	                                <div class="product_best_sale">
    	                                    <p>Най-продаван</p>
    	                                </div>
    	                            @endif
	                            
                                    @if (isset($descriptions['main_picture_url']))
                                        <img src="{{ $descriptions['main_picture_url'] }}" alt="pic" />
                                    @elseif(isset($descriptions['upload_main_picture']))
                                        <img src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
                                    @else
                                        <img src="/storage/common_pictures/noimage.jpg" alt="pic" />
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if (isset($descriptions['gallery']))
                            @foreach( $descriptions['gallery'] as $key => $type_pictures)
                                @foreach($type_pictures as $key_picture => $picture)
                                    @if($key == 1)
                                        <div class="item">
                                            <div class="container-fluid">
                                                <div class="row" >
                                                    @if ($product->sale == 1)
            			                                <div class="product_sale">
            			                                    <p>Разпродажба</p>
            			                                </div>
            			                            @elseif($product->recommended == 1)
            			                                <div class="product_recommended">
            			                                    <p>Препоръчан</p>
            			                                </div>
            			                            @elseif($product->best_sellers == 1)
            			                                <div class="product_best_sale">
            			                                    <p>Най-продаван</p>
            			                                </div>
            			                            @endif
                                     
                                                    @if($key_picture == 'upload_picture')
                                                        <img src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                                    @else
                                                        <img src="{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="item">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    @if ($product->sale == 1)
            			                                <div class="product_sale">
            			                                    <p>Разпродажба</p>
            			                                </div>
            			                            @elseif($product->recommended == 1)
            			                                <div class="product_recommended">
            			                                    <p>Препоръчан</p>
            			                                </div>
            			                            @elseif($product->best_sellers == 1)
            			                                <div class="product_best_sale">
            			                                    <p>Най-продаван</p>
            			                                </div>
            			                            @endif
            			                            
                                                                @if($key_picture == 'upload_picture')
                                                        <img src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                                    @else
                                                        <img src="{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </div>

                    @if (isset($descriptions['gallery']))
                        <div class="controls draggable ui-widget-content col-md-6 col-xs-12" style="width: 350px;height: 50px;">
                            <ul class="nav ui-widget-header" >

                                <li data-target="#custom_carousel" data-slide-to="{{ $index = 0 }}" class="active">

                                    @if (isset($descriptions['main_picture_url']))
                                        <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="{{ $descriptions['main_picture_url'] }}" alt="pic" /></a>
                                    @elseif(isset($descriptions['upload_main_picture']))
                                        <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" /></a>
                                    @else
                                        <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="/storage/common_pictures/noimage.jpg" alt="pic" /></a>
                                    @endif

                                </li>

                                <?php $index = 1; ?>
                                @foreach( $descriptions['gallery'] as $type_pictures)
                                    @foreach($type_pictures as $key_picture => $picture)
                                        @if($index == 1)
                                            <li data-target="#custom_carousel" data-slide-to="{{ $index }}" class="active">
                                                @if($key_picture == 'upload_picture')
                                                    <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}"></a>
                                                @else
                                                    <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="{{ $type_pictures[$key_picture] }}"></a>
                                                @endif
                                            </li>
                                            <?php $index ++;?>
                                        @else
                                            <li data-target="#custom_carousel" data-slide-to="{{ $index }}" >
                                                @if($key_picture == 'upload_picture')
                                                    <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}"></a>
                                                @else
                                                    <a href="#"><img style="margin: 0 auto; width: 35px; height: 30px;" src="{{ $type_pictures[$key_picture] }}"></a>
                                                @endif
                                            </li>
                                            <?php $index++;?>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>

                    @endif
                </div>
                    <!-- End Carousel -->
                </div>
            </div>
        <div class="col-xs-5" id="show-product-info-box" style="border:0px solid gray">
                <h1>{{ $product['qty'] }}</h1>
                <h2>{{ $descriptions['title_product'] }}</h2>
                <small style="color:#337ab7"></small>
                <p style="color:rgba(8, 9, 21, 0.96)"> {{ isset($descriptions['short_description']) ? $descriptions['short_description'] : '' }} </p>
                <!-- Precios -->
                <h6 class="title-price"><small></small></h6>
                <h3 style="margin-top: 0px;">Цена: {{ number_format($descriptions['price'], 2) }} {{ $descriptions['currency'] }}
                    @if (isset($descriptions['old_price']))
                        <span class="old-price">   {{ number_format($descriptions['old_price'], 2) }} {{ $descriptions['currency'] }}</span>
                    @endif
                </h3>
                <!-- Detalles especificos del producto -->

                <div class="section" style="margin-left: 2px;">
                    <div class="section" style="padding-bottom:10px;">
                        <div class="paragraph borderBlock USPs">
                            <div class="row" style="padding-left:10px;">
                                <div class="grid-5">
                                    <span  class="kor-open-as-dialog ish-tooltip" data-overlay-class="ish-dialogPage">
                                    <i class="fa fa-check"></i> 
                                    <label>Внимателно опаковано</label>
                                    </span>
                                </div>
                                <div class="grid-6">
                                    <span class="kor-open-as-dialog ish-tooltip" data-overlay-class="ish-dialogPage">
                                        <i class="fa fa-check"></i>
                                        <label>Свежи продукти</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="section" style="padding-bottom:10px;">
                        <!-- product count -->
                        <div class="price clearfix">
                            <div class="product-count">
                                <?php
                                if(Session::has('cart'))
                                {
                                    $oldCart = Session::get('cart');
                                    if(isset($oldCart->items[$product->id]['qty']))
                                    {
                                    $product_qty = $oldCart->items[$product->id]['qty'];
                                    }

                                }
                                ?>
                                <input type="text" class="count-textbox show-page" value="{{ isset($product_qty) ? $product_qty : '1' }}" id="quantity-product" readonly>
                                <button class="minus-button"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                                <button class="plus-button"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
                                <input id="id-product-show-page" type="hidden" name="q" value="{{ $product->id }}"/>
                            </div>
                        </div>
                    </div>

                    <div class="section" >
                        @if(isset($descriptions['article_id']))
                            <p>Продуктов код: {{ $descriptions['article_id'] }}</p>
                        @endif
                    </div>

                    <div class="section" >
                        <p>Статус: {{ isset($descriptions['product_status'])  ? $descriptions['product_status'] : '' }}</p>
                    </div>
                    
                    <div class="section">
                        <div class="fb-share-button" data-href="{{ Request::fullUrl() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}&amp;src=sdkpreparse">Споделяне</a>
                        </div>
                          
                        <div id="fb-root"></div>
                        <script>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = 'https://connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v2.11';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                    </div>
          
                    <div class="section" style="padding: 50px 30px 30px 40px;">
                        @if ($descriptions['product_status'] == 'Не е наличен')
                            <a  style="background-color: #FF9900; border-color: #FF9900;" class="btn btn-success" href="#">{{ $descriptions['product_status'] }}</a>
                        @else
                            <a class="add-product-button btn btn-success" >Добави в количката</a>
                        @endif
                    </div>
                </div>
            </div>
        <div class="col-xs-9">
                <ul class="menu-items">
                    <li class="active">Информация за продукта</li>
                    <li></li>
                    <li></li>
                </ul>

                <div style="width:100%;border-top:1px solid silver">
                    <p style="padding:15px;">
                        <p style="font-size: 150%;"> {!! $descriptions['general_description'] !!} </p>
                    </p>
                    
                    
                    @if(isset($descriptions['properties']))
	                    <?php $table_data = array_chunk($descriptions['properties'], 2) ?>                                                  
	                    	<table class="table table-hover">
            				    <thead>
                					<tr>
                					   <th class="text-left">Детайли</th>
                					   <th class="text-left"></th>
                					</tr>
            				    </thead>
				                <tbody>
                					 @foreach($table_data as $row )
                    					<tr>
                    					   <td class="text-left"> {{ isset($row[0]['name']) ?  $row[0]['name'] : '' }}</td>
                    					   <td class="text-left"> {{ isset($row[1]['text']) ?  $row[1]['text'] : '' }}</td>
                    					</tr>
                					@endforeach
                				   </tbody>
				            </table>
	                @endif
                </div>
            </div>
        <script>
            $(document).ready(function() {
                $(".plus-button").on('click', function() {
                    var plusValue = parseInt($('#quantity-product').val());
                    if (!isNaN(plusValue)) {
                        $('#quantity-product').val(plusValue + 1);
                    } else {
                        $('#quantity-productt').val(1);
                    }
                });

                $(".minus-button").on('click', function() {
                    var minusValue = parseInt($('#quantity-product').val());
                    if (!isNaN(minusValue) && minusValue > 1) {
                        $('#quantity-product').val(minusValue - 1);
                    } else {
                        $('#quantity-product').val(1);
                    }
                });
            });
        </script>
@endsection
