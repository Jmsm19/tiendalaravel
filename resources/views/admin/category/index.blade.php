@extends('admin.layouts.dashboard')

@section('categories')
    <div class="row">
      <div class="col col-md-9">
        <h4>Products</h4>
      </div>
    </div>

    <br>

    <div class="table-responsive">
      <table class="table">

        <thead class="thead-inverse">
          <tr>
            <th class="first-col">Name</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody class="table-striped">
        @forelse ($categories as $category)
          <tr>
            <td scope="row first-col">
              {{ $category->name }}
            </td>
            <td>
            {!! Form::open(array('route' => ['category.edit', $category->id ], 'class'=> 'form', 'method' => 'get')) !!}
              {!! Form::button('<i class="fa fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-info'] ) !!}
            {!! Form::close() !!}
            </td>
            <td>
              {!! Form::open(array('route' => ['category.destroy', $category->id ], 'class'=> 'form', 'method' => 'delete')) !!}
                {!! Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger'] ) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @empty
            <tr>
            <td scope="row first-col">
              No data
            </td>
            <td>
          </tr>
        @endforelse
        </tbody>
        
      </table>
    </div>

    {{ $categories->links() }}
@endsection