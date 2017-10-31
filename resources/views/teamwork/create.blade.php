@extends('layouts.header')
@section('title', 'Registrar Equipo')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar nuevo equipo</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{route('teams.store')}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre del equipo</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group {{ $errors->has('foto_url') ? 'has-error' : ''}}">
                                <label for="foto_url" class="col-md-4 control-label">{{ 'Logotipo o imágen del equipo' }}</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="foto_url" type="file" id="foto_url" value="{{ old('foto_url') }}" >
                                    {!! $errors->first('foto_url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save"></i>Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
