@extends('layouts.admin_layout')

@section('title_page', ' Commandes')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Commandes</h3>
        <p class="card-category"> Retrouvez l'ensemble des commandes passées sur le shop de votre pharmacie.</p>                 
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
                            <td> {{$order->id_client}} </td>
                            <td> {{$order->total_price}} €</td>
                            <td> {{$order->id_preparator}} </td>
                            <td> {{$order->id_container}} </td>
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
