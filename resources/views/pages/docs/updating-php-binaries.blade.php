<x-layouts.docs title="Updating PHP Binaries - phpacker">
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
        <p>PHPacker automatically checks for binary updates during builds. You can also manually update or manage the binary cache as needed:</p>

        <!-- prettier-ignore -->
        <x-code language="shell" >
# Update official binaries
phpacker fetch

# Update custom repository
phpacker fetch "your-org/php-bin"

# Force redownload
phpacker fetch "your-org/php-bin" --force
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Binary Cache Management
        </flux:heading>

        <p>PHPacker stores downloaded PHP binaries in a local cache directory to avoid repeated downloads. This significantly speeds up subsequent builds. You can manage this cache with the following commands:</p>

        <!-- prettier-ignore -->
        <x-code language="shell" >
# Display cache information
phpacker cache list

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

        <p>Our binaries are automatically rebuilt weekly using GitHub Actions to include the latest PHP versions and security updates as soon as they become available.</p>
    </x-prose>
</x-layouts.docs>
