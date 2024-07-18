<div>
    @isset($id)
        <x-global.modal :image="$activeProfile->image">
            <x-slot:title>
                {{ $activeProfile->prenon . ' ' . $activeProfile->nom }}
            </x-slot:title>
            <div>
                {{ $activeProfile->description }}
            </div>
            <a class="self-end" href="mailto:{{ $activeProfile->email }}">
                <x-global.buttons.info class="w-fit">Envoyer un mail</x-global.buttons.info>
            </a>
        </x-global.modal>
    @endif
    @if($profiles->count() > 0 | strlen($search) > 0)
        <x-global.input wire:model.live="search" class="mb-5" placeholder="Recherche" name="search"></x-global.input>
    @endif
    @if($profiles->count() > 0)
        <ul class="grid grid-cols-4 gap-8">
            @foreach($profiles as $profile)
                <li class="transition ease-in-out hover:scale-105">
                    <a wire:click.prevent="openModal({{ $profile->id }})" href="{{ route('profiles.index', ['id' => $profile->id]) }}">
                        <x-global.card>
                            <img
                                class="w-full aspect-video rounded-xl object-cover"
                                src="{{ isset($profile->image) ? Storage::url($profile->image) : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRIwd-UFT6cmM0mhCyVVBI4oJN87ZizN1YKQ&s" }}"
                                alt="">
                            <h2 class="mt-3">{{ $profile->prenom . ' ' . $profile->nom }}</h2>
                        </x-global.card>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="mt-5">
            {{ $profiles->links() }}
        </div>
    @else
        @if(strlen($search) === 0)
            <x-global.alerts.warning class="bg-orange-100">
                Il n'y a aucun profil à afficher pour le moment.
            </x-global.alerts.warning>
        @endif
        <x-svg.no-data class="h-[60vh] m-auto"/>
    @endif
</div>
