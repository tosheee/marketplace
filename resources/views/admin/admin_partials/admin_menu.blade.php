
<!--=============================
                                           NAVIGATION
                                 =============================-->
<!--top nav start=======-->
<nav class="navbar navbar-inverse top-bar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times" aria-hidden="true" id="chang-menu-icon"></i></span>
            <a class="navbar-brand" href="#"><img src="https://lh3.googleusercontent.com/-N4NB2F966TU/WM7V1KYusRI/AAAAAAAADtA/fPvGVNzOkCo7ZMqLI6pPITE9ZF7NONmawCJoC/w185-h40-p-rw/logo.png" width="90%"> </a>
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
                <li class=""><a href="#"><i class="fa fa-refresh"></i> Start Tour</a> </li>
                <li class=""><a href="#"><i class="fa fa-volume-up"></i></a> </li>
                <li class=""><a href="#"><i class="fa fa-envelope"></i> <span class="badge">5</span></a> </li>
                <li class=""><a href="#"><i class="fa fa-bell"></i> <span class="badge">9</span></a> </li>
                <li class="">
                    <a href="#" class="user-profile"> <span class=""><img class="img-responsive" src="https://lh3.googleusercontent.com/-HxSAl6WJSI0/WM-dbkQ1ONI/AAAAAAAADuY/RsjaXC3tg4oBozCUYyLr12ZjZ1_Cl91mACJoC/w424-h319-p-rw/sumit.png"></span> </a>
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sumit
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                        <li> <a href="#"><i class="fa fa-cog"></i> Setting</a> </li>
                        <li> <a href="#"><i class="fa fa-power-off"></i> Logout</a> </li>
                    </ul>
                </li>
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
                    <a id="panel1" href="javascript:;" data-toggle="collapse" data-target="#Dashboard"> <i class="fa fa-dashboard"></i> Dashboard
                        <i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>
                    <ul class="collapse nav" id="Dashboard">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel2" href="javascript:;" data-toggle="collapse" data-target="#charts"> <i class="fa fa-bar-chart-o"></i> Charts
                        <i class="fa fa-chevron-left pull-right" id="arow2"></i> </a>
                    <ul class="collapse nav" id="charts">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel3" href="javascript:;" data-toggle="collapse" data-target="#calendar"> <i class="fa fa-calendar"></i> calendar
                        <span class="label label-danger">new event</span> <i class="fa fa-chevron-left pull-right" id="arow3"></i> </a>
                    <ul class="collapse nav" id="calendar">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel4" href="javascript:;" data-toggle="collapse" data-target="#clipboard"> <i class="fa fa-clipboard"></i> clipboard
                        <i class="fa fa fa-chevron-left pull-right" id="arow4"></i> </a>
                    <ul class="collapse nav" id="clipboard">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel5" href="javascript:;" data-toggle="collapse" data-target="#edit"> <i class="fa fa-edit"></i> edit
                        <i class="fa fa fa-chevron-left pull-right" id="arow5"></i>
                    </a>
                    <ul class="collapse nav" id="edit">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel6" href="javascript:;" data-toggle="collapse" data-target="#inbox"> <i class="fa fa-inbox"></i> inbox
                        <span class="label label-primary">new msz</span> <i class="fa fa fa-chevron-left pull-right" id="arow6"></i> </a>
                    <ul class="collapse nav" id="inbox">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel7" href="javascript:;" data-toggle="collapse" data-target="#cogs"> <i class="fa fa-cogs"></i> cogs
                        <span class="label label-warning">Warning</span> <i class="fa fa fa-chevron-left pull-right" id="arow7"></i> </a>
                    <ul class="collapse nav" id="cogs">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel8" href="javascript:;" data-toggle="collapse" data-target="#paper"> <i class="fa fa-paper-plane"></i> paper
                        <i class="fa fa fa-chevron-left pull-right" id="arow8"></i> </a>
                    <ul class="collapse nav" id="paper">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel9" href="javascript:;" data-toggle="collapse" data-target="#trash"> <i class="fa fa-trash"></i> Trash
                        <i class="fa fa fa-chevron-left pull-right" id="arow9"></i>
                    </a>
                    <ul class="collapse nav" id="trash">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="panel10" href="javascript:;" data-toggle="collapse" data-target="#btc">
                        <i class="fa fa-btc"></i> paper
                        <i class="fa fa fa-chevron-left pull-right" id="arow10"></i>
                    </a>
                    <ul class="collapse nav" id="btc">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>

                <li class="panel">
                    <a id="panel11" href="javascript:;" data-toggle="collapse" data-target="#pie-Chart">
                        <i class="fa fa-bar-chart"></i> Chart
                        <span class="label label-success">Supper</span> <i class="fa fa fa-chevron-left pull-right" id="arow11"></i> </a>
                    <ul class="collapse nav" id="pie-Chart">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>

                <li class="panel">
                    <a id="panel12" href="javascript:;" data-toggle="collapse" data-target="#country">
                        <i class="fa fa-bar-chart"></i> Countries & Cities
                        <i class="fa fa fa-chevron-left pull-right" id="arow12"></i> </a>
                    <ul class="collapse nav" id="country">
                        <li> <a href="/admin/countries"><i class="fa fa-angle-double-right"></i> Countries</a> </li>
                        <li> <a href="/admin/cities"><i class="fa fa-angle-double-right"></i> Cities</a> </li>
                    </ul>
                </li>

                <li class="panel">
                    <a id="panel13" href="javascript:;" data-toggle="collapse" data-target="#pie-Chart">
                        <i class="fa fa-bar-chart"></i> Chart
                        <span class="label label-success">Supper</span> <i class="fa fa fa-chevron-left pull-right" id="arow13"></i> </a>
                    <ul class="collapse nav" id="pie-Chart">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a> </li>
                    </ul>
                </li>

                <li class="panel">
                    <a id="panel14" href="javascript:;" data-toggle="collapse" data-target="#pie-Chart">
                        <i class="fa fa-bar-chart"></i> Countries & Cities
                        <span class="label label-success">Supper</span> <i class="fa fa fa-chevron-left pull-right" id="arow14"></i> </a>
                    <ul class="collapse nav" id="pie-Chart">
                        <li> <a href="/admin/countries"><i class="fa fa-angle-double-right"></i> Countries</a> </li>
                        <li> <a href="/admin/cities"><i class="fa fa-angle-double-right"></i> Cities</a> </li>
                    </ul>
                </li>
                <li class="panel">
                    <a id="" href="javascript:;" data-toggle="collapse" data-target="#pie-Chart">
                        <i class="fa fa-bar-chart"></i>
                        <span class="label label-success"></span> <i class="fa fa fa-chevron-left pull-right" id=""></i> </a>
                    <ul class="collapse nav" id="pie-">
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Countries</a> </li>
                        <li> <a href="#"><i class="fa fa-angle-double-right"></i> Cities</a> </li>
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
                        <li class="active">Dashboard</li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <ul class="list-inline pull-right mini-stat">
                        <li>
                            <h5>LIKES <span class="stat-value color-blue"><i class="fa fa-plus-circle"></i> 81,450</span></h5>

                        </li>
                        <li>
                            <h5>SUBSCRIBERS <span class="stat-value color-green"><i class="fa fa-plus-circle"></i> 150,743</span></h5>

                        </li>
                        <li>
                            <h5>CUSTOMERS <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i> 43,748</span></h5>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-header">
                        <h2>DASHBOARD</h2>
                        <em>the first priority information</em>
                    </div>
                </div>
            </div>
