@extends('layouts.app')
@section('content')

    <div class="col-md-8" >

        <h1>{{ $seller->brand_name  }}</h1>
        {!! $seller->brand_description  !!}</p>
        <br/>


        <div class="row">
            @foreach($products_seller as $product)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="product-thumb transition">
                        <div class="image">
                            <a href="https://www.chopni.com/dark-green-women-s-shoes-grande-by-giorgio-modelli">
                                <img src="https://www.chopni.com/image/tmp/asdfg-228x228.jpg" alt="Dark Green Women's Shoes - GRANDE - By Giorgio Modelli" title="Dark Green Women's Shoes - GRANDE - By Giorgio Modelli" class="img-responsive">
                            </a>
                        </div>

                        <div class="caption" style="height: 70px;">
                            <h4>
                                <a href="https://www.chopni.com/dark-green-women-s-shoes-grande-by-giorgio-modelli">Dark Green Women's Shoes - GRANDE - By Giorgio Modelli</a>
                            </h4>
                        </div>

                        <div class="button-group">
                            <a href="https://www.chopni.com/dark-green-women-s-shoes-grande-by-giorgio-modelli">
                                <button type="button" class="btn button btn-main btn-block">
                                    <span>View</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="product-thumb transition"><div class="image"><a href="https://www.chopni.com/designer-women-s-shoes-blues-clues-by-giorgio-modelli"><img src="https://www.chopni.com/image/tmp/aaaaaaaaa-228x228.jpg" alt="Designer Women's Shoes - Blues Clues - By Giorgio Modelli" title="Designer Women's Shoes - Blues Clues - By Giorgio Modelli" class="img-responsive"></a></div><div class="caption" style="height: 70px;"><h4><a href="https://www.chopni.com/designer-women-s-shoes-blues-clues-by-giorgio-modelli">Designer Women's Shoes - Blues Clues - By Giorgio Modelli</a></h4></div><div class="button-group">
                        <a href="https://www.chopni.com/designer-women-s-shoes-blues-clues-by-giorgio-modelli"><button type="button" class="btn button btn-main btn-block"><span>View</span></button></a></div></div></div><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="product-thumb transition"><div class="image"><a href="https://www.chopni.com/designer-women-s-shoes-green-hornet-by-giorgio-modelli"><img src="https://www.chopni.com/image/tmp/ass-228x228.jpg" alt="Designer Women's Shoes - Green Hornet - By Giorgio Modelli" title="Designer Women's Shoes - Green Hornet - By Giorgio Modelli" class="img-responsive"></a></div><div class="caption" style="height: 70px;"><h4><a href="https://www.chopni.com/designer-women-s-shoes-green-hornet-by-giorgio-modelli">Designer Women's Shoes - Green Hornet - By Giorgio Modelli</a></h4></div><div class="button-group">
                        <a href="https://www.chopni.com/designer-women-s-shoes-green-hornet-by-giorgio-modelli"><button type="button" class="btn button btn-main btn-block"><span>View</span></button></a></div></div></div><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="product-thumb transition"><div class="image"><a href="https://www.chopni.com/designer-women-s-shoes-red-salon-by-giorgio-modelli"><img src="https://www.chopni.com/image/tmp/aaaa-228x228.jpg" alt="Designer Women's Shoes - Red Salon - By Giorgio Modelli " title="Designer Women's Shoes - Red Salon - By Giorgio Modelli " class="img-responsive"></a></div><div class="caption" style="height: 70px;"><h4><a href="https://www.chopni.com/designer-women-s-shoes-red-salon-by-giorgio-modelli">Designer Women's Shoes - Red Salon - By Giorgio Modelli </a></h4></div><div class="button-group">
                        <a href="https://www.chopni.com/designer-women-s-shoes-red-salon-by-giorgio-modelli"><button type="button" class="btn button btn-main btn-block"><span>View</span></button></a></div></div></div><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="product-thumb transition"><div class="image"><a href="https://www.chopni.com/fashionable-women-s-shoes-new-sunset-by-giorgio-modelli"><img src="https://www.chopni.com/image/tmp/aight-1-228x228.jpg" alt="Fashionable Women's Shoes - NEW SUNSET - By Giorgio Modelli" title="Fashionable Women's Shoes - NEW SUNSET - By Giorgio Modelli" class="img-responsive"></a></div><div class="caption" style="height: 70px;"><h4><a href="https://www.chopni.com/fashionable-women-s-shoes-new-sunset-by-giorgio-modelli">Fashionable Women's Shoes - NEW SUNSET - By Giorgio Modelli</a></h4></div><div class="button-group">
                        <a href="https://www.chopni.com/fashionable-women-s-shoes-new-sunset-by-giorgio-modelli"><button type="button" class="btn button btn-main btn-block"><span>View</span></button></a></div></div></div><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><div class="product-thumb transition"><div class="image"><a href="https://www.chopni.com/handmade-ladies-shoes-flaco-by-giorgio-modelli"><img src="https://www.chopni.com/image/tmp/-228x228-2.jpg" alt="Handmade Ladies Shoes - Flaco - by Giorgio Modelli" title="Handmade Ladies Shoes - Flaco - by Giorgio Modelli" class="img-responsive"></a></div><div class="caption" style="height: 70px;"><h4><a href="https://www.chopni.com/handmade-ladies-shoes-flaco-by-giorgio-modelli">Handmade Ladies Shoes - Flaco - by Giorgio Modelli</a></h4></div><div class="button-group">
                        <a href="https://www.chopni.com/handmade-ladies-shoes-flaco-by-giorgio-modelli"><button type="button" class="btn button btn-main btn-block"><span>View</span></button></a></div></div></div>
            <script>var maxHeight=Math.max.apply(null,$("div.caption").map(function()
                {return $(this).height();}).get());$("div.caption").height(maxHeight);</script> </div>

    </div>

    <div class="" >
        <br/><br/><br/><br/><br/>
        <div class="col-sm-4" style="min-width: 168px; margin-bottom: 20px;"><div class="mm_box mm_decription"><div class="info-box">
                    <a class="avatar-box thumbnail" href="https://www.chopni.com/sellers/giorgio-modelli/products/"><img src="https://www.chopni.com/image/tmp/imageedit_2_4776458583-100x100.png"></a><div><ul class="list-unstyled"><li><h1 class="sellersname">Giorgio Modelli</h1></li><li></li><li><a target="_blank" href=""></a></li><li></li></ul></div></div>
                <a href="https://www.chopni.com/sellers/giorgio-modelli/products/" class="btn button btn-default btn-block" id="button_view_products" style="clear: both">
                    <span>View products</span>
                </a></div><div class="mm_box mm_info"><ul class="mm_stats"><li><b>Member since:</b> 29/03/2018</li><li><b>Products: </b>20</li><li>
                        <b class="profile-rating">Rating: </b><div class="ms-ratings main"><div class="ms-empty-stars"></div><div class="ms-full-stars" style="width: 0%"></div></div>
                        <span>(0 reviews)</span></li></ul></div><div class="mm_box mm_messages"><div class="contact">
                    Please <a href="https://www.chopni.com/login">log in</a> to contact Giorgio Modelli</div></div></div>
    </div>


@endsection