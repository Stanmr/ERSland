@extends('layouts.registrar_estilo')

@section('title')

@section('content')
<div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">

            <label for="nombres" class="col-md-4 control-label">Nombres</label>


                <input id="nombres" type="text" class="form-control" name="nombres" placeholder="Nombres" value="{{ old('nombres') }}" required autofocus>

                @if ($errors->has('nombres'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombres') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

            
                <input id="apellidos" type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}" required autofocus>

                @if ($errors->has('apellidos'))
                    <span class="help-block">
                        <strong>{{ $errors->first('apellidos') }}</strong>
                    </span>
                @endif
            
        </div>


        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
            <label for="telefono" class="col-md-4 control-label">Teléfono</label>

            
                <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" required autofocus>

                @if ($errors->has('telefono'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                @endif
            
        </div>



        Identificación Oficial (escaneada o foto)
        <div class="form-group{{ $errors->has('foto_id') ? ' has-error' : '' }}">
            <label for="foto_id" class="col-md-4 control-label">Identificación Oficial</label>

            
                <input id="foto_id" type="file" class="form-control" name="foto_id" placeholder="Identificación Oficial" value="{{ old('foto_id') }}" required>

                @if ($errors->has('foto_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('foto_id') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Dirección de Correo</label>

            
                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>

            
                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir Contraseña" required>
        </div>


        <!--<span class="login-checkbox">

            <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />

            <label class="choice" for="Field">He leido y acepto los términos de uso de la plataforma ERS.</label>

        </span>

        -->

        <div class="form-group">
            
                <button type="submit" class="login-action btn btn-primary">
                    Registrar
                </button>
            
        </div>
    </form>
</div>
@endsection
