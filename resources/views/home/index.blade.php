@extends('layouts.admin_layout')

@section('title_page', 'Tableau de bord')

@section('content')
    <div class="card">
      <div class="card-header card-header-primary" style="background:#588157 !important;">
          <h3 class="card-title ">Commandes</h3>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <a href="{{url('/admin/order')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">info_outline</i></a>
                  </div>
                  <p class="card-category">Commandes à traiter</p>
                  <h3 class="card-title">{{$order_status[0]}}</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                  <a href="{{url('/admin/order')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">content_copy</i></a>
                  </div>
                  <p class="card-category">Commandes en attente de container</p>
                  <h3 class="card-title">{{$order_status[1]}}</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <a href="{{url('/admin/order')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">store</i></a>
                  </div>
                  <p class="card-category">Commandes en container</p>
                  <h3 class="card-title">{{$order_status[2]}}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header card-header-primary" style="background: #6b9080 !important;">
          <h3 class="card-title ">Prescriptions</h3>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <a href="{{url('/admin/prescription')}}" style ="text-decoration: none; color:white!important;"><i class="material-icons">info_outline</i></a>
                  </div>
                  <p class="card-category">Prescriptions à prendre en charge</p>
                  <h3 class="card-title">{{$prescription_status[0]}}</h3>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header card-header-primary" style="background: #8fc0a9!important;">
          <h3 class="card-title ">Chiffre d'affaires</h3>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <a href="#" style ="text-decoration: none; color:white!important;"><i class="material-icons">attach_money</i></a>
                  </div>
                  <p class="card-category">Chiffre d'affaires toutes categories</p>
                  <h3 class="card-title">{{$ca[0]}}€</h3>
                </div>
              </div>              
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <a href="#" style ="text-decoration: none; color:white!important;"><i class="material-icons">spa</i></a>
                  </div>
                  <p class="card-category">Chiffre d'affaires parapharmacie</p>
                  <h3 class="card-title">{{$ca[1]}}€</h3>
                </div>
              </div>              
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <a href="#" style ="text-decoration: none; color:white!important;"><i class="material-icons">local_hospital</i></a>
                  </div>
                  <p class="card-category">Chiffre d'affaires pharmacie</p>
                  <h3 class="card-title">{{$ca[2]}}€</h3>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection