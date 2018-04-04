@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')


    <?php $user = App\User::find($seller->user_id); ?>

    <tr>
        <td>{{ $seller->id }}</td>
        <td><a href="/admin/sellers/{{ $seller->id }}">{{ $seller->brand_name }}</a></td>
        <td>
            {{ $seller->user_id }}<br/>
            User   <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }}   name="role_user">
            Buyer <input type="checkbox" {{ $user->hasRole('Buyer') ? 'checked' : '' }}   name="role_buyer">
            Seller <input type="checkbox" {{ $user->hasRole('Seller') ? 'checked' : '' }} name="role_seller">
        </td>

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




    @include('admin.admin_partials.admin_menu_bottom')
@endsection