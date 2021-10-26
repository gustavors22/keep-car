@php $editing = isset($client) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nome"
            value="{{ old('name', ($editing ? $client->name : '')) }}"
            maxlength="255"
            placeholder="Nome do Cliente"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="E-mail"
            value="{{ old('email', ($editing ? $client->email : '')) }}"
            maxlength="255"
            placeholder="E-mail do Cliente"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="cellphone"
            label="Telefone"
            value="{{ old('cellphone', ($editing ? $client->cellphone : '')) }}"
            maxlength="255"
            placeholder="Telefone do Cliente"
        ></x-inputs.text>
    </x-inputs.group>
</div>
