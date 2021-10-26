@php $editing = isset($piece) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nome"
            value="{{ old('name', ($editing ? $piece->name : '')) }}"
            maxlength="255"
            placeholder="Nome da Peça"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="quantity"
            label="Quantidade"
            value="{{ old('quantity', ($editing ? $piece->quantity : '')) }}"
            max="255"
            placeholder="Quantidade"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
