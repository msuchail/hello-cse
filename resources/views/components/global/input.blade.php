<div>
    <div class="flex flex-col">
        @error($name)<span class="text-red-500 self-end">{{ __($message) }}</span> @enderror
        <label for="{{ $name }}" class="text-sm mb-2">{{ $label ?? $placeholder }}</label>
    </div>
    <x-input {{ $attributes }} class="py-1 px-2 dark:bg-slate-900 border dark:border-white rounded w-full rounded-xl" placeholder="{{ $placeholder }}" name="{{ $name }}"></x-input>
</div>
