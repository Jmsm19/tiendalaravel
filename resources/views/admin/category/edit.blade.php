@extends('admin.layouts.dashboard')

@section('form')
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <h4>Edit category</h4>

        {!! Form::open(array('route' => ['category.update', $category->id], 'class'=> 'form', 'method' => 'put')) !!}      
        <div class="form-group">
          {!! Form::label('categName', 'Name') !!}
          {!! Form::text('categName', $category->name, ['class' => 'form-control']) !!}     
          @if ($errors->has('categName'))
            <span class="form-text text-muted">
                <strong>{{ $errors->first('categName') }}</strong>
            </span>
          @endif        
        </div>
        <a class="btn btn-secondary" href="{{ url('/admin/category') }}" role="button">Back</a>
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}          
        {!! Form::close() !!}
        
      </div>
    </div>
@endsection