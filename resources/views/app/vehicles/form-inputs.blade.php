@php $editing = isset($vehicle) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Veiculo"
            value="{{ old('name', ($editing ? $vehicle->name : '')) }}"
            maxlength="255"
            placeholder="Name do Veiculo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="identifier"
            label="Placa do Veiculo"
            value="{{ old('identifier', ($editing ? $vehicle->identifier : '')) }}"
            maxlength="255"
            placeholder="Placa do Veiculo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Tipo">
            @php $selected = old('type', ($editing ? $vehicle->type : '')) @endphp
            <option value="moto" {{ $selected == 'moto' ? 'selected' : '' }} >Moto</option>
            <option value="carro" {{ $selected == 'carro' ? 'selected' : '' }} >Carro</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="client_id" label="Client" required>
            @php $selected = old('client_id', ($editing ? $vehicle->client_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Client</option>
            @foreach($clients as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
