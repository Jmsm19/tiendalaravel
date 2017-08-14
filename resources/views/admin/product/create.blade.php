@extends('admin.layouts.dashboard')

@section('form')
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <h4>New product</h4>

        {!! Form::open(array('route' => 'product.store', 'enctype' => 'multipart/form-data', 'class'=> 'form', 'method' => 'post', 'files' => true)) !!}
     
          <div class="form-group">
          {!! Form::label('name', 'Name') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product name']) !!}
          @if ($errors->has('name'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          {!! Form::label('category_id', 'Category') !!}
          {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
          @if ($errors->has('category_id'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('category_id') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          {!! Form::label('price', 'Price') !!}
          {!! Form::number('price', 0, ['class' => 'form-control', 'step' => "0.01", 'min' => 0]) !!}
          @if ($errors->has('price'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          {!! Form::label('description', 'Description') !!}
          {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
          @if ($errors->has('description'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          {!! Form::label('image', 'Image') !!}          
          {!! Form::file('image', ['class' => 'form-control']) !!}
          <p>Image must be 300 Kb or lower.</p>
          @if ($errors->has('image'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('image') }}</strong>
              </span>
          @endif
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