<nav class="topBar">
    <div class="container">
        
        
        <ul class="list-inline pull-left">
            <li><span class="text-primary"><a id="view-contact-form">Имате ли въпроси? </a></span>
                <i class="fa fa-phone" aria-hidden="true"></i>  {{ isset($siteViewInformation->phone_com) ? $siteViewInformation->phone_com : '0888 888 888'}}  |
                <i class="fa fa-envelope-open" aria-hidden="true"></i>   {{ isset($siteViewInformation->phone_com) ? $siteViewInformation->email_com : 'example@com.com' }}</li>
        </ul>
        
         <div id="modal-contact-form-wrapper" class="modal-contact-forma-c">
            <div class="modal-content-contact-form">
                <span class="close">&times;</span>
                <div class="col-md-12 text-center">
                    <h3>Свържете се с нас</h3>
                    <p>
                        Чуствайте се свободни да използвате формата за контакт по-долу.
                    </p>
                </div>

                <form name="contactForm" id="contact_form" method="post" action="/send-user-message" style="font-family: 'Helvetica Neue', Helvetica;">
                    {{ csrf_field() }}
                    <div class="row">
                        <div>
                            <input type="text" name="name" id="name" required="required" oninvalid="this.setCustomValidity('Моля, въведете име!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" class="form-control" placeholder="Вашето име">
                        </div>
                        
                        <br>
                        
                        <div>
                            <input type="text" name="email" id="email" required="required" oninvalid="this.setCustomValidity('Моля, въведете имейл!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" class="form-control" placeholder="Вашия имейл">
                        </div>
                    
                        <br>
                        
                        <div>
                            <textarea name="message" id="message" required="required" oninvalid="this.setCustomValidity('Моля, въведете съобщение!')" oninput="setCustomValidity('')" class="form-control" placeholder="Съобщение"></textarea>
                        </div>
                        
                        <br>
                        
                        <div class="col-md-12">
                            <p id="submit">
                                <input type="submit" id="send_message" value="Изпрати" class="btn btn-border">
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  
        <script>
        
            var modalContactForm = document.getElementById('modal-contact-form-wrapper');
            var btnViewContact = document.getElementById("view-contact-form");
            var spanContactForm = document.getElementsByClassName("close")[0];
            
            btnViewContact.onclick = function() {
                modalContactForm.style.display = "block";
            }
            
            spanContactForm.onclick = function() {
                modalContactForm.style.display = "none";
            }
            
            window.onclick = function(event) {
                if (event.target == modalContactForm) {
                    modalContactForm.style.display = "none";
                }
            }
        </script>
        
        
        
        <ul class="topBarNav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-bgn mr-5"></i>BGN<i class="fa fa-angle-down ml-5"></i>
                </a>

            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
                    <img src="http://icons.iconarchive.com/icons/osiris/world-flags/16/00-cctld-bg-icon.png" class="mr-5" alt="">
                    <span class="hidden-xs"> Bulgarian <i class="fa fa-angle-down ml-5"></i></span>
                </a>
                <ul class="dropdown-menu w-100" role="menu">
                   
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">Профил<i class="fa fa-angle-down ml-5"></i></span> </a>
                <ul class="dropdown-menu w-150" role="menu">
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Вход</a></li>
                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                    @else
                        <li><a href="/account">{{ Auth::user()->name }}</a></li>
                        <li><a href="/store/view_user_orders/{{ Auth::user()->id }}">Моите поръчки</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Изход
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </li>

            <li id="new-view-cart" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
                    <i class="fa fa-cart-plus mr-5"></i>
                    <span class="hidden-xs">Количка
                        <strong>
                            <sup class="text-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</sup>
                        </strong>
                        <i class="fa fa-angle-down ml-5"></i>
                    </span>
                </a>

                <?php
                    if(Session::has('cart'))
                    {
                        $oldCart = Session::get('cart');
                        $cart = new App\Cart($oldCart);
                        $productsCart = $cart->items;
                    }
                ?>

                <ul class="dropdown-menu cart w-250" role="menu">
                    <li>
                        <div class="cart-items">
                            <ol class="items">
                                @if(isset($productsCart))
                                    @foreach($productsCart as $product)
                                        <?php $descriptions = json_decode($product['item']->description, true); ?>

                                        <li>
                                            @if(isset($descriptions['main_picture_url']))
                                                <a href="#" class="product-image"> <img src="{{ $descriptions['main_picture_url'] }}" class="img-responsive" alt=""> </a>
                                            @elseif(isset($descriptions['upload_main_picture']))
                                                <a href="#" class="product-image"> <img src="/storage/upload_pictures/{{ $product['item']->id }}/{{ $descriptions['upload_main_picture'] }}" class="img-responsive" alt=""> </a>
                                            @else
                                                <a href="#" class="product-image"> <img src="/storage/common_pictures/noimage.jpg" class="img-responsive" alt=""> </a>
                                            @endif

                                            <div class="product-details">
                                                <div class="close-icon">
                                                    <button type="button" class="remove-item-button" style="background: transparent; border-color: #ffffff; border-style: solid;">
                                                        <input id="id-product" type="hidden" value="{{ $product['item']->id }}"/>
                                                        <i class="fa fa-close" style="color: #ff0000"></i>
                                                    </button>
                                                </div>
                                                <p class="product-name">
                                                    <a href="/store/{{ $product['item']->id }}" target="_blank">{{ $descriptions['title_product'] }}</a>
                                                </p>
                                                <strong id="product-qty">{{ $product['qty']}}</strong> x <span class="price text-primary">{{ $descriptions['price'] }}  {{ $descriptions['currency'] }}</span>
                                            </div>
                                            <!-- end product-details -->
                                            </li>

                                    @endforeach
                                        <p class="text-center"><h5>Общо: <strong id="nav-total-price"> {{ $cart->totalPrice }}</strong> <strong>{{ $descriptions['currency'] }}</strong></h5></p>


                            </ol>
                        </div>
                    </li>
                    <li>
                        <div class="cart-footer">
                            <a href="{{ route('store.shoppingCart') }}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>
                            <a href="{{ route('store.checkout') }}" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Поръчка</a>
                        </div>

                    </li>
                    @else
                        <li style="text-align: center;">
                            Вашата количката е празна!
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav><!--=========-TOP_BAR============-->

