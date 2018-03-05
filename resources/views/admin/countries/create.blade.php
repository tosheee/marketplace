@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Create country</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('countries.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('active_countries') ? ' has-error' : '' }}">
                                <label for="active_countries" class="col-md-4 control-label">Activate</label>
                                <div class="col-md-6">
                                    Yes: <input type="radio" name="active_countries" value="1" required>
                                    No:  <input type="radio" name="active_countries" value="0" required checked>
                                    @if ($errors->has('active_countries'))
                                        <span class="help-block"><strong>{{ $errors->first('active_countries') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country_name') ? ' has-error' : '' }}">
                                <label for="country_name" class="col-md-4 control-label">Country name</label>
                                <div class="col-md-6">
                                    <input id="country_name" type="text" class="form-control" name="country_name" required autofocus>
                                    @if ($errors->has('country_name'))
                                        <span class="help-block"><strong>{{ $errors->first('country_name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country_identifier') ? ' has-error' : '' }}">
                                <label for="country_identifier" class="col-md-4 control-label">Country identifier</label>
                                <div class="col-md-6">
                                    <input id="country_identifier" type="text" class="form-control" name="country_identifier" required autofocus>
                                    @if ($errors->has('country_identifier'))
                                        <span class="help-block"><strong>{{ $errors->first('country_identifier') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.admin_partials.admin_menu_bottom')
@endsection