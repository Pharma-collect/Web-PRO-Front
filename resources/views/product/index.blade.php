@extends('layouts.admin_layout')

@section('title_page', ' Produits')

@section('content')
 

<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Produits</h3>
         <p class="card-category"> Retrouvez l'ensemble des produits proposés sur le shop de votre pharmacie.</p>      
    </div>
    <div class="card-body">
    <input type="text" id="search_input" class="form-control" onkeyup="searchFunction()" placeholder="Rechercher un produit...">
    <br><br>
        <div class="table-responsive">
            <table class="table" >
                <thead class=" text-primary">
                    <th></th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Contenance</th>
                    <th>Prix</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    
                </thead>
                <tbody id="products_table">
                    @foreach($products as $product)
                        <tr>
                            <td><img src={{$product->image_url}} style="width:50px;"></td>
                            <td id="product_name"> {{$product->title}} </td>
                            <td> {{$product->description}} </td>
                            <td> {{$product->capacity}} </td>
                            <td> {{$product->price}} € </td>
                            <td><a onClick="$('#update_form_{{$product->id}}').submit();" href="#"><form id="update_form_{{$product->id}}" method="post" action="{{route('updateForm', $product->id)}}">@csrf<i class="material-icons">create</i></form></a></td>
                            <td><a onClick="$('#delete_form_{{$product->id}}').submit();" href="#"><form id="delete_form_{{$product->id}}" method="post" action="{{route('dropProduct', $product->id)}}">@csrf<i class="material-icons">cancel</i></form></a></td>
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
    table = document.getElementById("products_table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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