<!--=========MIDDEL-TOP_BAR============-->

<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-3 vertical-align text-left hidden-xs">
                <a href="/"><img  style="margin: 0px 50px 0px 0" width="220" src="/storage/common_pictures/logo.png" alt=""></a>
            </div>
            <!-- end col -->

            <div class="col-sm-7 vertical-align text-center">
                <form action="/store/search" method="get">
                    <div class="row grid-space-1">
                        <div class="col-sm-6">
                            <input type="text" name="keyword" class="form-control input-lg" placeholder="Търсене" value="">
                        </div>
                        <!-- end col -->
                        <div class="col-sm-3">
                            <select class="form-control input-lg" name="sub_category" id="search-select-category">
                                <option style="padding-top: 2cm;" value="all"><b>Продукти</b></option>

                                @foreach($categoriesButtonsName as $categoryButton)
                                    <!-- category-name -->
                                    <optgroup label="{{ $categoryButton->name }}">
                                        <!-- sub category-name -->
                                        @foreach($subCategoriesButtonsName as $subCategoryButton)
                                            @if ($subCategoryButton->category_id == $categoryButton->id)
                                                <option value="{{ $subCategoryButton->identifier }}">{{ $subCategoryButton->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-default btn-block btn-lg" ><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
            </div>


            <!-- end col -->
            <div class="col-sm-2 vertical-align header-items hidden-xs">
                <div class="header-item mr-5">
                    <?php $allLikes = count(App\Like::all()); ?>
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"> <i class="fa fa-thumbs-o-up"></i> <sub>{{ isset($allLikes) ? $allLikes : '' }}</sub> </a>
                </div>
                <div class="header-item">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"> <i class="fa fa-refresh"></i> <sub>2</sub> </a>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end  row -->
    </div>
</div>


<nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                <li class="dropdown megaDropMenu">
                    <a href="/store" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false" id="store-button">Продукти <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        @foreach($categoriesButtonsName as $categoryButton)
                            <li class="col-sm-3 col-xs-12">
                                <ul class="list-unstyled">
                                    <li><a href="/store/search?category={{ $categoryButton->id }}">{{ $categoryButton->name }}</li>
                                    @foreach($subCategoriesButtonsName as $subCategoryButton)
                                        @if ($subCategoryButton->category_id == $categoryButton->id)
                                            <li><a href="/store/search?sub_category={{ $subCategoryButton->identifier }}">{{ $subCategoryButton->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <script>
                   $(document).ready(function(){
                       $('#store-button').click(function(){
                          window.location.href ='/store'
                       });
                   });
                </script>
		@foreach($pagesButtonsRender as $pageButton)
                    <li><a href="/page?show={{ $pageButton->url_page }}" class="dropdown-toggle"  data-hover="dropdown" data-close-others="false">{{ $pageButton->name_page }}</a></li>
                @endforeach
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>



<nav id="menu-scroll" class="navbar navbar-main navbar-default navbar-fixed-top" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">

                <span ><a href="/"><img style="margin: 10px 2px 0 0" width="100" src="/storage/common_pictures/logo.png" alt=""></a></span>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                <li class="dropdown megaDropMenu">

                    <a href="/store" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false" id="store-button">Продукти <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        @foreach($categoriesButtonsName as $categoryButton)
                            <li class="col-sm-3 col-xs-12">
                                <ul class="list-unstyled">
                                    <li><a href="/store/search?category={{ $categoryButton->id }}">{{ $categoryButton->name }}</a></li>
                                    @foreach($subCategoriesButtonsName as $subCategoryButton)
                                        @if ($subCategoryButton->category_id == $categoryButton->id)
                                            <li><a href="/store/search?sub_category={{ $subCategoryButton->identifier }}">{{ $subCategoryButton->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <script>
                    $(document).ready(function(){
                        $('#store-button').click(function(){
                            window.location.href ='/store'
                        });
                    });
                </script>
                
                @foreach($pagesButtonsRender as $pageButton)
                    <li><a href="/page?show={{ $pageButton->url_page }}" class="dropdown-toggle"  data-hover="dropdown" data-close-others="false">{{ $pageButton->name_page }}</a></li>
                @endforeach
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">Профил<i class="fa fa-angle-down ml-5"></i></span> </a>
                    <ul class="dropdown-menu w-150" role="menu">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Вход</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li><a href="#">{{ Auth::user()->name }}</a></li>
                            <li><a href="/store/view_user_orders/{{ Auth::user()->id }}">Моите поръчки</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Изход</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="dropdown" id="menu-scroll-cart">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-cart-plus mr-5"></i> <span class="hidden-xs">
                                Количка <strong><sup class="text-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</sup></strong>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span> </a>

                    <?php
                    if(Session::has('cart'))
                    {
                        $oldCart = Session::get('cart');
                        $cart = new App\Cart($oldCart);
                        $productsCart = $cart->items;
                    }
                    ?>

                    <ul class="dropdown-menu cart w-250" role="menu">
                        <li>
                            <div class="cart-items">
                                <ol class="items">
                                    @if(isset($productsCart))
                                        @foreach($productsCart as $product)
                                            <?php $descriptions = json_decode($product['item']->description, true); ?>

                                            <li>
                                                @if(isset($descriptions['main_picture_url']))
                                                    <a href="#" class="product-image"> <img src="{{ $descriptions['main_picture_url'] }}" class="img-responsive" alt=""> </a>
                                                @elseif(isset($descriptions['upload_main_picture']))
                                                    <a href="#" class="product-image"> <img src="/storage/upload_pictures/{{ $product['item']->id }}/{{ $descriptions['upload_main_picture'] }}" class="img-responsive" alt=""> </a>
                                                @else
                                                    <a href="#" class="product-image"> <img src="/storage/common_pictures/noimage.jpg" class="img-responsive" alt=""> </a>
                                                @endif

                                                <div class="product-details">
                                                    <div class="close-icon">
                                                        <button type="button" class="remove-item-button" style="background: transparent; border-color: #ffffff; border-style: solid;">
                                                            <input id="id-product" type="hidden" value="{{ $product['item']->id }}"/>
                                                            <i class="fa fa-close" style="color: #ff0000"></i>
                                                        </button>
                                                    </div>
                                                    <p class="product-name"> <a href="/store/{{ $product['item']->id }}" target="_blank">{{ $descriptions['title_product'] }}</a> </p>
                                                    <strong>{{ $product['qty']}}</strong> x <span class="price text-primary">{{ $descriptions['price'] }}  {{ $descriptions['currency'] }}</span>
                                                </div>
                                                <!-- end product-details -->
                                            </li>
                                        @endforeach
                                        <p class="text-center"><h5>Общо: <strong> {{ $cart->totalPrice }} {{ $descriptions['currency'] }}</strong></h5></p>

                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="cart-footer">
                                <a href="{{ route('store.shoppingCart') }}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>
                                <a href="{{ route('store.checkout') }}" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Поръчка</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                    <li style="text-align: center;">
                        Вашата количката е празна!
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>



<script>

    $(window).scroll(function()
    {
        if($(document).scrollTop() > 150)
        {
            $('#menu-scroll').css('visibility', 'visible');
        }
        else
        {
            $('#menu-scroll').css('visibility', 'hidden');
        }
    });

</script>

<script type="text/javascript">
    ! function($, n, e) {
        var o = $();
        $.fn.dropdownHover = function(e) {
            return "ontouchstart" in document ? this : (o = o.add(this.parent()), this.each(function() {
                function t(e) {
                    o.find(":focus").blur(), h.instantlyCloseOthers === !0 && o.removeClass("open"), n.clearTimeout(c), i.addClass("open"), r.trigger(a)
                }
                var r = $(this),
                        i = r.parent(),
                        d = {
                            delay: 100,
                            instantlyCloseOthers: !0
                        },
                        s = {
                            delay: $(this).data("delay"),
                            instantlyCloseOthers: $(this).data("close-others")
                        },
                        a = "show.bs.dropdown",
                        u = "hide.bs.dropdown",
                        h = $.extend(!0, {}, d, e, s),
                        c;
                i.hover(function(n) {
                    return i.hasClass("open") || r.is(n.target) ? void t(n) : !0
                }, function() {
                    c = n.setTimeout(function() {
                        i.removeClass("open"), r.trigger(u)
                    }, h.delay)
                }), r.hover(function(n) {
                    return i.hasClass("open") || i.is(n.target) ? void t(n) : !0
                }), i.find(".dropdown-submenu").each(function() {
                    var e = $(this),
                            o;
                    e.hover(function() {
                        n.clearTimeout(o), e.children(".dropdown-menu").show(), e.siblings().children(".dropdown-menu").hide()
                    }, function() {
                        var t = e.children(".dropdown-menu");
                        o = n.setTimeout(function() {
                            t.hide()
                        }, h.delay)
                    })
                })
            }))
        }, $(document).ready(function() {
            $('[data-hover="dropdown"]').dropdownHover()
        })
    }(jQuery, this);
</script>