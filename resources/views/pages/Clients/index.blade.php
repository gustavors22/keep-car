@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="border-radius: 20px">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a>Clientes</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="card-title" style="padding-top: 10px">Clientes</h3>
                        <div class="card-tools">
                            <a href="{{ route('clients.create') }}" class="btn btn-success" title="Adicionar novo Cliente"
                            style="border-radius: 10px">
                                <i class="fas fa-plus-circle"></i>
                                Adicionar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th>Nome</th>
                                    <th class="text-center">Cpf</th>
                                    <th>E-mail</th>
                                    <th class="text-center">Telefone</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="text-center">{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td class="text-center">{{ $client->cpf }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td class="text-center">{{ $client->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info" style="border-radius: 10px">
                                                <i class="fas fa-pencil-alt"></i>
                                                Editar
                                            </a>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="border-radius: 10px">
                                                    <i class="fas fa-trash"></i>
                                                    Deletar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
