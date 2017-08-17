<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modelTitleId">Credit card</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          
          {!! Form::open(array('route' => ['checkout.order', 'id' => 0], 'method' => 'post','class' => 'form')) !!}
          <div class="row">
            <div class="form-group col col-md-12">
              {!! Form::label('cardholder', 'Carholder', ['class' => 'form-label']) !!}
              {!! Form::text('cardholder', Auth::user()->name, ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="row">
            <div class="form-group col col-md-8">
              {!! Form::label('credit', 'Credit Card', ['class' => 'form-label']) !!}
              {!! Form::text('credit', null, ['class' => 'form-control credit-text', 'minlength' => 14, 'required', 'maxlength' => 16]) !!}
            </div>
            <div class="col col-md-4">
              <p class="credit-type"></p>
            </div>
          </div>

          <div class="row">
            <div class="form-group col col-md-6">
              {!! Form::label('expDate', 'Expiration date', ['class' => 'form-label']) !!}              
              {!! Form::date('expDate', null, ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="row">
            <div class="form-group col col-md-3">
              {!! Form::label('cvv', 'CVV', ['class' => 'form-label']) !!}
              {!! Form::text('cvv', null, ['class' => 'form-control', 'minlength' => 3, 'required', 'maxlength' => 3]) !!}
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::submit('Complete purchase', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>