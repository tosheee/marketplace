@include('partials.contact_form')
@include('partials.middle_top_bar')

<nav id="horizontal-menu-bottom" class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
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
                    <a href="/store" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false" id="store-button">Departments <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        @foreach($categoriesButtonsName as $categoryButton)
                            <li class="col-sm-3 col-xs-12">
                                <ul class="list-unstyled">
                                    <li><a href="/store/search?category={{ $categoryButton->id }}"><strong>{{ $categoryButton->name }}</strong></a></li>
                                    @foreach($subCategoriesButtonsName as $subCategoryButton)
                                        @if ($subCategoryButton->category_id == $categoryButton->id)
                                            <li class="category-name"><a href="/store/search?sub_category={{ $subCategoryButton->identifier }}">{{ $subCategoryButton->name }}</a></li>
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

                <li>
                    <a href="/special_offers    " class="dropdown-toggle"  data-hover="dropdown" data-close-others="false">Special Offers</a>
                </li>

            @foreach($pagesButtonsRender as $pageButton)
                    <li><a href="/page?show={{ $pageButton->url_page }}" class="dropdown-toggle"  data-hover="dropdown" data-close-others="false">{{ $pageButton->name_page }}</a></li>
                @endforeach
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">Account<i class="fa fa-angle-down ml-5"></i></span> </a>
                    <ul class="dropdown-menu w-150" role="menu">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Sing in</a></li>
                            <li><a href="{{ route('register') }}">Sing up</a></li>
                        @else
                            <?php $user = App\User::where('email', Auth::user()->email)->first(); ?>

                            @if($user->hasRole('Seller'))
                                <li>
                                    <a href="/sellers/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
                                </li>
                            @elseif($user->hasRole('Buyer'))
                                <li>
                                    <a href="/buyers/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
                                </li>
                            @else
                                <li>
                                    <a href="/account/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- backet -->

                <?php
                if(Session::has('cart'))
                {
                    $oldCart = Session::get('cart');
                    $cart = new App\Cart($oldCart);
                    $productsCart = $cart->items;
                }
                ?>

                <li class="dropdown" id="menu-scroll-cart">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
                        <i class="fa fa-cart-plus mr-5"></i>
                        <span class="hidden-xs">Backet
                            <strong><sup class="text-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</sup></strong>
                                <i class="fa fa-angle-down ml-5"></i>
                        </span>
                    </a>



                    <ul class="dropdown-menu cart w-250" role="menu">
                        <li>
                            <div class="cart-items" style="height: 20%">
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
                                    <p class="text-center">
                                    <h5>Total: <strong> {{ $cart->totalPrice }} {{ $descriptions['currency'] }}</strong></h5>
                                    </p>
                                </ol>
                            </div>
                        </li>

                            <li>
                                <div class="cart-footer">
                                    <a href="{{ route('store.shoppingCart') }}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Basket</a>
                                    <a href="{{ route('store.checkout') }}" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Payment</a>
                                </div>
                            </li>
                        @else
                            <li style="text-align: center;">
                                Your Backet is empty!
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

@include('partials.menu_scroll')

<script>

    $(window).scroll(function()
    {
        if($(document).scrollTop() > 130)
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