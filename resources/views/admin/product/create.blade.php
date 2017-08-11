@extends('admin.layouts.dashboard')

@section('form')
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <h3>New product</h3>

        {!! Form::open(array('route' => 'product.store', 'enctype' => 'multipart/form-data', 'class'=> 'form', 'method' => 'post', 'files' => true)) !!}
     
          <div class="form-group">
          {!! Form::label('name', 'Name') !!}
          {{--  {!! Form::text('name', 'null', ['class' => 'form-control', 'placeholder' => 'Product name']) !!}  --}}
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product name']) !!}
          
          </div>

          <div class="form-group">
          {!! Form::label('category_id', 'Category') !!}
          {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
          {!! Form::label('price', 'Price') !!}
          {!! Form::number('price', 0, ['class' => 'form-control', 'step' => "0.01", 'min' => 0]) !!}
          </div>

          <div class="form-group">
          {!! Form::label('description', 'Description') !!}
          {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
          {!! Form::label('image', 'Image') !!}          
          {!! Form::file('image', ['class' => 'form-control']) !!}
          </div>

          <div class="row">
            <div class="col col-md-2 offset-md-10">
            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block']) !!}         
            </div>
          </div>
          
        {!! Form::close() !!}
        
      </div>
    </div>
@endsection