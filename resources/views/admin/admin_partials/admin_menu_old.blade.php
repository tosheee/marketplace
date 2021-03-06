    <nav class="navbar navbar-inverse top-bar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times" aria-hidden="true" id="chang-menu-icon"></i></span>
                <a class="navbar-brand" href="#"><img src="/storage/common_pictures/logo.png" width="100"> </a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i> </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <li class=""><a href="#"><i class="fa fa-refresh"></i></a> </li>
                    <li class=""><a href="#"><i class="fa fa-volume-up"></i></a> </li>
                    <li class=""><a href="#"><i class="fa fa-envelope"></i> <span class="badge">5</span></a> </li>

                    <?php  $notCompletedOrders = count(App\Order::all()->where('completed_order', false)) ?>
                    <li class=""><a href="#"><i class="fa fa-bell"></i> <span class="badge">{{ isset($notCompletedOrders) ? $notCompletedOrders : '' }}</span></a> </li>


                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Sing in</a></li>
                        <li><a href="{{ route('register') }}">Sing up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!--    top nav end===========-->

    <div class="wrapper" id="wrapper">
        <div class="left-container" id="left-container">
            <!-- begin SIDE NAV USER PANEL -->
            <div class="left-sidebar" id="show-nav">
                <ul id="side" class="side-nav">

                    <li class="panel">
                        <a id="panel1" href="javascript:;" data-toggle="collapse" data-target="#Dashboard"> <i class="fa fa-truck"></i> Orders
                            <span class="label label-danger">{{ isset($notCompletedOrders) ? $notCompletedOrders : '' }}</span>
                            <?php  $completedOrders = count(App\Order::all()->where('completed_order', true)) ?>
                            <span class="label label-primary">{{ isset($completedOrders) ? $completedOrders : '' }}</span>
                            <i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>
                        <ul class="collapse nav" id="Dashboard">
                            <li> <a href="/admin/not_completed_orders"><i class="fa fa-angle-double-right"></i> Outstanding orders</a> </li>
                            <li> <a href="/admin/dashboard"><i class="fa fa-angle-double-right"></i> All orders</a> </li>
                        </ul>
                    </li>
                    
                      <li class="panel">
                        <a id="panel2" href="javascript:;" data-toggle="collapse" data-target="#inbox"> <i class="fa fa-inbox"></i> Messages

                             <?php $allUserMessage = count(App\Admin\UserMessage::all()); ?>

                             <?php  $newUserMessage = count(App\Admin\UserMessage::all()->where('answer', false)) ?>
                            @if ($newUserMessage == 0)
                                <span class="label label-warning"> No new messages</span>
                            @else
                                <span class="label label-danger">New {{ $newUserMessage }} message/s</span>
                            @endif
                            <i class="fa fa fa-chevron-left pull-right" id="arow2"></i> </a>
                        <ul class="collapse nav" id="inbox">
                            <li> <a href="/admin/user_messages"><i class="fa fa-angle-double-right"></i> All messages
                            <span class="label label-primary">{{ isset($completedOrders) ? $completedOrders : '' }}</span></a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel3" href="javascript:;" data-toggle="collapse" data-target="#edit"> <i class="fa fa-product-hunt"></i> Products
                            <?php  $productCount = count(App\Admin\Product::all()) ?>
                            <span class="label label-success">{{ isset($productCount) ? $productCount : '0'}}</span>
                            <i class="fa fa fa-chevron-left pull-right" id="arow3"></i>
                        </a>
                        <ul class="collapse nav" id="edit">
                            <li> <a href="/admin/products"><i class="fa fa-angle-double-right"></i> All products</a> </li>
                            <li> <a href="/admin/products/create"><i class="fa fa-angle-double-right"></i> New products</a> </li>
                        </ul>
                    </li>


                    <li class="panel">
                            <a id="panel4" href="javascript:;" data-toggle="collapse" data-target="#charts"> <i class="fa fa-product-hunt"></i> Products of category
                                <i class="fa fa-chevron-left pull-right" id="arow4"></i> </a>
                            <ul class="collapse nav" id="charts">
                                @foreach($subCategoriesButtonsName as $subCategoriesButtonsName)
                                    <li> 
                                        <a href="/admin/products/search?category={{ $subCategoriesButtonsName->identifier }}">
                                            <i class="fa fa-angle-double-right"></i> 
                                             {{ $subCategoriesButtonsName->name }} 
                                             <sup class="badge">{{ count(App\Admin\Product::all()->where('identifier', $subCategoriesButtonsName->identifier)) }}</sup>
                                         </a> 
                                    </li>
                                @endforeach
                            </ul>
                    </li>

                    <li class="panel">
                        <a id="panel5" href="javascript:;" data-toggle="collapse" data-target="#clipboard"> <i class="fa fa-users"></i> All Users
                            <i class="fa fa fa-chevron-left pull-right" id="arow5"></i> </a>
                        <ul class="collapse nav" id="clipboard">
                            <li> <a href="/admin/users"><i class="fa fa-angle-double-right"></i> Users</a> </li>
                            <li> <a href="/admin/admins"><i class="fa fa-angle-double-right"></i> Admins</a> </li>
                        </ul>
                    </li>

                  

                    <li class="panel">
                        <a id="panel6" href="javascript:;" data-toggle="collapse" data-target="#cogs"> <i class="fa fa-cogs"></i> Pages
                            <i class="fa fa fa-chevron-left pull-right" id="arow6"></i> </a>
                        <ul class="collapse nav" id="cogs">
                            <li> <a href="/admin/pages"><i class="fa fa-angle-double-right"></i> All pages</a> </li>
                            <li> <a href="/admin/pages/create"><i class="fa fa-angle-double-right"></i> New page</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel7" href="javascript:;" data-toggle="collapse" data-target="#paper"> <i class="fa fa-cogs"></i> Category
                            <?php  $categoryCount = count(App\Admin\Category::all()) ?>
                            <span class="label label-success">{{ isset($categoryCount) ? $categoryCount : '0' }}</span>
                            <i class="fa fa fa-chevron-left pull-right" id="arow7"></i> </a>
                        <ul class="collapse nav" id="paper">
                            <li> <a href="/admin/categories/"><i class="fa fa-angle-double-right"></i> All category</a> </li>
                            <li> <a href="/admin/categories/create"><i class="fa fa-angle-double-right"></i> New category</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel8" href="javascript:;" data-toggle="collapse" data-target="#trash"> <i class="fa fa-cogs"></i> Sub category
                        
                            <?php  $subCategoryCount = count(App\Admin\SubCategory::all()) ?>
                            <span class="label label-success">{{ isset($subCategoryCount) ? $subCategoryCount : '0' }}</span>
                            <i class="fa fa fa-chevron-left pull-right" id="arow8"></i>
                        </a>
                        <ul class="collapse nav" id="trash">
                            <li> <a href="/admin/sub_categories/"><i class="fa fa-angle-double-right"></i> All category</a> </li>
                            <li> <a href="/admin/sub_categories/create"><i class="fa fa-angle-double-right"></i> New category</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel9" href="javascript:;" data-toggle="collapse" data-target="#btc">
                            <i class="fa fa-globe"></i> General information
                            <i class="fa fa fa-chevron-left pull-right" id="arow9"></i>
                        </a>
                        <ul class="collapse nav" id="btc">
                            <li> <a href="/admin/info_company/"><i class="fa fa-angle-double-right"></i> Information</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel10" href="javascript:;" data-toggle="collapse" data-target="#slider">
                            <i class="fa fa-bar-chart"></i> Slider
                            <i class="fa fa fa-chevron-left pull-right" id="arow10"></i> </a>
                        <ul class="collapse nav" id="slider">
                            <li> <a href="/admin/slider/"><i class="fa fa-angle-double-right"></i>All photos</a> </li>
                            <li> <a href="/admin/slider/create"><i class="fa fa-angle-double-right"></i> Add photos</a> </li>
                        </ul>
                     </li>

                    <li class="panel">
                        <a id="panel11" href="javascript:;" data-toggle="collapse" data-target="#countries">
                            <i class="fa fa-bar-chart"></i> Countries
                            <i class="fa fa fa-chevron-left pull-right" id="arow11"></i> </a>
                        <ul class="collapse nav" id="countries">
                            <li> <a href="/admin/countries/"><i class="fa fa-angle-double-right"></i>All countries </a> </li>
                            <li> <a href="/admin/countries/create"><i class="fa fa-angle-double-right"></i> Add country</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel12" href="javascript:;" data-toggle="collapse" data-target="#cities">
                            <i class="fa fa-bar-chart"></i> Cities
                            <i class="fa fa fa-chevron-left pull-right" id="arow12"></i> </a>
                        <ul class="collapse nav" id="cities">
                            <li> <a href="/admin/cities/"><i class="fa fa-angle-double-right"></i>All cities </a> </li>
                            <li> <a href="/admin/cities/create"><i class="fa fa-angle-double-right"></i> Add city</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel13" href="javascript:;" data-toggle="collapse" data-target="#sellers">
                            <i class="fa fa-bar-chart"></i> Sellers
                            <i class="fa fa fa-chevron-left pull-right" id="arow13"></i> </a>
                        <ul class="collapse nav" id="sellers">
                            <li> <a href="/admin/sellers/"><i class="fa fa-angle-double-right"></i>All sellers </a> </li>
                            <li> <a href="/admin/sellers/create"><i class="fa fa-angle-double-right"></i> Create seller</a> </li>
                        </ul>
                    </li>

                    <li class="panel">
                        <a id="panel13" href="javascript:;" data-toggle="collapse" data-target="#sellers">
                            <i class="fa fa-bar-chart"></i> Sellers
                            <i class="fa fa fa-chevron-left pull-right" id="arow13"></i> </a>
                        <ul class="collapse nav" id="sellers">
                            <li> <a href="/admin/sellers/"><i class="fa fa-angle-double-right"></i>All sellers </a> </li>
                            <li> <a href="/admin/sellers/create"><i class="fa fa-angle-double-right"></i> Create seller</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END SIDE NAV USER PANEL -->
        </div>
        <div class="right-container" id="right-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="#"> Home</a></li>
                            <li class="active">{{ $title }}</li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-inline pull-right mini-stat">
                            <li>
                                <?php $allLikes = count(App\Like::all()); ?>
                                <h5>ХАРЕСВАНИЯ <span class="stat-value color-blue"><i class="fa fa-plus-circle"></i> {{ isset($allLikes) ? $allLikes : '' }}</span></h5>

                            </li>
                            <li>
                               
                                <h5>СЪОБЩЕНИЯ <span class="stat-value color-green"><i class="fa fa-plus-circle"></i> {{ isset($allUserMessage) ? $allUserMessage : '' }}</span></h5>

                            </li>
                            <li>
                                <h5>ПОТРЕБИТЕЛИ <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i> {{ is_null(App\User::all()) ? '0' : count(App\User::all())  }} </span></h5>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="main-header">
                            <h2>{{ $title }}</h2>

                            @if(session()->has('notif'))
                                <em style="color: #00d64b">{{ session()->get('notif') }}</em>
                            @else
                                <em>Информация</em>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row padding-top">

            <script>
        		$('#menu-scroll').hide();
    		</script>