@extends('layouts.admin_layout')

@section('title_page', ' Commande')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Modifier la commande {{$order->id}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateOrder')}}" method="POST">
                        @csrf
                            <input type="hidden" value="{{$order->id}}" name="updated_order_id" id="updated_order_id">
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Statut</label>
                                    <div>
                                    <input type="radio" id="pending" name="status" value="pending"> 
                                        <label for="pending">Pending</label>
                                    </div>
                                    <div>
                                    <input type="radio" id="ready" name="status" value="ready"> 
                                        <label for="ready">Ready</label>
                                    </div>
                                    <div>
                                    <input type="radio" id="container" name="status" value="container"> 
                                        <label for="container">Container</label>
                                    </div>
                                    <div>
                                    <input type="radio" id="finish" name="status" value="finish"> 
                                        <label for="finish">Finish</label>
                                    </div>
                                    
                                </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Preparateur</label>
                                    @foreach($preparators as $preparator)
                                    <div>
                                    <input type="radio" id="{{$preparator->id}}" name="preparator" value="{{$preparator->id}}"> 
                                        <label for="{{$preparator->id}}">{{$preparator->username}}</label>
                                    </div>
                                    @endforeach
                                        
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Casier</label>
                                    <select class="form-control" id="container">
                                    </select>     
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
