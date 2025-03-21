<div class="flex">
    <flux:brand
        href="/"
        logo="https://fluxui.dev/img/demo/logo.png"
        name="phpacker"
        class="!gap-1.5 px-2 tracking-wider uppercase"
    >
        <x-slot:logo>
            <x-svg.logo class="size-5.5" />
        </x-slot>
    </flux:brand>

    <flux:spacer />

    <flux:sidebar.toggle
        class="lg:hidden"
        icon="x-mark"
    />
</div>

<x-search />

<flux:navlist
    variant="outline"
    class="lg:gap-y-1"
>
    @foreach (config('navigation') as $label => $href)
        <flux:navlist.item :$href>{{ $label }}</flux:navlist.item>
    @endforeach
</flux:navlist>

<flux:spacer />

<div class="flex items-center">
    <flux:button
        href="https://github.com/phpacker/phpacker"
        target="_blank"
        size="sm"
        variant="subtle"
    >
        <x-slot:icon>
            <x-svg.github
                class="shrink-0 [:where(&amp;)]:size-5"
                data-flux-icon
            />
        </x-slot>
    </flux:button>

    <flux:button
        href="https://x.com/gwleuverink"
        target="_blank"
        size="sm"
        variant="subtle"
    >
        <x-slot:icon>
            <x-svg.twitter
                class="shrink-0 [:where(&amp;)]:size-4"
                data-flux-icon
            />
        </x-slot>
    </flux:button>

    <flux:spacer />

    <div class="mr-2 lg:hidden">
        <x-darkmode />
    </div>
</div>
