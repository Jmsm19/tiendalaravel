@extends('admin.layouts.main')

@section('content')
  <div class="row">
    <div class="col col-md-2 dash-menu">
      <div class="container">
        <h4>Dashboard</h4>
        <br>
        <a class="btn btn-secondary btn-block" href="{{ route('store') }}">
          <i class="fa fa-home" aria-hidden="true"></i> Main site
        </a>
        <a class="btn btn-secondary btn-block" href="{{ url('/admin/product/') }}">
          <i class="fa fa-list" aria-hidden="true"></i> Product list
        </a>
        <a class="btn btn-secondary btn-block" href="{{ url('/admin/product/create') }}">
          <i class="fa fa-plus" aria-hidden="true"></i> Add product
        </a>
      </div>
    </div>
    <div class="col dash-section">
      <div class="container">
        @yield('form')
        @yield('products')
      </div>
    </div>
  </div>
@endsection