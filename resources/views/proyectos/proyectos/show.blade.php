@extends('layouts.header')

@section('title', 'Proyectos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Proyecto: </b>{{ $proyecto->nombre }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/proyectos') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <!-- <a href="{{ url('/proyectos/' . $proyecto->id . '/edit') }}" title="Edit Proyecto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('proyectos' . '/' . $proyecto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Proyecto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>-->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody text-align:center>
                                    <tr><th><img src="/uploads/proyectos/{{$proyecto->picture_url}}" ></th><td align="center"><h1>{{ $proyecto->nombre }}</h1>
                                        {{ $proyecto->descripcion }}
                                    </td></tr>
                                    
                                    <tr><th> Url </th><td align="center"> <a href="">{{ $proyecto->url }}</a> </td></tr>
                                    <tr><th>Propuesta: </th><td align="center"><a href="/uploads/propuestas/{{$proyecto->propuesta}}">{{$proyecto->propuesta}}</a></td></tr>
                                    
                                    

                                    <tr><th> Equipo </th><td align="center"> {{ DB::table('teams')
                                        ->join('proyectos', 'teams.proyectos_id', '=', 'proyectos.id')
                                        ->select('teams.name')
                                        ->where('teams.proyectos_id', '=', $proyecto->id)
                                        ->value('teams.name') }} </td></tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
