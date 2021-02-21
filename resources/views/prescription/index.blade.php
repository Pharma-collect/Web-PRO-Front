@extends('layouts.admin_layout')

@section('title_page', 'Prescriptions')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Prescriptions à prendre en charge</h3>
        <p class="card-category"> Retrouvez l'ensemble des prescriptions adressées à votre pharmacie.</p>
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction()" placeholder="Rechercher une prescription...">
    <br><br>
        <div class="table-responsive">
            <table class="table" >
                <thead class=" text-primary">
                    <th>Prendre en charge</th>
                    <th>Id</th>
                    <th>Statut</th>
                    <th>Client</th>
                    <th>Commentaires</th>
                    <th>Date</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody id="prescriptions_table">
                    @foreach($prescriptions as $prescription)
                    @if(empty($prescription->id_preparator))                               
                    <tr>
                        <td>
                            <a onClick="$('#new_order_form_{{$prescription->id}}').submit();" href="#">
                                <form id="new_order_form_{{$prescription->id}}" method="post" action="{{route('newOrderForm')}}">
                                    @csrf
                                    <i class="material-icons">done_outline</i>
                                    <input type="hidden" value="{{$prescription->id}}" name="prescription_id" id="prescription_id">
                                </form>
                            </a>
                        </td>
                        <td> {{$prescription->id}} </td>
                        <td> A prendre en charge </td>
                        @php
                        $cli = 'Pas de client assigné'
                        @endphp
                        @foreach($clients as $client)
                            @if($client->id === $prescription->id_client)
                                @php
                                    $cli = $client->username     
                                @endphp 
                            @endif 
                        @endforeach
                        <td> {{$cli}} </td>
                        <td> {{$prescription->detail}}</td>
                        @php
                            $date = $prescription->creation_date;
                            $parsed_date = date('d-m-Y',strtotime($date));
                        @endphp
                        <td> {{$parsed_date}} </td>
                        <td>
                            <a onClick="" href="#">
                                <form id="" method="post" action="">
                                    @csrf
                                    <i class="material-icons">create</i>
                                    <input type="hidden" value="" name="" id="">
                                </form></a>
                        </td>
                        <td>
                            <a onClick="" href="#">
                                <form id="" method="post" action="">
                                    @csrf
                                    <i class="material-icons">cancel</i>
                                    <input type="hidden" value="" name="" id="">
                                </form></a>
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
        <h3 class="card-title ">Historique des prescriptions</h3>
        <p class="card-category"> Retrouvez l'historique de l'ensemble des prescriptions addressées à votre pharmacie.</p>
    </div>
    <div class="card-body">
    <input type="text" id="search_input_2" class="form-control" onkeyup="searchFunction2()" placeholder="Rechercher une prescription...">
    <br><br>
        <div class="table-responsive">
            <table class="table" >
                <thead class=" text-primary">
                    <th>Id</th>
                    <th>Statut</th>
                    <th>Client</th>
                    <th>Commentaires</th>
                    <th>Date</th>
                </thead>
                <tbody id="old_prescriptions_table">
                    @foreach($prescriptions as $prescription)
                    @if(!empty($prescription->id_preparator))                              
                    <tr>
                        <td> {{$prescription->id}} </td>
                        <td> {{$prescription->status}} </td>
                        @foreach($clients as $client)
                            @if($client->id === $prescription->id_client)
                                @php
                                    $cli = $client->username     
                                @endphp 
                            @endif 
                        @endforeach
                        <td> {{$cli}} </td>
                        <td> {{$prescription->detail}}</td>
                        @php
                            $date = $prescription->creation_date;
                            $parsed_date = date('d-m-Y',strtotime($date));
                        @endphp
                        <td> {{$parsed_date}} </td>
                    </tr>
                    @endif
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
        table = document.getElementById("prescriptions_table");
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
    function searchFunction2() 
    {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search_input_2");
        filter = input.value.toUpperCase();
        table = document.getElementById("old_prescriptions_table");
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
