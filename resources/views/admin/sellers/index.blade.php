@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')

    <a class="btn btn-primary" href="/admin/sellers/create">New sellers</a>
    <br>
    <br>
    @if(count($all_sellers) > 0)
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Sellers</th>
                <th>User id</th>
                <th>Active company</th>
                <th>Brand name</th>
                <th>Brand description</th>
                <th>Brand logo</th>
                <th>Brand banner</th>
                <th>Company Name</th>
                <th>Company vat</th>
                <th>Company phone</th>
                <th>Country ID</th>
                <th>City ID</th>
                <th>Company address</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($all_sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>
                    <td><a href="/admin/sellers/{{ $seller->id }}">{{ $seller->brand_name }}</a></td>
                    <td>{{ $seller->user_id }}</td>
                    <td>{{ $seller->active_company }}</td>
                    <td>{{ $seller->brand_name }}</td>
                    <td>{{ $seller->brand_description }}</td>
                    <td>{{ $seller->brand_log }}</td>
                    <td>{{ $seller->brand_banner }}</td>
                    <td>{{ $seller->company_name }}</td>
                    <td>{{ $seller->company_vat }}</td>
                    <td>{{ $seller->phone }}</td>
                    <td>{{ $seller->country_id }}</td>
                    <td>{{ $seller->city_id }}</td>
                    <td>{{ $seller->company_address }}</td>
                    <td></td>
                    <td>
                        <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $seller->id }}/edit">Edit</a>
                        <form method="POST" action="/admin/sellers/{{ $seller->id }}" accept-charset="UTF-8" class="pull-right">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Няма създадени категегории</p>
    @endif
    @include('admin.admin_partials.admin_menu_bottom')
@endsection