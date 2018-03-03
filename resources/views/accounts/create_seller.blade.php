@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @include('partials.account_navigation')
    </div>

    <div class="col-md-10">
        <div class="basic-grey">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                

                <label>
                    <span>Brandname * </span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Company / Brand logo </span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Profile page banner </span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span> Company name</span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Company UIC Personal ID</span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span title="Is your company VAT registered?">company VAT registered?</span>
                    <input type="checkbox" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Phone</span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Accept terms</span>
                    <input type="checkbox" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Country</span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>Street address, post code</span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <label>
                    <span>City</span>
                    <input type="text" name="brand_name" value="" id="admin_product_description" class="label-values"/>
                </label>

                <span>Description</span>
                    <label>
                        <textarea name="description[general_description]" id="editor-create" ></textarea>
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