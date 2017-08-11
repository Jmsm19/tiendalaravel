@extends('admin.layouts.dashboard')

@section('form')
    <div class="row">
      <div class="col col-md-6 offset-md-3 ">
        <h3>New product</h3>

        {!! Form::open(array('route' => 'store', 'method' => 'post')) !!}
     
          <div class="form-group">
          {!! Form::label('name', 'Name') !!}
          {!! Form::text('Name', '', ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
          {!! Form::label('category', 'Category') !!}
          {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
          {!! Form::label('price', 'Price') !!}
          {!! Form::number('price', 0, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
          {!! Form::label('image', 'Image') !!}          
          {!! Form::file('image') !!}
          </div>
          
          {!! Form::submit('Submit', ['class' => 'btn btn-primary offset-md-10']) !!}         
          
        {!! Form::close() !!}
        
      </div>
    </div>
@endsection