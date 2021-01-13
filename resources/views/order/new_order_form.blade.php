@extends('layouts.admin_layout')

@section('title_page', ' Commande')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Ajouter une commande</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('newOrder')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Client</label>
                                        <div class="table-responsive">
                                            <table class="table" >
                                                <tbody id="clients-table" style="display: block; border: 1px solid green; height: 150px; overflow-y: scroll">
                                                    @foreach($clients as $client)
                                                    <tr>
                                                        <div>
                                                            <td>
                                                                <input type="radio" id="{{$client->id}}" name="client" value="{{$client->id}}"> 
                                                            </td>
                                                            <td>
                                                                <label for="{{$client->id}}">{{$client->username}}</label>
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        <div>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Produits</label>
                                        <div class="table-responsive">
                                            <table class="table" >
                                                <tbody id="clients-table" style="display: block; border: 1px solid green; height: 150px; overflow-y: scroll">
                                                    @foreach($products as $product)
                                                    <tr>
                                                        <div>
                                                            <td>
                                                                <input type="checkbox" id="{{$product->id}}" name="products" value="{{$product->id}}"> 
                                                            </td>
                                                            <td>
                                                                <label for="{{$product->id}}">{{$product->title}}</label>
                                                            </td>
                                                            <td>
                                                                <label for="{{$product->price}}">{{$product->price}} €</label>
                                                            </td>
                                                            <td>
                                                                <label for="qty">Quantité</label>
                                                                <input type="number" id="qty" name="quantity" min="1" max="50" value="1">
                                                            </td>
                                                        </div>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        <div>    
                                    </div>
                                </div>
                            </div> 
                            
                             
                            <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      @endsection
