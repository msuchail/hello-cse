<div class="fixed h-screen backdrop-blur-sm backdrop-brightness-50 top-0 left-0 z-10 flex flex-col items-center">
    <div x-data="modal" class="border p-5 bg-white rounded-xl w-3/4 m-auto">
        <div class="flex flex-col gap-8">
            <div class="flex justify-between">
                <h2>{{ $title }}</h2>
                <button wire:click="closeModal" class="text-red-500 text-bold"><x-heroicon-c-x-mark class="w-10" /></button>
            </div>
            <div class="flex gap-8">
                <img class="h-96 rounded-xl" src="{{ \Illuminate\Support\Facades\Storage::url($image) }}" alt="">
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
