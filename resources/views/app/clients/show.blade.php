@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('clients.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.clientes.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.clientes.inputs.name')</h5>
                    <span>{{ $client->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clientes.inputs.email')</h5>
                    <span>{{ $client->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clientes.inputs.cellphone')</h5>
                    <span>{{ $client->cellphone ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('clients.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Client::class)
                <a href="{{ route('clients.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
