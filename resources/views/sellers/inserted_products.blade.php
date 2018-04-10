@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @include('partials.seller_navigation')
    </div>


    <div class="col-md-9">

    <a class="btn btn-primary" href="/sellers/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}/create_product">New product</a>
    <br/>
    <br/>

        @if(count($insertedProducts) > 0)
            @foreach($insertedProducts as $product)
              <?php $descriptions = json_decode($product->description, true); ?>
                  <details>
                  <summary style="background-color: transparent">
                      @if(isset($descriptions['title_product']))

                          @if (isset($descriptions['main_picture_url']))
                              <img style="margin: 0 auto; width: 120px;height: 100px;" src="{{ $descriptions['main_picture_url'] }}" alt="pic" />
                          @elseif(isset($descriptions['upload_main_picture']))
                              <img style="margin: 0 auto; width: 120px;height: 100px;" src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
                          @else
                              <img style="margin: 0 auto; width: 120px;height: 100px;" src="/storage/common_pictures/noimage.jpg" alt="pic" />
                          @endif

                          <a href="/admin/products/{{ $product->id }}">{{ $descriptions['title_product'] }}</a>


                          <form method="POST" action="/admin/products/{{ $product->id }}" accept-charset="UTF-8" class="pull-right">
                              {{ csrf_field() }}
                              <a class="btn btn-default" href="/admin/products/{{ $product->id }}/edit">Промяна</a>
                              <input name="_method" type="hidden" value="DELETE">
                              <input class="btn btn-danger" type="submit" value="Изтриване">
                          </form>

                      @endif
                  </summary>
                      <div class="col-sm-3">
                          @foreach($categories as $category)
                              @if($product->category_id == $category->id)
                                  <p><b>Category:</b> {{ $category->name }}</p>
                              @endif
                          @endforeach

                          @foreach($subCategories as $subCategory)
                              @if($product->sub_category_id == $subCategory->id)
                                  <p><b>Sub category:</b> {{ $subCategory->name }}</p>
                              @endif
                          @endforeach
                          <p>
                              <b>Идентификатор:</b> {{ $product->identifier }}
                          </p>
                      </div>

                      <div class="col-sm-3">
                          <p><b>Активен: </b>{{ $product->active == 1 ? 'ДА' : 'НЕ' }}</p>
                          <p><b>Разпродажба: </b>{{ $product->sale == 1 ? 'ДА' : 'НЕ' }}</p>
                          <p><b>Препоръчан: </b>{{ $product->recommended == 1 ? 'ДА' : 'НЕ' }}</p>
                          <p><b>Най-продаван: </b>{{ $product->best_sellers == 1 ? 'ДА' : 'НЕ' }}</p>
                      </div>

                      <div class="col-sm-3">
                          @if(isset($descriptions['price']))
                              <p>Цена: <b>{{ $descriptions['price'] }}</b></p>
                          @endif

                          @if(isset($descriptions['delivery_price']))
                              <p>Доставна цена: <b>{{ $descriptions['delivery_price'] }}</b></p>
                          @endif
                      </div>

              </details>

            @endforeach
                @if( method_exists($insertedProducts,'links') )
        {{  $insertedProducts ->links() }}
    @endif


@else
    <p>No products</p>
@endif
@endsection