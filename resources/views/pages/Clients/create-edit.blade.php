@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/clients">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(isset($client)) Editar @else Cadastrar @endif Cliente</li>
            </ol>
        </nav>
    </div>
    @if (isset($client))
        {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@if(isset($client)) Editar @else Cadastrar @endif Cliente</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                {!! Form::label('name', 'Nome:') !!}
                                {!! Form::text('name', $client['name'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('cpf', 'CPF:') !!}
                                {!! Form::text('cpf', $client['cpf'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('cpf') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('profession', 'Profissão:') !!}
                                {!! Form::text('profession', $client['profession'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('profession') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('marital_status', 'Estado civil:') !!}
                                {!! Form::select('marital_status', ['Solteiro' => 'Solteiro', 'Casado' => 'Casado', 'Viúvo' => 'Viúvo', 'Divorciado' => 'Divorciado'], $client['marital_status'] ?? [], ['class' => 'form-control', 'placeholder' => '- Selecione uma Opção...']) !!}
                                <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('email', 'E-mail:') !!}
                                {!! Form::email('email', $client['email'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('phone', 'Telefone:') !!}
                                {!! Form::text('phone', $client['phone'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('address', 'Endereço:') !!}
                                {!! Form::text('address', $client['address'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                {!! Form::label('neighborhood', 'Bairro:') !!}
                                {!! Form::text('neighborhood', $client['neighborhood'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('neighborhood') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                {!! Form::label('address_number', 'Número:') !!}
                                {!! Form::text('address_number', $client['address_number'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('address_number') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('complement', 'Complemento:') !!}
                                {!! Form::text('complement', $client['complement'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('complement') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                {!! Form::label('city', 'Cidade:') !!}
                                {!! Form::text('city', $client['city'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                {!! Form::label('state', 'Estado:') !!}
                                {!! Form::text('state', $client['state'] ?? null, ['class' => 'form-control', 'maxLength' => 2, 'style'=>'text-transform:uppercase']) !!}
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('country', 'País:') !!}
                                {!! Form::text('country', $client['country'] ?? null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:end">
                            {!! Form::submit('salvar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
