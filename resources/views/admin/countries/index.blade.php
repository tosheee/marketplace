@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')
        <a class="btn btn-primary" href="/admin/countries/create">Create new country</a>
        <br/><br/>
        @if(count($countries) > 0)
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name Country</th>
                    <th>Identifier</th>
                    <th>Active</th>
                    <th></th>
                </tr>
                @foreach($countries as $country)
                    <tr>
                        <td >
                            {{ $country->id }}
                        </td>

                        <td>
                            {{ $country->country_name }}
                        </td>

                        <td>
                            {{ $country->country_identifier }}
                        </td>

                        <td>
                            <input type="checkbox"  {{ $country->active_countries == 1 ? 'checked' : '' }}>
                            {{ $country->active_countries == 1 ? 'Active' : 'Disable' }}
                        </td>

                        <td>
                            <a class="btn btn-default btn-sm" href="/admin/countries/{{ $country->id }}/edit">Edit</a>
                            <form method="POST" action="/admin/countries/{{ $country->id }}" accept-charset="UTF-8" class="pull-right">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
             
            @if( method_exists($countries,'links') )
                {{  $countries ->links() }}
            @endif 
            
            
        @else
            <p>No country</p>
        @endif
    @include('admin.admin_partials.admin_menu_bottom')
@endsection