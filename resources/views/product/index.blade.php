@extends('layouts.admin_layout')

@section('title_page', ' Produits')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Produits</h3>
        <p class="card-category"> Retrouvez l'ensemble des produits proposés sur le shop de votre pharmacie.</p>
        <a onClick="$('#new_product_form').submit();" href="#"><form id="new_product_form" method="post" action="{{route('newProductForm')}}">@csrf<i class="material-icons"  style="color:white !important; float:right; font-size:50px;">add_circle_outline</i></form></a></td>
                 
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
                    <th>Contenance (ml)</th>
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
                            <td>
                                <a onClick="$('#update_form_{{$product->id}}').submit();" href="#">
                                    <form id="update_form_{{$product->id}}" method="post" action="{{route('updateForm')}}">
                                        @csrf
                                        <i class="material-icons">create</i>
                                        <input type="hidden" value="{{$product->id}}" name="update_product_id" id="update_product_id">
                                    </form></a>
                            </td>
                            <td>
                                <a onClick="$('#delete_form_{{$product->id}}').submit();" href="#">
                                    <form id="delete_form_{{$product->id}}" method="post" action="{{route('dropProduct')}}">
                                        @csrf
                                        <i class="material-icons">cancel</i>
                                        <input type="hidden" value="{{$product->id}}" name="del_product_id" id="del_product_id">
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
