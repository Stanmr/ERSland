@extends('layouts.header')

@section('title', 'Inicio')

@section('content')
    <div class="container">
        <div class="row">
         

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Proyecto #{{ $proyecto->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/proyectos') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/proyectos/' . $proyecto->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('proyectos.proyectos.form', ['submitButtonText' => 'Update'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
