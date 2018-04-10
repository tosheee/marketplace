@extends('layouts.app')

@section('content')
    @include('admin.admin_partials.admin_menu_old')


    <hr>
    <div class="">
        <div class="row">
            <div class="col-sm-10"><h3>{{ $seller->brand_name }}
                @if($user->hasRole('User'))
                    <span class="label label-danger">New seller</span>
                @elseif($user->hasRole('Seller'))
                    <span class="label label-success">Approved seller</span>
                @endif
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-right"><span class="pull-left"><strong>User name:      </strong></span> {{ $user->name }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>E-mail:         </strong></span> {{ $user->email }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Brand name:     </strong></span> {{ $seller->brand_name }}</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong>Active company: </strong>
                        </span>
                        @if ($seller->active_company == 0)
                            <span class="label label-danger">Disable</span>
                        @else
                            <span class="label label-success">Enable</span>
                        @endif
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Name company:   </strong></span> {{ $seller->company_name }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Company vat:    </strong></span> {{ $seller->company_vat }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Phone:          </strong></span> 5234523452345</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Country:        </strong></span> {{ $seller->country_id }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>City:           </strong></span> {{ $seller->city_id }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Address:        </strong></span> {{ $seller->company_address }}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Added:          </strong></span> {{ $seller->created_at }}</li>
                </ul>

                <ul class="list-group">
                    <li class="list-group-item text-right">
                        <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $seller->id }}/edit">Edit</a>
                        <form method="POST" action="/admin/sellers/{{ $seller->id }}" accept-charset="UTF-8" class="pull-right">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                        </form>
                    </li>
                </ul>
            </div><!--/col-3-->

            <div class="col-sm-9">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home" data-toggle="tab">Ultimo Trattamento</a></li>
                    <li><a href="#messages" data-toggle="tab">Cronologia Appuntamenti</a></li>
                    <li><a href="#settings" data-toggle="tab">Modifica utente</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Trattamento</th>
                                        <th>Prodotti utilizzati</th>
                                        <th>Colori utilizzati</th>
                                        <th>Note</th>
                                        <th>Modifica</th>
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle ">


                                        <td>10.05.2017</td>
                                        <td>MASSAGGIO schiena</td>
                                        <td>usato loreal</td>
                                        <td>colore rosso</td>
                                        <td>il cliente preferisce il verde</td>
                                        <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>



                                    </tr>

                                <tr>
                                    <td colspan="12" class="hiddenRow"><div class="accordian-body collapse" id="demo1">
                                            <table class="table table-striped">
                                                <h1>Dettagli trattamento</h1>

                                                <tbody>
                                                <tr id='addr0'>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='mail0' placeholder='Mail' class="form-control"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name='mobile0' placeholder='Mobile' class="form-control"/>
                                                    </td>
                                                </tr>
                                                <tr id='addr1'></tr>
                                                </tbody>

                                            </table>
                                            <a id="add_row" class="btn btn-default pull-left">Aggiungi riga</a><a id='delete_row' class="pull-right btn btn-default">Elimina riga</a>

                                        </div> </td>
                                </tr>



                                </tbody>

                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div><!--/table-resp-->

                        <div id="edit" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title">Modifica dati per (servizio)</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input id="fn" type="text" class="form-control" name="fname" placeholder="Prodotti utilizzati">
                                        <input id="ln" type="text" class="form-control" name="fname" placeholder="Colori Utilizzati">
                                        <input id="mn" type="text" class="form-control" name="fname" placeholder="Note">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="up" class="btn btn-success" data-dismiss="modal">Aggiorna</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="messages">

                        <h2></h2>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Servizio</th>
                                    <th>Modifica</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                <tr>
                                    <td>10.05.2017</td>
                                    <td>MASSAGGIO schiena</td>

                                    <td><button type="button" data-toggle="modal" data-target="#edit" data-uid="1" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></td>


                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="settings">


                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Nome</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="nome" title="Inserisci il nome">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Cognome</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Cognome" title="Inserisci il cognome">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mobile"><h4>Telefono</h4></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="inserisci il numero di telefono" title="inserisci il numero di telefono">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="tua@email.it" title="Inserisci l'email">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Salva</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Ripristina</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    </hr>




    <?php $user = App\User::find($seller->user_id); ?>

    <tr>
        <td>{{ $seller->id }}</td>
        <td><a href="/admin/sellers/{{ $seller->id }}">{{ $seller->brand_name }}</a></td>
        <td>
            {{ $seller->user_id }}<br/>
            User   <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }}   name="role_user">
            Buyer <input type="checkbox" {{ $user->hasRole('Buyer') ? 'checked' : '' }}   name="role_buyer">
            Seller <input type="checkbox" {{ $user->hasRole('Seller') ? 'checked' : '' }} name="role_seller">
        </td>

        <td>
            @if ($seller->active_company == 0)
                <span class="label label-danger">Disable</span>
            @else
                <span class="label label-success">Enable</span>
            @endif
        </td>

        <td>{{ $seller->brand_name }}</td>
        <td>{{ $seller->brand_description }}</td>
        <td>{{ $seller->brand_log }}</td>
        <td>{{ $seller->brand_banner }}</td>


        <td>{{ $seller->company_name }}</td>
        <td>{{ $seller->company_vat }}</td>
        <td>{{ $seller->phone }}</td>
        <td>{{ $seller->country_id }}</td>
        <td>{{ $seller->city_id }}</td>
        <td>{{ $seller->company_address }}</td>
        <td></td>
        <td>
            <a class="btn btn-default btn-xs" href="/admin/sellers/{{ $seller->id }}/edit">Edit</a>
            <form method="POST" action="/admin/sellers/{{ $seller->id }}" accept-charset="UTF-8" class="pull-right">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <input class="btn btn-danger btn-xs" type="submit" value="Delete">
            </form>
        </td>
    </tr>




    @include('admin.admin_partials.admin_menu_bottom')
@endsection