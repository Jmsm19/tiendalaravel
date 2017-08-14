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
  
  <!-- Modal -->
  <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="mr-auto modal-title">New category</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">       
            {!! Form::open(array('route' => 'category.store', 'class'=> 'form', 'method' => 'post')) !!}      
            <div class="form-group">
              {!! Form::label('categName', 'Name') !!}
              {!! Form::text('categName', null, ['class' => 'form-control']) !!}     
              @if ($errors->has('categName'))
                <span class="form-text text-muted">
                    <strong>{{ $errors->first('categName') }}</strong>
                </span>
              @endif        
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}          
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection