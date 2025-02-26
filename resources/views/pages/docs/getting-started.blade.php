<x-layouts.docs title="Getting Started - phpacker">

    <flux:heading size="xl" level="1">Getting Started</flux:heading>

    <flux:subheading size="lg" class="max-w-prose">
        All configuration options can be passed as command arguments. For a version-tracked way to do this, check out the <a href="/docs/configuration">config</a> section to track all options in a config file.
    </flux:subheading>

    <flux:separator variant="subtle" class="my-6" />


    <div class="max-w-prose prose-zinc prose-sm">

        <flux:heading size="lg" level="2">Basic Build Commands</flux:heading>

        <p>When you don't provide any input you'll be prompted through setting the basics. You may also pass these as arguments to the build command.</p>

        <x-code language='shell'>
# Build for specific platform and architecture
phpacker build mac arm --src=./app.phar

# Build for all supported platforms
phpacker build all --src=./app.phar

# Build with custom output directory
phpacker build --src=./app.phar --dest=./custom-build-path

# Build with with php version
phpacker build --src=./app.phar --php=8.3
        </x-code>


        <flux:heading size="lg" level="2">Supported Platforms</flux:heading>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>Platform</flux:table.column>
                <flux:table.column>Architectures</flux:table.column>
                <flux:table.column>PHP Versions</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                <flux:table.row>
                    <flux:table.cell>macOS</flux:table.cell>
                    <flux:table.cell>arm64, x64</flux:table.cell>
                    <flux:table.cell>8.2, 8.3, 8.4</flux:table.cell>
                </flux:table.row>

                <flux:table.row>
                    <flux:table.cell>Linux</flux:table.cell>
                    <flux:table.cell>arm64, x64</flux:table.cell>
                    <flux:table.cell>8.2, 8.3, 8.4</flux:table.cell>
                </flux:table.row>

                <flux:table.row>
                    <flux:table.cell>Windows</flux:table.cell>
                    <flux:table.cell>x64</flux:table.cell>
                    <flux:table.cell>8.2, 8.3, 8.4</flux:table.cell>
                </flux:table.row>
            </flux:table.rows>
        </flux:table>

    </div>


</x-layouts.docs>
