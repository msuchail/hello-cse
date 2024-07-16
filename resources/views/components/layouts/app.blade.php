<html lang="fr">
    <head>
        <title>{{isset($title) ? "HelloCSE - $title" : 'HelloCSE'}}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="dark:bg-slate-900 dark:text-gray-100">
    <header>
        <nav class="bg-slate-100 dark:bg-slate-700">
            <div class="container m-auto h-16 flex justify-between items-center">
                <a href="{{ route('profiles.index') }}" class="h-full">
                    <img class="h-full" src="{{ \Illuminate\Support\Facades\Storage::url('logo-hcse.png') }}" alt="">
                </a>
                <a href="/admin" class="h-full px-3 bg-blue-100 hover:bg-indigo-800 hover:text-white text-black flex flex-col items-center">
                    <div class="m-auto">
                        Administration
                    </div>
                </a>
            </div>
        </nav>
    </header>
    <main class="container m-auto">
        <h1 class="mt-12 mb-8">{{ $title ?? 'HelloCSE' }}</h1>
        {{ $slot }}
    </main>
    </body>
</html>
