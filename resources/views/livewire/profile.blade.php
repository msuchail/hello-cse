<div>
    @isset($id)
        <x-modal :image="$activeProfile->image">
            <x-slot:title>
                {{ $activeProfile->prenon . ' ' . $activeProfile->nom }}
            </x-slot:title>
            {{ $activeProfile->description }}
        </x-modal>
    @endif
    @if($profiles->count() > 0)
        <ul class="grid grid-cols-4 gap-8">
            @foreach($profiles as $profile)
                <li class="transition ease-in-out hover:scale-105">
                    <a wire:click.prevent="openModal({{ $profile->id }})" href="{{ route('profiles.index', ['id' => $profile->id]) }}">
                        <x-global.card>
                            <img
                                class="w-full aspect-video rounded-xl object-cover"
                                src="{{ $profile->image }}"
                                alt="">
                            <h2 class="mt-3">{{ $profile->prenom . ' ' . $profile->nom }}</h2>
                        </x-global.card>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <x-global.alert class="bg-orange-100">
            Il n'y a aucun profil à afficher pour le moment.
        </x-global.alert>
        <x-svg.no-data class="h-[60vh] m-auto"/>
    @endif
</div>
