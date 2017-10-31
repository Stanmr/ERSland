@extends('layouts.header')

@section('title', 'Proyectos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Proyectos</div>
                    <div class="panel-body">
                        

                        <form method="GET" action="{{ url('/proyectos') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Descripcion</th><th>Url</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->descripcion }}</td><td><a href="{{ $item->url }}">{{ $item->url }}</a></td><td><img src="/uploads/proyectos/{{$item->picture_url}}" style="height:100px;"></td>
                                        <td>
                                            <a href="{{ url('/proyectos/' . $item->id) }}" title="Ver Proyecto"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $proyectos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
