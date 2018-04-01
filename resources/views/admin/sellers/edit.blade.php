@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')

    <div class="col-md-10">
        <div class="basic-grey">
            <form action="{{ route('accounts.store_seller') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}" class="label-values"/>

                <label>
                    <span>Brandname * </span>
                    <input type="text" name="brand_name" value="{{ $seller->brand_name }}" class="label-values"/>
                </label>

                <label>
                    <span>Company / Brand logo </span>
                    <input type="text" name="brand_logo" value="{{ $seller->brand_logo }}" class="label-values"/>
                </label>

                <label>
                    <span style="margin: 0;">Активен продукт в магазина: </span>
                    <input type="radio" name="active_company" value="1" {{ $seller->active_company == 1 ? 'checked' : '' }}> Yes
                    <input type="radio" name="active_company" value="0" {{ $seller->active_company == 1 ? '' : 'checked' }}> No
                </label>
                <br>

                <label>
                    <span>Profile page banner </span>
                    <input type="text" name="brand_banner" value="{{ $seller->brand_banner }}" class="label-values"/>
                </label>

                <label>
                    <span> Company name</span>
                    <input type="text" name="company_name" value="{{ $seller->company_name }}" class="label-values"/>
                </label>

                <label>
                    <span>Company UIC Personal ID</span>
                    <input type="text" name="company_uic" value="{{ $seller->company_uic }}" class="label-values"/>
                </label>

                <label>
                    <span title="VAT registered?">company VAT registered?</span>
                    <input type="checkbox" name="company_vat_registered" value="{{ $seller->company_vat_registered }}" class="label-values"/>
                </label>

                <label>
                    <span>Phone</span>
                    <input type="text" name="company_phone" value="{{ $seller->company_phone }}" class="label-values"/>
                </label>

                <label>
                    <span>Accept terms</span>
                    <input type="checkbox" name="accept_terms" class="label-values"/>
                </label>

                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                    <label>
                        <span>Country</span>
                        <?php ?>
                        <select class="form-control" name="country_id" >
                            <option value="">Chose country</option>
                            @foreach($countries as $country)
                                @if ($seller->country_id == $country->id )
                                    <option selected="selected" value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @else
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </label>
                </div>

                <label>
                    <span>City</span>
                    <input type="text" name="city_id" value="{{ $seller->city_id }}" class="label-values"/>
                </label>

                <label>
                    <span>Street address, post code</span>
                    <input type="text" name="address_company" value="{{ $seller->address_company }}" id="admin_product_description" class="label-values"/>
                </label>

                <span>Description</span>
                <label>
                    <textarea name="brand_description" id="editor-create" >{{ $seller->brand_description }}</textarea>
                </label>
                <br>


                <div class="actions">
                    <input type="submit" name="commit" value="Създай" class="btn btn-success">
                </div>
            </form>
        </div>


        <script src="{{ URL::to('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'editor-create' );
        </script>


        @include('admin.admin_partials.admin_menu_bottom')
@endsection