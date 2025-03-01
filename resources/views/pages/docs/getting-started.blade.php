<x-layouts.docs title="Getting Started - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Getting Started
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        All configuration options can be passed as command arguments. For a version-tracked way to do this, check out the
        <a href="/docs/configuration">config</a>
        section to track all options in a config file.
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <flux:heading
            size="lg"
            level="2"
        >
            Basic Build Commands
        </flux:heading>

        <p>When you don't provide any input you'll be prompted through setting the basics. You may also pass these as arguments to the build command.</p>

        <!-- prettier-ignore -->
        <x-code language="shell" >
# Build for specific platform and architecture
phpacker build mac arm --src=./app.phar

# Build for all supported platforms
phpacker build all --src=./app.phar

# Build with custom output directory
phpacker build --src=./app.phar --dest=./custom-build-path

# Build with a specific PHP configuration file
phpacker build --src=./app.phar --ini=./custom-php.ini

# Prompt INI definitions interactively
phpacker build --src=./app.phar --ini

# Build with with php version
phpacker build --src=./app.phar --php=8.3
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Build Output
        </flux:heading>

        <p>The default build process creates executables within the build directory with the following naming pattern:</p>

        <!-- prettier-ignore -->
        <x-code language="text" >
            {dest}/{platform}/{platform}-{architecture}[.exe]
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Supported Platforms
        </flux:heading>

        <table class="min-w-full divide-y divide-zinc-300">
            <thead>
                <tr>
                    <th
                        scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold"
                    >
                        Platform
                    </th>
                    <th
                        scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold"
                    >
                        Architecture
                    </th>
                    <th
                        scope="col"
                        class="px-3 py-3.5 text-left text-sm font-semibold"
                    >
                        PHP Versions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-zinc-300 text-zinc-500 dark:text-zinc-200">
                <tr>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">macOS</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">arm64, x64</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">8.2, 8.3, 8.4</td>
                </tr>

                <tr>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">Linux</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">arm64, x64</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">8.2, 8.3, 8.4</td>
                </tr>

                <tr>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">Windows</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">x64</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">8.2, 8.3, 8.4</td>
                </tr>
            </tbody>
        </table>
    </x-prose>
</x-layouts.docs>
