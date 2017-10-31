@extends('layouts.login_estilo')

@section('content')



<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            
                <input id="email" type="email" class="form-control input-lg username-field" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
           
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            
                <input id="password" type="password" class="form-control input-lg password-field" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            
        </div>

        <button type="submit" class="btn btn-primary">
            Entrar
        </button>

        

        <a class="btn btn-link" href="{{ route('password.request') }}">
            ¿Olvidaste tu contraseña?
        </a>

        <div class="login-checkbox">
            <label><input type="checkbox" name="remember" class="field login-checkbox" {{ old('remember') ? 'checked' : '' }}> Recuérdame</label>
        </div>

    </form>
</div>
@endsection
