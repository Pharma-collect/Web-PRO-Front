@extends('layouts.admin_layout')

@section('title_page', ' Commandes')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes</h3>
        <p class="card-category"> Retrouvez l'ensemble des commandes passées à votre pharmacie.</p>
        <a onClick="$('#new_command_form').submit();" href="#"><form id="new_command_form" method="post" action="{{route('newCommandForm')}}">@csrf<i class="material-icons"  style="color:white !important; float:right; font-size:50px;">add_circle_outline</i></form></a></td>
                 
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction()" placeholder="Rechercher une commande...">
    <br><br>
        <div class="table-responsive">
            <table class="table" >
                <thead class=" text-primary">
                    <th></th>
                    <th>Id</th>
                    <th>Statut</th>
                    <th>Client</th>
                    <th>Montant</th>
                    <th>Preparateur</th>
                    <th>Casier</th>
                    
                </thead>
                <tbody id="orders_table">
                    @foreach($orders as $order)
                        <tr>
                            <td>{{order->id}}</td>
                            <td>{{$order->status}}</td>
                            <td id="client_name"> {{$order->id_client}} </td>
                            <td> {{$order->total_price}} </td>
                            <td> {{$order->id_preparator}} </td>
                            <td> {{$order->id_container}} € </td>
                            <td>
                                <a onClick="$('#update_order_form_{{$order->id}}').submit();" href="#">
                                    <form id="update_order_form_{{$order->id}}" method="post" action="{{route('updateOrderForm')}}">
                                        @csrf
                                        <i class="material-icons">create</i>
                                        <input type="hidden" value="{{$order->id}}" name="update_order_id" id="update_order_id">
                                    </form></a>
                            </td>
                            <td>
                                <a onClick="$('#delete_order_form_{{$order->id}}').submit();" href="#">
                                    <form id="delete_order_form_{{$order->id}}" method="post" action="{{route('dropOrder')}}">
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
    function searchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_input");
    filter = input.value.toUpperCase();
    table = document.getElementById("orders_table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>
@endsection
