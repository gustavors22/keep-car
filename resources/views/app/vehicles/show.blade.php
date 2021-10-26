@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('vehicles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.veiculos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.veiculos.inputs.name')</h5>
                    <span>{{ $vehicle->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.veiculos.inputs.identifier')</h5>
                    <span>{{ $vehicle->identifier ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.veiculos.inputs.type')</h5>
                    <span>{{ $vehicle->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.veiculos.inputs.client_id')</h5>
                    <span>{{ optional($vehicle->client)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('vehicles.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Vehicle::class)
                <a href="{{ route('vehicles.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
