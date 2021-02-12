@extends('layouts.admin_layout')

@section('title_page', ' Detail de la commande')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Detail de la commande {{$order->id}}</h4>
                        <p class="card-category"> Retrouvez l'ensemble des produits de la commande.</p>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table" >
                            <thead class="text-primary">
                                <th></th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                            </thead>
                            <tbody id="products_table">
                            @foreach($details as $detail)
                            <tr>
                                @foreach($products as $product)
                                    @if($detail->id_product === $product->id)
                                        <td><img src={{$product->image_url}} style="width:50px;"></td>
                                        <td> {{$product->title}} </td>
                                    @endif
                                @endforeach
                                <td> {{$detail->quantity}} </td>
                                @foreach($products as $product)
                                    @if($detail->id_product === $product->id)
                                        <td> {{number_format($product->price * $detail->quantity, 2)}}  €</td>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="card-header card-header-primary">
                        <h4 class="card-title">Prix total : {{$order->total_price}} €</h4>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection
