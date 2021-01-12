@extends('layouts.admin_layout')

@section('title_page', ' Produits')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Modifier la commande</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateOrder')}}" method="POST">
                        @csrf
                            <input type="hidden" value="{{$order->id}}" name="updated_order_id" id="updated_order_id">
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Status</label>
                                    <input type="text" id="status" value='{{$order->status}}' name="status" class="form-control">
                                </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Preparateur</label>
                                    <input type="text" id="id_preparator" value="{{$order->id_preparator}}" name="id_preparator" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Casier</label>
                                    <input type="text" id="id_container" value="{{$order->id_container}}" name="id_container" class="form-control">
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
