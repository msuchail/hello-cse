<div class="flex flex-col">
    <div class="w-3/4 m-auto">
        <x-global.card >
            <form class="grid grid-cols-2 items-center gap-10" wire:submit.prevent="login">
                <x-svg.login class="m-auto" />
                <div class="flex flex-col justify-center gap-20">
                    <h2 class="text-2xl font-bold">Connectez vous à votre compte</h2>
                    <div class="flex flex-col gap-5">
                        <x-global.input class="" wire:model.live="email" type="text" placeholder="Votre email" name="email" />
                        <x-global.input wire:model.live="password" type="password" placeholder="Votre mot de passe" name="password" />
                    </div>
                    <x-global.buttons.info class="w-fit m-auto">Se connecter</x-global.buttons.info>
                </div>
            </form>
        </x-global.card>
    </div>

</div>
