@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @include('partials.seller_navigation')
    </div>

    <div class="col-md-10">
        <div class="basic-grey">
            <form action="{{ route('accounts.store_seller') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}" class="label-values"/>

                <label>
                    <span>Brandname * </span>
                    <input type="text" name="brand_name" class="label-values"/>
                </label>

                <label>
                    <span>Company / Brand logo </span>
                    <input type="text" name="brand_logo"class="label-values"/>
                </label>

                <label>
                    <span>Profile page banner </span>
                    <input type="text" name="brand_banner" class="label-values"/>
                </label>

                <label>
                    <span> Company name</span>
                    <input type="text" name="company_name" class="label-values"/>
                </label>

                <label>
                    <span>Company UIC Personal ID</span>
                    <input type="text" name="company_uic" class="label-values"/>
                </label>

                <label>
                    <span title="VAT registered?">company VAT registered?</span>
                    <input type="checkbox" name="company_vat_registered" class="label-values"/>
                </label>

                <label>
                    <span>Phone</span>
                    <input type="text" name="company_phone" class="label-values"/>
                </label>

                <label>
                    <span>Accept terms</span>
                    <input type="checkbox" name="accept_terms" class="label-values"/>
                </label>

                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                    <label>
                        <span>Country</span>
                        <select class="form-control" name="country_id" >
                            <option value="">Избери подкатегории</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <label>
                    <span>City</span>
                    <input type="text" name="city_id" class="label-values"/>
                </label>

                <label>
                    <span>Street address, post code</span>
                    <input type="text" name="address_company" value="" id="admin_product_description" class="label-values"/>
                </label>

                <span>Description</span>
                    <label>
                        <textarea name="brand_description" id="editor-create" ></textarea>
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


    </div>
@endsection