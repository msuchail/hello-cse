<div>
    <div class="flex flex-col">
        @error($name)<span class="text-red-500 self-end">{{ __($message) }}</span> @enderror
        <label for="{{ $name }}" class="text-sm mb-2">{{ $label ?? $placeholder }}</label>
    </div>
    <select class="py-1 px-2 dark:bg-slate-900 border dark:border-white rounded w-full rounded-xl" placeholder="{{ $placeholder }}" name="{{ $name }}">
        @foreach($options as $label=>$value)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>

