@props(['value'])

<label {{ $attributes->merge(['class' => 'std-form-label font-heebo']) }}>
    {{ $value ?? $slot }}
</label>
