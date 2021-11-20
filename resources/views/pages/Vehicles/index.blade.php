@extends('adminlte::page')

@section('Tittle', 'Veículos')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="border-radius: 20px">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a>Veículos</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3 class="card-title" style="padding-top: 10px">Veículos</h3>
                        <div class="card-tools">
                            <a href="{{ route('vehicles.create') }}" class="btn btn-success" title="Adicionar novo veículo"
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
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Cor</th>
                                    <th class="text-center">Ano</th>
                                    <th class="text-center">Placa</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        <td class="text-center">{{ $vehicle->id }}</td>
                                        <td class="text-center">{{ $vehicle->model }}</td>
                                        <td class="text-center">{{ $vehicle->brand }}</td>
                                        <td class="text-center">{{ $vehicle->color }}</td>
                                        <td class="text-center">{{ $vehicle->year }}</td>
                                        <td class="text-center">{{ $vehicle->vehicle_plate }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-info"
                                                style="border-radius: 10px">
                                                <i class="fas fa-edit"></i>
                                                Editar
                                            </a>
                                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="border-radius: 10px">
                                                    <i class="fas fa-trash-alt"></i>
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
