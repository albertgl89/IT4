<button {{ $attributes->merge(['type' => 'submit', 'class' => 'green-pill-btn inline-flex items-center px-4 py-2 uppercase tracking-widest disabled:opacity-25 w-fit mx-0']) }}>
    {{ $slot }}
</button>
