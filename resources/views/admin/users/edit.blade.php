@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')

        <h1>Edit User</h1>
        <a href="/admin/users" class="btn btn-default">Back</a>
        <br><br>

        <form method="POST" action="/admin/users/{{ $user->id }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" placeholder="Name" name="name" type="text" value="{{ $user->name }}" id="name">
            </div>

            <div class="form-group">
                <label for="name">E-mail</label>
                <input class="form-control" placeholder="Email" name="email" type="text" value="{{ $user->email }}" id="email">
            </div>

            <div class="form-group">
                <label for="name">Password</label>
                <input class="form-control" placeholder="Password" name="password" type="text" value="{{ $user->password }}" id="password">
            </div>

            <div class="form-group">
                User   <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }}   name="role_user">
                Buyer  <input type="checkbox" {{ $user->hasRole('Buyer') ? 'checked' : '' }}   name="role_buyer">
                Seller <input type="checkbox" {{ $user->hasRole('Seller') ? 'checked' : '' }} name="role_seller">
            </div>

            <input name="_method" type="hidden" value="PUT">
            <input class="btn btn-primary" type="submit" value="Промени">
        </form>

    @include('admin.admin_partials.admin_menu_bottom')
@endsection