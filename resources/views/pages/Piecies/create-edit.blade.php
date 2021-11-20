@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="border-radius: 20px">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/pieces">Peças</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if (isset($piece)) Editar @else Cadastrar @endif Peça</li>
            </ol>
        </nav>
    </div>
    @if (isset($piece))
        {!! Form::model($piece, ['route' => ['pieces.update', $piece->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'pieces.store', 'method' => 'POST']) !!}
    @endif
    <!-- create or edit a piece -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="card-title">@if (isset($piece)) Editar @else Cadastrar @endif Peça</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('name', 'Nome:') !!}
                                {!! Form::text('name', $piece->nome ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('duration', 'Tempo de Duração:') !!}
                                {!! Form::text('duration', $piece->duration ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('duration') }}</span>
                            </div>
                            <!--select vehicle-->
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('vehicle_id', 'Veículo:') !!}
                                {!! Form::select('vehicle_id', $vehicles, isset($piece) ? $piece->vehicle_id : null, ['class' => 'form-control', 'style' => 'border-radius:10px', 
                                'placeholder' => 'Escolha um veículo...']) !!}
                                <span class="text-danger">{{ $errors->first('vehicle_id') }}</span>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:end">
                            {!! Form::submit('salvar', ['class' => 'btn btn-primary', 'style' => 'border-radius:10px']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

    