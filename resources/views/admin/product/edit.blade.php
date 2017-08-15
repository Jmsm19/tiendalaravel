@extends('admin.layouts.dashboard')

@section('form')
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <h4>Edit product</h4>

        {!! Form::open(array('route' => ['product.update', $product->id], 'enctype' => 'multipart/form-data', 'class'=> 'form', 'method' => 'put', 'files' => true)) !!}
    
          <div class="form-group">
          {!! Form::label('name', 'Name') !!}
          {!! Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Product name']) !!}
          @if ($errors->has('name'))
              <span class="form-text text-muted">
                    <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          <div class="row">
          <div class="col col-md-8">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
          </div>
          <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-block newCatBtn" data-toggle="modal" data-target="#newCategory">
              <i class="fa fa-plus" aria-hidden="true"></i> New category
            </button>
          </div>
          </div>
          </button>
          @if ($errors->has('category_id'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('category_id') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          {!! Form::label('price', 'Price') !!}
          {!! Form::number('price', $product->price, ['class' => 'form-control', 'step' => "0.01", 'min' => 0]) !!}
          @if ($errors->has('price'))
              <span class="form-text text-muted">
                  <strong>{{ $errors->first('price') }}</strong>
              </span>
          @endif
          </div>

          <div class="form-group">
          {!! Form::label('description', 'Description') !!}
          {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
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