@extends('layouts.admin_layout')

@section('title_page', ' Produits')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Modifier le produit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateProduct')}}" method="POST">
                        @csrf
                            <input type="hidden" value="{{$product->id}}" name="updated_product_id" id="updated_product_id">
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nom</label>
                                    <input type="text" id="name" value='{{$product->title}}' name="name" class="form-control">
                                </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Quantité</label>
                                    <input type="text" id="quantity" value="{{$product->capacity}}" name="quantity" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Prix</label>
                                    <input type="text" id="price" value="{{$product->price}}" name="price" class="form-control">
                                </div>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Description</label>
                                    <input type="text" id="description" value="{{$product->description}}" name="description" class="form-control">
                                </div>
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection
