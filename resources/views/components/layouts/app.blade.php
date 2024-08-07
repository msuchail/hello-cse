<html lang="fr" x-data="layout" :class="darkMode ? 'dark' : ''">
    <head>
        <title>{{isset($title) ? "Profile Manager - $title" : 'Profile Manager'}}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="dark:bg-slate-900 dark:text-gray-100">
        <header>
            <nav class="bg-slate-100 dark:bg-slate-700">
                <div class="container m-auto h-16 flex justify-between items-center">
                    <a wire:navigate.hover href="{{ route('profiles.index') }}" class="h-full text-4xl text-teal-300 flex flex-col items-center">
                        <div class="m-auto">
                            Profile Manager
                        </div>
                    </a>
                    <div class="h-full flex">
                        @auth()
                            <ul class="flex">
                                <li>
                                    <x-navigation-item wire:navigate.hover href="/admin">
                                        Administration
                                    </x-navigation-item>
                                </li>
                                <li>
                                    <x-navigation-item wire:navigate.hover href="{{ route('get-token') }}">
                                        Token API
                                    </x-navigation-item>
                                </li>
                                <li>
                                    <x-navigation-item wire:navigate.hover href="{{ route('logout') }}">
                                        Se déconnecter
                                    </x-navigation-item>
                                </li>
                            </ul>
                        @else
                            <ul>
                                <li>
                                    <x-navigation-item wire:navigate.hover href="{{ route('login') }}">
                                        Se connecter
                                    </x-navigation-item>
                                </li>
                            </ul>
                        @endauth
                        <label class="inline-flex items-center me-5 cursor-pointer" @cick.once="toggle">
                            <input type="checkbox" value="" class="sr-only peer" x-model="darkMode">
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300 h-full flex flex-col justify-center"><x-heroicon-c-sun class="mr-5 h-1/4 self-center"/></span>
                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300 h-full flex flex-col justify-center"><x-heroicon-c-moon class="ml-2 h-1/4 self-center"/></span>
                        </label>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container m-auto">
            <h1 class="mt-12 mb-8">{{ $title ?? 'Profile Manager' }}</h1>
            {{ $slot }}
        </main>
    </body>
</html>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('layout', () => ({
            darkMode: false,
            init() {
                // On page load or when changing themes, best to add inline in `head` to avoid FOUC
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    this.darkMode = true
                } else {
                    this.darkMode = false
                }
                this.$watch('darkMode', value => {
                    localStorage.theme = value ? 'dark' : 'light'
                })
            },
        }))
    })
</script>
