@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')

    <a class="btn btn-primary" href="/admin/sellers/create">New sellers</a>
    <br>
    <br>
    @if(count($all_sellers) > 0)
        <table class="table table-striped">
            <tr>
                <th>Sellers</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($all_sellers as $seller)
                <tr>
                    <td><a href="/admin/sellers/{{ $seller->id }}">{{ $seller->name }}</a></td>
                    <td><a class="btn btn-default" href="/admin/sellers/{{ $seller->id }}/edit">Промяна</a></td>
                    <td>
                        <form method="POST" action="/admin/sellers/{{ $seller->id }}" accept-charset="UTF-8" class="pull-right">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <input class="btn btn-danger" type="submit" value="Изтриване">
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