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

        <flux:heading
            size="lg"
            level="2"
        >
            Binary Cache Management
        </flux:heading>

        <p>PHPacker stores downloaded PHP binaries in a local cache to avoid repeated downloads. You can manage this cache with the following commands:</p>

        <!-- prettier-ignore -->
        <x-code language="shell" >
# Display cache information
phpacker cache info

# Clear all cached binaries
phpacker cache clear

# Clear specific version
phpacker cache clear "your-org/php-bin"
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Update Frequency
        </flux:heading>

        <p>
            PHPacker uses
            <a
                href="https://github.com/crazywhalecc/static-php-cli"
                target="_blank"
                rel="noopener noreferrer"
            >
                static-php-cli
            </a>
            to build minimal, statically-linked, self-contained PHP executables for each platform.
        </p>

        <p>They are automatically built weekly to get the latest versions of PHP near enough as soon as they become available.</p>
    </x-prose>
</x-layouts.docs>
