@extends('layouts.admin_layout')

@section('title_page', 'Tableau de bord')

@section('content')
    <h3>Tableau de bord</h3>
    <br><br>
        <div class="container-fluid">
          <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <a href="{{url('/admin/order')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">info_outline</i></a>
                  </div>
                  <p class="card-category">Commandes à traiter</p>
                  <h3 class="card-title">{{$pending}}</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <a href="{{url('/admin/order')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">content_copy</i></a>
                  </div>
                  <p class="card-category">Commandes en attente de container</p>
                  <h3 class="card-title">{{$ready}}</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <a href="{{url('/admin/order')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">store</i></a>
                  </div>
                  <p class="card-category">Commandes en container</p>
                  <h3 class="card-title">{{$container}}</h3>
                </div>
            </div>
          </div>
        </div>
@endsection