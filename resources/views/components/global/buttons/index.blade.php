<button {{ $attributes->merge(['class' => "transition-all delay-50 ease-in-out rounded-lg py-1 px-3 hover:shadow-xl hover:scale-110"]) }}>
    {{ $slot }}
</button>
