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
        Start building executables with simple command-line arguments. For production workflows, we recommend using a 
        <a href="/docs/configuration">configuration file</a>
        to track build settings in version control.
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

        <p>When you run <code>phpacker build</code> without arguments, you'll be guided through an interactive setup. Alternatively, you can specify all options directly as command-line arguments.</p>

        <!-- prettier-ignore -->
        <x-code language="shell" >
# Build for specific platform and architecture
phpacker build mac arm --src=./app.phar

# Build for all supported platforms
phpacker build all --src=./app.phar

# Build with custom output directory
phpacker build --src=./app.phar --dest=./custom-build-path

# Build with executable name (defaults to {platform}-{arch})
phpacker build --src=./app.phar --filename=my-app

# Build with a specific PHP configuration file
phpacker build --src=./app.phar --ini=./custom-php.ini

# Prompt INI definitions interactively
phpacker build --src=./app.phar --ini

# Build with with php version
phpacker build --src=./app.phar --php=8.3

# Build with custom PHP binaries
phpacker build --src=./app.phar --binary-src=my-org/php-bin
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Build Output
        </flux:heading>

        <p>The build process creates executables within the build directory with the following structure:</p>

        <!-- prettier-ignore -->
        <x-code language="text" >
            {dest}/{platform}-{architecture}/{filename}[.exe]
        </x-code>

        <p>Where <code>filename</code> defaults to <code>{platform}-{architecture}</code> if not specified with <code>--filename</code>.</p>

        <p><strong>Example output structure:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="text" >
build/
├── linux-x64/
│   └── my-app
├── mac-arm/
│   └── my-app  
└── windows-x64/
    └── my-app.exe
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Supported Platforms
        </flux:heading>

        <table class="min-w-full divide-y divide-zinc-300 dark:divide-zinc-500">
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

            <tbody class="divide-y divide-zinc-300 text-zinc-500 dark:divide-zinc-500 dark:text-zinc-200">
                <tr>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">macOS</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">arm64, x64</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">8.2, 8.3, 8.4, 8.5</td>
                </tr>

                <tr>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">Linux</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">arm64, x64</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">8.2, 8.3, 8.4, 8.5</td>
                </tr>

                <tr>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">Windows</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">x64</td>
                    <td class="px-3 py-4 text-sm whitespace-nowrap">8.2, 8.3, 8.4, 8.5</td>
                </tr>
            </tbody>
        </table>

        <flux:heading
            size="lg"
            level="2"
        >
            PHP Extensions
        </flux:heading>

        <p>
            At the core of PHPacker are our pre-compiled, platform-specific
            <a
                href="https://github.com/phpacker/php-bin"
                target="_blank"
                rel="noopener noreferrer"
            >
                PHP binaries
            </a>
            — portable, statically-compiled versions of PHP.
        </p>

        <p>These binaries include a carefully selected set of the most essential PHP extensions required to run virtually any CLI application.</p>

        <p>PHPacker prioritizes consistent behavior across all platforms, ensuring your apps run reliably whether on Windows, macOS, or Linux. We only include extensions that work consistently across all supported operating systems.</p>

        <p>
            View the complete list of extensions included in our default binaries
            <a
                href="https://github.com/phpacker/php-bin/blob/main/php-extensions.txt"
                target="_blank"
                rel="noopener noreferrer"
            >
                here
            </a>
            .
        </p>

        <p>
            Our binaries are built using the powerful
            <a
                href="https://static-php.dev/"
                target="_blank"
                rel="noopener noreferrer"
            >
                static-php-cli
            </a>
            library. You can also use this tool to create custom PHP binaries with your preferred extensions. For more information, see the
            <a href="/docs/custom-php-builds">Custom PHP Builds</a>
            section.
        </p>

        <flux:callout icon="sparkles" color="purple" class="my-12">
            <flux:callout.heading>Why Use a Configuration File?</flux:callout.heading>
            <flux:callout.text>
                We strongly recommend using a config file instead of passing options manually. It's required for advanced features like the <code>publisher</code> & <code>self-update</code> mechanisms, and allows you to version control your build configuration alongside your codebase.
            </flux:callout.text>
        </flux:callout>
    </x-prose>
</x-layouts.docs>
