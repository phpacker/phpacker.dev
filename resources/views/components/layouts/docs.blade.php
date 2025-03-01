<x-layouts.app {{ $attributes }}>
    <flux:sidebar
        sticky
        stashable
        class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
    >
        <x-sidebar />
    </flux:sidebar>

    <flux:header class="lg:hidden">
        <flux:spacer />
        <flux:sidebar.toggle
            class="lg:hidden"
            icon="bars-2"
            inset="left"
        />
    </flux:header>

    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app>
