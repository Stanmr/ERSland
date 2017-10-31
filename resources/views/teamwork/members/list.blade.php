@extends('layouts.header')
@section('title', 'Miembros')
@section('content')

    <div class="container">

        <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                
                <div class="panel panel-default">

                    <div class="panel-heading clearfix">
                        Miembros del equipo "{{$team->name}}"
                        <img src="/uploads/equipos/{{$team->foto_url}}">
                        <a href="{{route('teams.index')}}" class="btn btn-sm btn-default pull-right">
                            <i class="fa fa-arrow-left"></i> Atrás
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            @foreach($team->users AS $user)
                                <tr>
                                    <td>{{$user->nombres}} {{$user->apellidos}}</td>
                                    <td>
                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            @if(auth()->user()->getKey() !== $user->getKey())
                                                <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Eliminar</button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">Invitaciones pendientes</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>E-Mail</th>
                                <th>Opción</th>
                            </tr>
                            </thead>
                            @foreach($team->invites AS $invite)
                                <tr>
                                    <td>{{$invite->email}}</td>
                                    <td>
                                        <a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-sm btn-default">
                                            <i class="fa fa-envelope-o"></i> Reenviar Invitación
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading clearfix">Invitar al equipo "{{$team->name}}"</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Dirección de Email</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-envelope-o"></i>Enviar invitación
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
