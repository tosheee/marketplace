@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')

    <a class="btn btn-primary" href="/admin/sellers/create">New sellers</a>
    <br>
    <br>

    @if(count($usersSellers) > 0)

        <div class='inwardTable'>
            <div class="table">
                <div class="tableRow tableTitle">
                    <div class="tableCell">
                        ID
                    </div>

                    <div class="tableCell">
                        User name
                    </div>
                    <div class="tableCell">
                        User E-mail
                    </div>
                    <div class="tableCell">

                    </div>
                    <div class="tableCell">
                        Sellers
                    </div>

                    <div class="tableCell">
                        Active
                    </div>

                    <div class="tableCell">
                    </div>

                    <div class="tableCell">
                    </div>

                </div>

                @foreach($usersSellers as $userSeller)

                    <?php
                    $sellers = App\Admin\Seller::where('user_id', $userSeller->id)->get();
                    $firstSeller = $sellers->first();
                    ?>

                    <div class="tableRow">
                        <div class="tableCell">
                            {{ $userSeller->id }}
                        </div>

                        <div class="tableCell">
                            {{ $userSeller->name }}
                        </div>

                        <div class="tableCell">
                            {{ $userSeller->email }}
                        </div>

                        <div class="tableCell">
                            @if ($userSeller->hasRole('User'))
                                <span class="label label-danger">New seller</span>
                            @elseif ($userSeller->hasRole('Seller'))
                                <span class="label label-success">Approved seller</span>
                            @endif

                            @if(count($sellers)>1)
                                <a href="javascript:void(0);" class="open"><i class="fa fa-angle-double-down 3x"></i></a>
                            @endif
                        </div>

                        <div class="tableCell">
                            <a href="/admin/sellers/{{ $firstSeller->id }}" title="Click button to view all information">{{ $firstSeller->brand_name }}</a>
                        </div>

                        <div class="tableCell">
                            @if ($firstSeller->active_company == 0)
                                <span class="label label-danger">Disable</span>
                            @else
                                <span class="label label-success">Enable</span>
                            @endif
                        </div>

                        <div class="tableCell">
                            <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $firstSeller->id }}" title="Click button to view all information">View</a>
                        </div>

                        <div class="tableCell">
                            <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $firstSeller->id }}/edit">Edit</a>

                            <form method="POST" action="/admin/sellers/{{ $firstSeller->id }}" accept-charset="UTF-8" class="pull-right">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                            </form>
                        </div>

                        <div class="subTables">

                            @foreach ( $sellers as $key => $seller )
                                @if (isset($sellers[$key + 1]))
                                    <div class='rowSubTable'>
                                        <div class="tableCell">
                                            &nbsp;
                                        </div>
                                        <div class="tableCell">
                                            &nbsp;
                                        </div>
                                        <div class="tableCell">
                                            &nbsp;
                                        </div>
                                        <div class="tableCell">
                                            &nbsp;
                                        </div>
                                        <div class="tableCell cellBorderTop">
                                            <a href="/admin/sellers/{{ $sellers[$key + 1] }}" title="Click name to view all information for seller">{{ $sellers[$key + 1]->brand_name }}</a>
                                        </div>
                                        <div class="tableCell cellBorderTop">
                                            @if ($sellers[$key + 1]->active_company == 0)
                                                <span class="label label-danger">Disable</span>
                                            @else
                                                <span class="label label-success">Enable</span>
                                            @endif
                                        </div>

                                        <div class="tableCell cellBorderTop">
                                            <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $sellers[$key + 1]->id }}" title="Click name to view all information">View</a>
                                        </div>

                                        <div class="tableCell cellBorderTop">
                                            <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $sellers[$key + 1]->id }}/edit">Edit</a>

                                            <form method="POST" action="/admin/sellers/{{ $sellers[$key + 1]->id }}" accept-charset="UTF-8" class="pull-right">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).ready(function() {
                $('.subTables').hide();
                $('.open').on('click', function() {
                    $(this).parent('div').parent('div').find('.subTables').slideToggle();
                    //$(this).find('.glyphicon-chevron-down').toggleClass('glyphicon-chevron-up');
                    if ($(this).find('i').hasClass('glyphicon-chevron-down')) {
                        $(this).find('i').removeClass('glyphicon-chevron-down');
                        $(this).find('i').addClass('glyphicon-chevron-up');
                    } else {
                        $(this).find('i').removeClass('glyphicon-chevron-up');
                        $(this).find('i').addClass('glyphicon-chevron-down');
                    }
                });

                $("#checkAll").change(function(){
                    var status = $(this).is(":checked") ? true : false;
                    $(".checkChange").prop("checked",status);
                });
            });
        </script>



    @else
        <p>Няма създадени категегории</p>
    @endif
    @include('admin.admin_partials.admin_menu_bottom')
@endsection