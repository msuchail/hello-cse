<div {{ $attributes->merge(['class' => "rounded-xl shadow-xl p-4 dark:bg-slate-700"]) }}>
    @isset($title)
        <h2>{{ $title }}</h2>
    @endisset
    {{ $slot }}
</div>
