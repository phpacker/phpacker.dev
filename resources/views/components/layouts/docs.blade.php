<x-layouts.app {{ $attributes }}>

    <flux:sidebar sticky stashable class="bg-zinc-50 border-r border-zinc-200">


        <div class="flex">
            <flux:brand href="/docs/installation" logo="https://fluxui.dev/img/demo/logo.png" name="phpacker" class="uppercase px-2 tracking-wider !gap-1.5">
                <x-slot:logo>
                    <x-svg.logo class="size-5.5" />
                </x-slot:logo>
            </flux:brand>

            <flux:spacer />

             <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
        </div>

        <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" />

        <flux:navlist variant="outline" class="lg:gap-y-1">
            <flux:navlist.item href="/docs/installation">Installation</flux:navlist.item>
            <flux:navlist.item href="/docs/getting-started">Getting Started</flux:navlist.item>
            <flux:navlist.item href="/docs/configuration">Configuration</flux:navlist.item>
            <flux:navlist.item href="/docs/custom-php-builds">Custom PHP Builds</flux:navlist.item>
            <flux:navlist.item href="/docs/updating-php-binaries">Updating PHP Binaries</flux:navlist.item>
            <flux:navlist.item href="/docs/app-considerations">App Considerations</flux:navlist.item>
        </flux:navlist>

        <flux:spacer />

        <div class="flex">
            <flux:button href="https://github.com/phpacker/phpacker" target="_blank" size="sm" variant="subtle">
                <x-slot:icon>
                    <x-svg.github class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon />
                </x-slot:icon>
            </flux:button>

            <flux:button href="https://x.com/gwleuverink" target="_blank" size="sm" variant="subtle">
                <x-slot:icon>
                    <x-svg.twitter class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon />
                </x-slot:icon>
            </flux:button>
        </div>

    </flux:sidebar>

    <flux:header class="lg:hidden">
        <flux:spacer />
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
    </flux:header>

    <flux:main>
        {{ $slot }}
    </flux:main>

</x-layouts.app>
