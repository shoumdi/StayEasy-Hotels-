@props([
'name',
'label' => null,
'type' => 'text',
'value' => '',
'placeholder' => ''
])

<div class="flex flex-col">
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    @if($label)
    <label for="{{ $name }}" class="text-sm font-md text-gray-700">
        {{ $label }}
    </label>
    @endif
    <div class="mt-1">
        @if($type !== 'text-aria')

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm' . ($errors->has($name) ? ' border-red-500' : '')]) }}>
        @else
        <textarea :name="$name" :placeholder="$placeholder">{{$value}}</textarea>
        @endif
    </div>

    @error($name)
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>