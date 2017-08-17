@extends('layouts.index')

@section('content')
<main class="container form">
    <div class="row">
        <div class="col col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-block">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col col-md-12 form-control-label">E-Mail Address</label>

                            <div class="col col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col col-md-12 form-control-label">Password</label>

                            <div class="col col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col col-xs-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block login-btn">
                                    Login
                                </button>
                            </div>
                            {{--  <div class="col-xs-12">     
                                <a class="forget-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>  --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
