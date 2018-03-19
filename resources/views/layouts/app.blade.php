<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        @if(isset($product))
            @if(isset($metaDescription))
            
                <meta property="fb:app_id" content="966242223397117" />
                <meta property="og:url" content="{{ Request::fullUrl() }}" />
                <meta property="og:type" content="product" />
                <meta property="og:title" content="Floromaniq - {{isset($metaDescription) ? $metaDescription['title_product'] : '' }}" />
                <meta property="og:description" content="{{isset($metaDescription) ? $metaDescription['title_product'] : '' }}" />
                <meta property="og:image" content="{{ asset('storage/upload_pictures')}}/{{ $product->id }}/{{ $metaDescription['upload_main_picture'] }}" />
                <script src="//connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v2.11"></script>
            @endif
        @endif
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Floromaniq</title>
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    </head>
    
    <body>
        <header>
                @include('partials.horizontal_nav_bar')
        </header>

        <div id="wrapper">
            <div class="container-fluid" id="main-container">
                <div class="row">
                     @yield('content') </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        
        <footer>
           
        </footer>
    </body>
</html>
