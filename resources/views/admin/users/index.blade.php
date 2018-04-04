@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')
        <h3>Потребители</h3>
        <a class="btn btn-primary" href="/admin/users/create">Add user</a>
        <br>
        <br>
        @if(count($users) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->isOnline())
                                <i class="fa fa-user mr-5" style="color: #0ade43"></i>
                            @else
                                <i class="fa fa-user mr-5" style="color: #f5021d"></i>
                            @endif
                                <a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a>
                        </td>

                        <td>{{ $user->email }}</td>
                        <td>
                            User   <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }}   name="role_user">
                            Buyer <input type="checkbox" {{ $user->hasRole('Buyer') ? 'checked' : '' }}   name="role_buyer">
                            Seller <input type="checkbox" {{ $user->hasRole('Seller') ? 'checked' : '' }} name="role_seller">
                        </td>
                        <td>{{ substr($user->password, 0, 25) }}</td>
                        <td><a class="btn btn-default btn-xs" href="/admin/users/{{ $user->id }}/edit">Edit</a></td>
                        <td>
                            <form method="POST" action="/admin/users/{{ $user->id }}" accept-charset="UTF-8" class="pull-right">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Do not exist users</p>
        @endif
    @include('admin.admin_partials.admin_menu_bottom')
@endsection