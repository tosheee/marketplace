@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @include('partials.account_navigation')
    </div>

    <div class="col-md-9">
        <div class="row">
            @if(count($user_orders) > 0)
              <div id="user-orders" class="container">
                    <div class="row title-row">
                        <div class="page-title">
                            <h3>Твоите поръчки</h3>
                        </div>
                    </div>

                    <div class="row order_sorter">
                        <ul id="toggle-orders">
                            <li class="first"></li>
                            <li class="fo selected"> <a href="/store">Обратно в магазина</a></></li>
            			    <li class="oh "><a>История на поръчките</a></li>
            			    <li class="ed selected"><a href="/checkout">Продължи поръчката</a></></li>
                        </ul>
                    </div>


                @foreach($user_orders as $order)
                    <?php $products = unserialize(base64_decode($order->cart)) ?>

                    <div class="order-container">
                        <div class="header">
                            <div class="row">
                                <div class="col-1"><span>Дата</span><span>{{ $order->created_at->format('d M Y')  }}</span></div>
                                <div class="col-2"><span>Общо</span><span>{{ $products->totalPrice }} лв</span></div>
                                <div class="col-3"><span>Име</span><span>{{ ucwords($order->name)}} {{ ucwords($order->last_name)}}</span></div>
                                <div class="col-4"><span>Номер на поръчката</span><span>{{ $order->id }}</span></div>
                            </div>
                        </div>

                        @foreach($products->items as $product)
                            <?php $descriptions = json_decode($product['item']['description'], true); ?>
                            <div class="box">
                                <div class="row">
                                    <div class="col-1">
                                        @if (isset($descriptions['main_picture_url']))
                                            <img src="{{ $descriptions['main_picture_url'] }}"  />
                                        @elseif(isset($descriptions['upload_main_picture']))
                                            <img src="/storage/upload_pictures/{{ $product['item']['id'] }}/{{ $descriptions['upload_main_picture'] }}" alt="">
                                        @else
                                            <img src="/storage/upload_pictures/noimage.jpg" alt="pic" />
                                        @endif
                                    </div>

                                    <div class="col-2">
                                        <span class="product-title">
                                            <a href="/store/{{ $product['item']['id'] }}" target="_blank">{{ $descriptions['title_product'] }}</a></td>
                                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </span>
                                        <p>
                                            Статус на поръчката:  {{ $order->completed_order == 1 ? ' Изпратена' : ' В процес на обработка' }} <br>
                                            Телефон: {{ $order->phone }} <br>
                                            Начин на плащане: {{ $order->payment_method }} <br>
                                            Начин на получаване: {{ $order->delivery_method == 'Тo_an_office' ? 'До офис' : 'До адрес' }} <br>
                                            <?php $address = json_decode($order->address, true); ?>
                                            @if($order->delivery_method == 'Тo_an_office')    
                                                <?php $partsOfAddress = explode(",", $address['street_office']);?>
                                                <b>Населено място: </b> {{ $partsOfAddress[1]}} <br>
                                                <b>Адрес: </b>    {{ $partsOfAddress[3] }}<br>
                                                <b>Телефон на офиса: </b>    {{ $partsOfAddress[2] }}<br>
                                                <b>Код на офиса: </b>    {{ $partsOfAddress[0] }}<br>
                                            @else 
                                                       
                                                <b>Населено място: </b>   {{ $address['populated_place'] }}<br>
                                                <b>Улица: </b>    {{ $address['street_office'] }}<br>
                                                <b>Номер: </b>    {{ $address['number_street_office'] }}<br>
                                            @endif
                                            
                                            
                                        </p>
                                    </div>

                                    <div class="col-3">
                                        <p>
                                            <br/>
                                            <br/>
                                            Брой на продуктите: {{ $product['qty'] }} бр. <br>
                                            Единична цена: {{ $descriptions['price']}} лв. <br>
                                            Обща цена: {{ $product['total_item_price'] }} лв. <br>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        <hr>
                        @endforeach
                    </div>
                @endforeach
            </div>

             {{ $user_orders->links() }}

            @else
                <p>No Orders</p>
            @endif
       </div>
   </div>
@endsection