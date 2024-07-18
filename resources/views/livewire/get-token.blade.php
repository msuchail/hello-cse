<div>
    @if($modal)
        <x-global.modal>
            <x-slot:title>
                Création d'un token
            </x-slot:title>
            <div class="grid grid-cols-12 gap-5 w-full">
                <x-svg.padlock class="w-full col-span-4"/>
                <form action=""  wire:submit.prevent="createToken" class="col-span-8 flex flex-col justify-between gap-4">
                    <div>
                        <x-global.input type="text" label="Nom du token" name="tokenName" placeholder="Nom du token" class="col-span-8" wire:model.live="tokenName"/>
                        <x-global.input type="date" label="Expiration" name="tokenExpiration" placeholder="Expiration" wire:model.live="tokenExpiration"/>
                        <x-global.select name="tokenAbilities" label="Autorisations" placeholder="Autorisations" live-model="tokenAbilities" :options="$abilitiesOptions"/>
                    </div>
                    <div class="self-end">
                        <x-global.buttons.info class="w-fit">Créer le token</x-global.buttons.info>
                    </div>
                </form>
            </div>
        </x-global.modal>
    @endif
    <x-global.card class="grid grid-cols-12">
        <x-svg.coding class="col-span-4" />
        <div class="col-span-8 h-full flex flex-col justify-between">
            @if(isset($tokens) && $tokens->count() > 0)
                <ul class="grid grid-col-2 gap-4 mb-3">
                    @foreach($tokens as $token)
                        <li><x-global.card class="border">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <strong>{{ $token->name }}</strong>
                                        @isset($token->abilities)
                                            <ul class="flex">
                                                @foreach($token->abilities as $ability)
                                                    <li>{{ $ability }},</li>
                                                @endforeach
                                            </ul>
                                        @endisset
                                        @isset($token->expires_at)
                                            <p>Expire le {{ $token->expires_at }}</p>
                                        @endisset
                                    </div>
                                    <div class="flex gap-2">
                                        <a class="cursor-pointer" wire:click="deleteToken({{$token->id}})">
                                            <x-heroicon-c-trash class="w-6 text-red-500"></x-heroicon-c-trash>
                                        </a>
                                    </div>
                                </div>
                            </x-global.card></li>
                    @endforeach
                </ul>
            @else
                <x-global.alerts.warning>
                    <p>Vous n'avez aucun token rattaché à votre compte.</p>
                </x-global.alerts.warning>
            @endif
            @if(isset($tokens) && count($tokens) == 4)
                <x-global.alerts.warning>
                    <p>Vous avez atteint le nombre maximum de tokens autorisés.</p>
                </x-global.alerts.warning>
            @else
                <div class="self-end" wire:click="showModal">
                    <x-global.buttons.info class="w-fit">Créer un token</x-global.buttons.info>
                </div>
            @endif
        </div>
    </x-global.card>
</div>
@script
<script>
    $wire.on('tokenCreated', (token) => {
        token = token[0]
        navigator.clipboard.writeText(token)
        alert('Token créé avec succès!\n' + token + "\n\nLe token à été copié dans votre presse papier. Il ne sera plus visible après cette alerte.")
    })
</script>
@endscript
