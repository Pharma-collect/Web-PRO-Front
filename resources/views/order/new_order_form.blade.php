@extends('layouts.admin_layout')

@section('title_page', ' Produits')

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
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Detail</label>
                                    <input type="text" id="detail" name="detail" class="form-control">
                                </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Client</label>
                                    <input type="text" id="id_client" name="id_client" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Prix (en €)</label>
                                    <input type="text" id="total_price" name="total_price" class="form-control">
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
