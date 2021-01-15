@extends('layouts.admin_layout')

@section('title_page', ' Commandes')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes</h3>
        <p class="card-category"> Retrouvez l'ensemble des commandes passées sur le shop de votre pharmacie.</p>
        <a onClick="$('#new_order_form').submit();" href="#"><form id="new_order_form" method="post" action="{{route('newOrderForm')}}">@csrf<i class="material-icons"  style="color:white !important; float:right; font-size:50px;">add_circle_outline</i></form></a></td>                 
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction()" placeholder="Rechercher une commande...">
    <br><br>
        <div class="table-responsive">
            <table class="table" >
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Statut</th>
                    <th>Client</th>
                    <th>Prix</th>
                    <th>Preparateur</th>
                    <th>Casier</th>
                    <th>Date</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody id="orders_table">
                    @foreach($orders as $order)
                        <tr>
                            <td> {{$order->id}} </td>
                            <td> {{$order->status}} </td>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function searchFunction() 
    {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("orders_table");
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
