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
      </div>
      <br>
      <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="section1HeaderId">
            <h5 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordianId" href="#productSection" aria-expanded="true" aria-controls="section1ContentId">
                Products
              </a>
            </h5>
          </div>
          <div id="productSection" class="collapse in show" role="tabpanel" aria-labelledby="productSection">
            <div class="card-block">
              <a class="btn btn-secondary btn-block" href="{{ url('/admin/product/') }}">
                <i class="fa fa-list" aria-hidden="true"></i> Product list
              </a>
              <a class="btn btn-secondary btn-block" href="{{ url('/admin/product/create') }}">
                <i class="fa fa-plus" aria-hidden="true"></i> Add product
              </a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="section2HeaderId">
            <h5 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordianId" href="#categoriesSection" aria-expanded="true" aria-controls="categoriesSection">
                Categories
              </a>
            </h5>
          </div>
          <div id="categoriesSection" class="collapse in" role="tabpanel" aria-labelledby="Categories">
            <div class="card-block">
              <a class="btn btn-secondary btn-block" href="{{ url('/admin/category/') }}">
                <i class="fa fa-list" aria-hidden="true"></i> Category list
              </a>
              <a class="btn btn-secondary btn-block newCatBtn" data-toggle="modal" data-target="#newCategory">
                <i class="fa fa-plus" aria-hidden="true"></i> Add category
              </a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" role="tab" id="section2HeaderId">
            <h5 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordianId" href="#ordersSection" aria-expanded="true" aria-controls="section2ContentId">
                Orders
              </a>
            </h5>
          </div>
          <div id="ordersSection" class="collapse in" role="tabpanel" aria-labelledby="ordersSection">
            <div class="card-block">
              <a class="btn btn-secondary btn-block" href="{{ url('/admin/order') }}">
                <i class="fa fa-list" aria-hidden="true"></i> Order list
              </a>
              <a class="btn btn-secondary btn-block" href="{{ url('/admin/order/delivered') }}">
                <i class="fa fa-list" aria-hidden="true"></i> Delivered
              </a>
              <a class="btn btn-secondary btn-block" href="{{ url('/admin/order/pending') }}">
                <i class="fa fa-list" aria-hidden="true"></i> Not delivered
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col dash-section">
      <div class="container">
        @yield('form')
        @yield('products')
        @yield('categories')
        @yield('orders')
      </div>
    </div>
  </div>
  
  @include('admin.category.create')
  
@endsection