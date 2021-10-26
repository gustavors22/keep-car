@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nome"
            value="{{ old('name', ($editing ? $user->name : '')) }}"
            maxlength="255"
            placeholder="Nome do Usuario"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="E-mail"
            value="{{ old('email', ($editing ? $user->email : '')) }}"
            maxlength="255"
            placeholder="E-mail do Usuario"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.password
            name="password"
            label="Senha"
            maxlength="255"
            placeholder="Senha"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>
</div>
