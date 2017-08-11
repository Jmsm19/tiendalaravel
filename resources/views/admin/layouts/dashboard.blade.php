@extends('admin.layouts.main')

@section('content')
  <div class="row">
    <div class="col col-md-2 dash-menu">
      <div class="container">
        <h3>Dashboard</h3>
        <br>
        <a class="btn btn-success btn-block" href="{{ url('/admin/product/create') }}">
          <i class="fa fa-plus" aria-hidden="true"></i> Add product
        </a>
      </div>
    </div>
    <div class="col dash-section">
      <div class="container">
        @yield('form')
      </div>
    </div>
  </div>
@endsection