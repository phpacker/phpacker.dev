<x-layouts.docs title="Custom PHP Builds - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Updating PHP Binaries
    </flux:heading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <p>PHPacker automatically checks for binary updates during builds. Manual updates can be performed</p>

        <!-- prettier-ignore -->
        <x-code language="shell" >
# Update official binaries
phpacker download

# Update custom repository
phpacker download "your-org/php-bin"
        </x-code>
    </x-prose>
</x-layouts.docs>
