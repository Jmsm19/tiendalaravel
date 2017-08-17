{!! Form::open(array('route' => 'address.store', 'method' => 'POST', 'class' => 'form')) !!}
  <div class="form-group">
    {!! Form::label('name', 'Full name', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('address1', 'Street address', ['class' => 'form-label']) !!}
    {!! Form::text('address1', null, ['class' => 'form-control', 'placeholder' => 'Street and number, P.O. box, etc.']) !!}
  </div>

  <div class="form-group">
    {!! Form::text('address2', null, ['class' => 'form-control', 'placeholder' => 'Appartment, suite, unit, building, floor, etc.']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('country', 'Country', ['class' => 'form-label']) !!}
    <select name="country" class="form-control">
      @include('pages.inc.countryList')
    </select>
  </div>

  <div class="form-group">
    {!! Form::label('city', 'City', ['class' => 'form-label']) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('state', 'State / Province / Region', ['class' => 'form-label']) !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('zip', 'Zip code', ['class' => 'form-label']) !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('phone', 'Phone number', ['class' => 'form-label']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '(12) 123 1234567']) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
  </div>
{!! Form::close() !!}