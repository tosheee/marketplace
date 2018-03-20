@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @include('partials.account_navigation')
    </div>


    <div class="col-md-9">

    <a class="btn btn-primary" href="/account/create_seller">New product</a>
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


                <div class="container">
                    <div class="row">
                        <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                            <ul class="event-list">
                                <li>
                                    <time datetime="2018-10-29">
                                        <span class="day">29</span>
                                        <span class="month">Oct</span>
                                        <span class="year">2018</span>
                                        <span class="time">ALL DAY</span>
                                    </time>
                                    <img alt="dj-set" src="https://st.depositphotos.com/1430909/1434/i/950/depositphotos_14345167-stock-photo-dj-playing-the-track.jpg" />
                                    <div class="info">

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h2 class="title">Laco 1st year anniversary</h2>
                                            </div>
                                            <div class="col-sm-2">
                                                <img alt="germany" class="flag" src="https://theodora.com/flags/new/de-t.gif" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Start:</div>
                                            <div class="col-sm-9">29 Oct 2018 (23:30)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">End:</div>
                                            <div class="col-sm-9">30 Oct 2018 (06:00)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Address:</div>
                                            <div class="col-sm-9">Falckensteinstraße 49, 10997 Berlin</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Cost:</div>
                                            <div class="col-sm-9">€15</div>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-soundcloud"></span></a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <time datetime="2017-11-24">
                                        <span class="day">24</span>
                                        <span class="month">Nov</span>
                                        <span class="year">2017</span>
                                        <span class="time">Evening</span>
                                    </time>
                                    <img alt="dj-set" src="https://st.depositphotos.com/1430909/1434/i/950/depositphotos_14345167-stock-photo-dj-playing-the-track.jpg" />
                                    <div class="info">

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h2 class="title">Jazz Cafe presents Osunlade</h2>
                                            </div>
                                            <div class="col-sm-2">
                                                <img alt="germany" class="flag" src="https://theodora.com/flags/new2/en_lang.gif" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Start:</div>
                                            <div class="col-sm-9">24 Nov 2017 (21:30)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">End:</div>
                                            <div class="col-sm-9">25 Nov 2017 (02:00)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Address:</div>
                                            <div class="col-sm-9">5 Parkway, Camden Town, London NW1 7PG, UK</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Cost:</div>
                                            <div class="col-sm-9">£10</div>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-soundcloud"></span></a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <time datetime="2017-10-7">
                                        <span class="day">30</span>
                                        <span class="month">Oct</span>
                                        <span class="year">2017</span>
                                        <span class="time">Morning</span>
                                    </time>
                                    <img alt="dj-set" src="http://thefinancialphysician.com/wp-content/uploads/2013/03/microphone-radio2-300x300.jpg" />
                                    <div class="info">

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h2 class="title">Interview on Feta radio</h2>
                                            </div>
                                            <div class="col-sm-2">
                                                <img alt="italy" class="flag" src="https://theodora.com/flags/new9/italy-t.gif" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Start:</div>
                                            <div class="col-sm-9">30 Oct 2017 (10:00)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">End:</div>
                                            <div class="col-sm-9">30 Oct 2017 (11:00)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Address:</div>
                                            <div class="col-sm-9">Feta radio, Rome, 1234, Italy</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Cost:</div>
                                            <div class="col-sm-9">Free</div>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-soundcloud"></span></a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <time datetime="2017-10-7">
                                        <span class="day">7</span>
                                        <span class="month">Oct</span>
                                        <span class="year">2017</span>
                                        <span class="time">Evening</span>
                                    </time>
                                    <img alt="dj-set" src="https://st.depositphotos.com/1430909/1434/i/950/depositphotos_14345167-stock-photo-dj-playing-the-track.jpg" />
                                    <div class="info">

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h2 class="title">Crate Diggers Amsterdam</h2>
                                            </div>
                                            <div class="col-sm-2">
                                                <img alt="germany" class="flag" src="https://theodora.com/flags/new8/netherlands-t.gif" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Start:</div>
                                            <div class="col-sm-9">7 Oct 2017 (22:00)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">End:</div>
                                            <div class="col-sm-9">8 Oct 2017 (04:00)</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Address:</div>
                                            <div class="col-sm-9">De Marktkantine, Jan van Galenstraat 6, 1051 KM Amsterdam</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Cost:</div>
                                            <div class="col-sm-9">Free</div>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                            <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                            <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-soundcloud"></span></a></li>
                                        </ul>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>



            @if( method_exists($insertedProducts,'links') )
        {{  $insertedProducts ->links() }}
    @endif


@else
    <p>Няма намерени продукти</p>
@endif
@endsection