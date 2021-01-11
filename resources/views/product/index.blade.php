@extends('layouts.admin_layout')

@section('title_page', ' Produits')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title ">Produits</h3>
         <p class="card-category"> Retrouvez ici l'ensemble des produits proposés sur le shop de votre pharmacie.</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th></th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Contenance</th>
                    <th>Prix</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img src={{$product->image_url}} style="width:50px;"></td>
                            <td> {{$product->title}} </td>
                            <td> {{$product->description}} </td>
                            <td> {{$product->capacity}} </td>
                            <td> {{$product->price}} € </td>
                            <td><i class="material-icons">create</i></td>
                            <td><a onClick="$('#delete_form_{{$product->id}}').submit();" href="#"><form id="delete_form_{{$product->id}}" method="post" action="{{route('dropProduct', $product->id)}}">@csrf<i class="material-icons">cancel</i></form></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
