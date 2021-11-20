@extends('adminlte::page')

@section('Tittle', 'Peças')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="border-radius: 20px">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a>Peças</a></li>
            </ol>
        </nav>
    </div>
    <!-- pieces table -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="card-title">Peças</h3>
                        <div class="card-tools">
                            <a href="{{ route('pieces.create') }}" class="btn btn-success" style="border-radius: 10px">
                                <i class="fas fa-plus-circle"></i>
                                Adicionar
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Data de troca</th>
                                    <th class="text-center">Veículo</th>
                                    <th class="text-center">Proprietário</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pieces as $piece)
                                    <tr>
                                        <td class="text-center">{{ $piece->id }}</td>
                                        <td class="text-center">{{ $piece->name }}</td>
                                        <td class="text-center">{{ $piece->status}}</td>
                                        <td class="text-center">{{ $piece->should_change }}</td>
                                        <td class="text-center">{{$piece->vehicle->model}}</td>
                                        <td class="text-center">{{$piece->vehicle->client->name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('pieces.edit', $piece->id) }}" class="btn btn-info" style="border-radius: 10px">
                                                <i class="fas fa-edit"></i>
                                                Editar
                                            </a>
                                            <form action="{{ route('pieces.destroy', $piece->id) }}" method="POST" style="display: inline-block;">
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection