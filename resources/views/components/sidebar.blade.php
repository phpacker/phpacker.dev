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
    class="lg:gap-y-1 h-full"
>
    @foreach (config('navigation') as $label => $item)


        @if(array_key_exists('href', $item))

            <flux:navlist.item :href="$item['href']" @class([
                'mt-auto' => $item['bottom'] ?? false
            ])>
                {{ $label }}

                @if($item['new'] ?? false)
                    <flux:badge size="sm" color="green" class="animate-pulse ml-3 absolute right-1.5 top-[.3rem] !py-0.5 !px-1.5">new</flux:badge>
                @endif
            </flux:navlist.item>



        @elseif(is_array($item))

            <flux:navlist.group expandable :heading="$label" class="grid">
                @foreach($item as $label => $nested)
                    <flux:navlist.item :href="$nested['href']">
                        {{ $label }}

                        @if($nested['new'] ?? false)
                            <flux:badge size="sm" color="green" class="animate-pulse ml-3 absolute right-1.5 top-[.3rem] !py-0.5 !px-1.5">new</flux:badge>
                        @endif
                    </flux:navlist.item>
                @endforeach
            </flux:navlist.group>

        @endif
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
