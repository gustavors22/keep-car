@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="border-radius: 20px">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/jobs">Serviços</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if (isset($job)) Editar @else Cadastrar @endif Serviço</li>
            </ol>
        </nav>
    </div>
    @if (isset($job))
        {!! Form::model($job, ['route' => ['jobs.update', $job->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'jobs.store', 'method' => 'POST']) !!}
    @endif
    <!-- create or edit a job -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="card-title">@if (isset($job)) Editar @else Cadastrar @endif Peça</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                {!! Form::label('title', 'Serviço:') !!}
                                {!! Form::text('title', $job->title ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('start_date', 'Data de início:') !!}
                                {!! Form::date('start_date', $job->start_date ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('end_date', 'Data de término:') !!}
                                {!! Form::date('end_date', $job->end_date ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                            </div>
                            <!--cliente-->
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('client_id', 'Cliente:') !!}
                                {!! Form::select('client_id', $clients, isset($job) ? $job->client_id : null, ['class' => 'form-control', 'style' => 'border-radius:10px', 
                                'placeholder' => 'Escolha um cliente...']) !!}
                                <span class="text-danger">{{ $errors->first('client_id') }}</span>
                            </div>
                            <!--veículo-->
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('vehicle_id', 'Veículo:') !!}
                                {!! Form::select('vehicle_id', $vehicles, isset($job) ? $job->vehicle_id : null, ['class' => 'form-control', 'style' => 'border-radius:10px', 
                                'placeholder' => 'Escolha um veículo...']) !!}
                                <span class="text-danger">{{ $errors->first('vehicle_id') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('price', 'Preço do Serviço:') !!}
                                {!! Form::number('price', $job->price ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px', 'min' => '0']) !!}
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('status', 'Status:') !!}
                                {!! Form::select('status', ['Aberto' => 'Aberto', 'Concluido' => 'Concluido', 'Em adamento' => 'Andamento'], $job->status ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px']) !!}
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>
                            
                            <div class="form-group col-sm-12 col-md-12">
                                {!! Form::label('description', 'Descrição:') !!}
                                {!! Form::textarea('description', $job->description ?? null, ['class' => 'form-control', 'style' => 'border-radius:10px',
                                'cols' => 3, 'rows' => 3]) !!}
                                <span class="text-danger">{{ $errors->first('description') }}</span>
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

    