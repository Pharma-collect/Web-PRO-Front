@extends('layouts.admin_layout')

@section('title_page', ' Produits')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Ajouter un produit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('newProduct')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nom</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Quantité (en ml)</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Prix (en €)</label>
                                    <input type="text" id="price" name="price" class="form-control">
                                </div>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Description</label>
                                    <input type="text" id="description" name="description" class="form-control">
                                </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Image</label>
                                    <input type="text" id="image_url" name="image_url" class="form-control">
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
