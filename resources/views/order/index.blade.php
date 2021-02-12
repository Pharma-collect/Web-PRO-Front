@extends('layouts.admin_layout')

@section('title_page', ' Commandes')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes à preparer</h3>
        <p class="card-category"> Retrouvez l'ensemble de vos commandes à preparer.</p>
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction('pending_orders_table')" placeholder="Rechercher une commande...">
    <br><br>
        <div class="table-responsive">
            <table class="table sortable" >
                <thead class=" text-primary">
                    <th>Detail</th>
                    <th>Id</th>
                    <th>Client</th>
                    <th>Prix</th>
                    <th>Preparateur</th>
                    <th>Casier</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th>Ordonnance</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody id="pending_orders_table">
                    @foreach($orders as $order)
                        @if($order->status === "pending")
                        <tr>
                            <td>
                                <a onClick="$('#show_details_{{$order->id}}').submit();" href="#">
                                    <form id="show_details_{{$order->id}}" method="post" action="{{route('showDetails')}}">
                                        @csrf
                                        <i class="material-icons">remove_red_eye</i>
                                        <input type="hidden" value="{{$order->id}}" name="show_details_id" id="show_details_id">
                                    </form></a>
                            </td>
                            <td> 
                               {{$order->id}}
                            </td>
                            @php
                                $cli = "Pas de client assigné"
                            @endphp
                            @foreach($clients as $client)
                                @if($client->id === $order->id_client)
                                    @php
                                        $cli = $client->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cli}} </td>
                            <td> {{$order->total_price}} €</td>
                            @php
                                $prep = "Pas de preparateur assigné"
                            @endphp
                            @foreach($preparators as $preparator)
                                @if($preparator->id === $order->id_preparator)
                                    @php
                                        $prep = $preparator->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$prep}} </td>
                            @php
                                $cont = "Pas de casier assigné"
                            @endphp
                            @foreach($containers as $container)
                                @if($container->id === $order->id_container)
                                    @php
                                        $cont = $container->container_number     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cont}} </td>
                            @php
                                $date = $order->creation_date;
                                $parsed_date = date('d-m-Y',strtotime($date));
                            @endphp
                            <td> {{$parsed_date}} </td>
                            <td> {{$order->detail}}</td>
                            
                            @if(empty($order->id_prescription))
                                @php
                                    $ordo = "NON"     
                                @endphp 
                            @else
                                @php
                                    $ordo = "OUI"    
                                @endphp
                            @endif
                            <td> {{$ordo}}</td>
                            <td>
                                <a onClick="$('#update_form_{{$order->id}}').submit();" href="#">
                                    <form id="update_form_{{$order->id}}" method="post" action="{{route('updateForm')}}">
                                        @csrf
                                        <i class="material-icons">create</i>
                                        <input type="hidden" value="{{$order->id}}" name="update_order_id" id="update_order_id">
                                    </form></a>
                            </td>
                            <td>
                                <a onClick="$('#delete_form_{{$order->id}}').submit();" href="#">
                                    <form id="delete_form_{{$order->id}}" method="post" action="{{route('dropOrder')}}">
                                        @csrf
                                        <i class="material-icons">cancel</i>
                                        <input type="hidden" value="{{$order->id}}" name="del_order_id" id="del_order_id">
                                    </form>
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes pretes</h3>
        <p class="card-category"> Retrouvez l'ensemble de vos commandes pretes en attente d'un container.</p>
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction('ready_orders_table)" placeholder="Rechercher une commande...">
    <br><br>
        <div class="table-responsive">
            <table class="table sortable" >
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Client</th>
                    <th>Prix</th>
                    <th>Preparateur</th>
                    <th>Casier</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th>Ordonnance</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody id="ready_orders_table">
                    @foreach($orders as $order)
                        @if($order->status === "ready")
                        <tr>
                            <td> {{$order->id}} </td>
                            @php
                                $cli = "Pas de client assigné"
                            @endphp
                            @foreach($clients as $client)
                                @if($client->id === $order->id_client)
                                    @php
                                        $cli = $client->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cli}} </td>
                            <td> {{$order->total_price}} €</td>
                            @php
                                $prep = "Pas de preparateur assigné"
                            @endphp
                            @foreach($preparators as $preparator)
                                @if($preparator->id === $order->id_preparator)
                                    @php
                                        $prep = $preparator->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$prep}} </td>
                            @php
                                $cont = "Pas de casier assigné"
                            @endphp
                            @foreach($containers as $container)
                                @if($container->id === $order->id_container)
                                    @php
                                        $cont = $container->container_number     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cont}} </td>
                            @php
                                $date = $order->creation_date;
                                $parsed_date = date('d-m-Y',strtotime($date));
                            @endphp
                            <td> {{$parsed_date}} </td>
                            <td> {{$order->detail}}</td>
                            
                            @if(empty($order->id_prescription))
                                @php
                                    $ordo = "NON"     
                                @endphp 
                            @else
                                @php
                                    $ordo = "OUI"    
                                @endphp
                            @endif
                            <td> {{$ordo}}</td>
                            <td>
                                <a onClick="$('#update_form_{{$order->id}}').submit();" href="#">
                                    <form id="update_form_{{$order->id}}" method="post" action="{{route('updateForm')}}">
                                        @csrf
                                        <i class="material-icons">create</i>
                                        <input type="hidden" value="{{$order->id}}" name="update_order_id" id="update_order_id">
                                    </form></a>
                            </td>
                            <td>
                                <a onClick="$('#delete_form_{{$order->id}}').submit();" href="#">
                                    <form id="delete_form_{{$order->id}}" method="post" action="{{route('dropOrder')}}">
                                        @csrf
                                        <i class="material-icons">cancel</i>
                                        <input type="hidden" value="{{$order->id}}" name="del_order_id" id="del_order_id">
                                    </form>
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes à recuperer</h3>
        <p class="card-category"> Retrouvez l'ensemble de vos commandes placées dans vos containers.</p>
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction('container_orders_table)" placeholder="Rechercher une commande...">
    <br><br>
        <div class="table-responsive">
            <table class="table sortable">
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Client</th>
                    <th>Prix</th>
                    <th>Preparateur</th>
                    <th>Casier</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th>Ordonnance</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody id="container_orders_table">
                    @foreach($orders as $order)
                        @if($order->status === "container")
                        <tr>
                            <td> {{$order->id}} </td>
                            @php
                                $cli = "Pas de client assigné"
                            @endphp
                            @foreach($clients as $client)
                                @if($client->id === $order->id_client)
                                    @php
                                        $cli = $client->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cli}} </td>
                            <td> {{$order->total_price}} €</td>
                            @php
                                $prep = "Pas de preparateur assigné"
                            @endphp
                            @foreach($preparators as $preparator)
                                @if($preparator->id === $order->id_preparator)
                                    @php
                                        $prep = $preparator->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$prep}} </td>
                            @php
                                $cont = "Pas de casier assigné"
                            @endphp
                            @foreach($containers as $container)
                                @if($container->id === $order->id_container)
                                    @php
                                        $cont = $container->container_number     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cont}} </td>
                            @php
                                $date = $order->creation_date;
                                $parsed_date = date('d-m-Y',strtotime($date));
                            @endphp
                            <td> {{$parsed_date}} </td>
                            <td> {{$order->detail}}</td>
                            
                            @if(empty($order->id_prescription))
                                @php
                                    $ordo = "NON"     
                                @endphp 
                            @else
                                @php
                                    $ordo = "OUI"    
                                @endphp
                            @endif
                            <td> {{$ordo}}</td>
                            <td>
                                <a onClick="$('#update_form_{{$order->id}}').submit();" href="#">
                                    <form id="update_form_{{$order->id}}" method="post" action="{{route('updateForm')}}">
                                        @csrf
                                        <i class="material-icons">create</i>
                                        <input type="hidden" value="{{$order->id}}" name="update_order_id" id="update_order_id">
                                    </form></a>
                            </td>
                            <td>
                                <a onClick="$('#delete_form_{{$order->id}}').submit();" href="#">
                                    <form id="delete_form_{{$order->id}}" method="post" action="{{route('dropOrder')}}">
                                        @csrf
                                        <i class="material-icons">cancel</i>
                                        <input type="hidden" value="{{$order->id}}" name="del_order_id" id="del_order_id">
                                    </form>
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes terminées</h3>
        <p class="card-category"> Retrouvez l'historique de l'ensemble des commandes passées dasn votre etablissement.</p>
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction('finish_orders_table')" placeholder="Rechercher une commande...">
    <br><br>
        <div class="table-responsive">
            <table class="table sortable">
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Client</th>
                    <th>Prix</th>
                    <th>Preparateur</th>
                    <th>Casier</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th>Ordonnance</th>
                </thead>
                <tbody id="finish_orders_table">
                    @foreach($orders as $order)
                        @if($order->status === "finish")
                        <tr>
                            <td> {{$order->id}} </td>
                            @php
                                $cli = "Pas de client assigné"
                            @endphp
                            @foreach($clients as $client)
                                @if($client->id === $order->id_client)
                                    @php
                                        $cli = $client->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cli}} </td>
                            <td> {{$order->total_price}} €</td>
                            @php
                                $prep = "Pas de preparateur assigné"
                            @endphp
                            @foreach($preparators as $preparator)
                                @if($preparator->id === $order->id_preparator)
                                    @php
                                        $prep = $preparator->username     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$prep}} </td>
                            @php
                                $cont = "Pas de casier assigné"
                            @endphp
                            @foreach($containers as $container)
                                @if($container->id === $order->id_container)
                                    @php
                                        $cont = $container->container_number     
                                    @endphp 
                                @endif 
                            @endforeach
                            <td> {{$cont}} </td>
                            @php
                                $date = $order->creation_date;
                                $parsed_date = date('d-m-Y',strtotime($date));
                            @endphp
                            <td> {{$parsed_date}} </td>
                            <td> {{$order->detail}}</td>
                            
                            @if(empty($order->id_prescription))
                                @php
                                    $ordo = "NON"     
                                @endphp 
                            @else
                                @php
                                    $ordo = "OUI"    
                                @endphp
                            @endif
                            <td> {{$ordo}}</td>
                            
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<script>

    function pop_up_details(id){
    window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no') 
    }


    function searchFunction(id_elem) 
    {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        table = document.getElementById(id_elem);
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) 
        {
            var cpt = 0;

            for(j=0; j< tr[i].getElementsByTagName("td").length; j++)
            {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) 
                {
                    txtValue = td.textContent || td.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) 
                    {
                       cpt= cpt+1;
                    } 
                    
                }  
            }
            if (cpt > 0) 
            {
                tr[i].style.display = "";
            } 
            else 
            {
                tr[i].style.display = "none";
            }    
        }
    }
</script>
@endsection
