@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="border-radius: 20px">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/vehicles">Veículos</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if (isset($vehicle)) Editar @else Cadastrar @endif Veículo</li>
            </ol>
        </nav>
    </div>
    @if (isset($vehicle))
        {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'vehicles.store', 'method' => 'POST']) !!}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="card-title">@if (isset($vehicle)) Editar @else Cadastrar @endif Veículo</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('model', 'Modelo:') !!}
                                {!! Form::text('model', $vehicle->model ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('model') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('brand', 'Marca:') !!}
                                {!! Form::text('brand', $vehicle->brand ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('brand') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('year', 'Ano:') !!}
                                {!! Form::number('year', $vehicle->year ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px', 'placeholder' => 'Ano do Carro']) !!}
                                <span class="text-danger">{{ $errors->first('year') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('vehicle_plate', 'Placa:') !!}
                                {!! Form::text('vehicle_plate', $vehicle->vehicle_plate ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px', 'placeholder' => '#######']) !!}
                                <span class="text-danger">{{ $errors->first('vehicle_plate') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('color', 'Cor:') !!}
                                {!! Form::select('color', ['Vermelho' => 'Vermelho', 'Verde' => 'Verde', 'Prata' => 'Prata', 'Preto' => 'Preto', 'Branco' => 'Branco', 'Azul' => 'Azul'], isset($vehicle) ? $vehicle->color : null, ['class' => 'form-control', 'style' => 'border-radius:10px', 'placeholder' => '-Selecione uma Cor...']) !!}
                                <span class="text-danger">{{ $errors->first('color') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('client_id', 'Cliente:') !!}
                                {!! Form::select('client_id', $clients, isset($vehicle) ? $vehicle->client_id : null, ['class' => 'form-control', 'style' => 'border-radius:10px', 'placeholder' => '-Selecione um Cliente...']) !!}
                                <span class="text-danger">{{ $errors->first('client_id') }}</span>
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
