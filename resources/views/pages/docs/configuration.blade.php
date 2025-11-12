<x-layouts.docs title="Configuration - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Configuration
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        Use a configuration file to define build settings once and version control them with your project. This eliminates the need to remember complex command-line arguments and ensures consistent builds across different environments.
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <p>With a configuration file in place, you can build your executables with a simple command:</p>

        <x-code language="shell">phpacker build</x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            JSON Configuration (phpacker.json)
        </flux:heading>

        <p>Place a phpacker.json file in your project root to define build settings:</p>

        <!-- prettier-ignore -->
        <x-code language="json" >
{
    "php": "8.4",
    "platform": "all",
    "ini": "./phpacker.ini",
    "src": "./bin/app.phar",
    "dest": "./build",
    "filename": "my-app",
    "binary_src": "my-org/custom-php-bin"
}
        </x-code>

        <p><strong>Configuration options:</strong></p>

        <ul class="list-disc">
            <li><code>php</code> - PHP version (8.2, 8.3, 8.4)</li>
            <li><code>platform</code> - Target platforms ("all", "linux", "mac", "windows")</li>
            <li><code>ini</code> - Path to custom PHP ini file</li>
            <li><code>src</code> - Path to your PHP script or PHAR file</li>
            <li><code>dest</code> - Output directory for built executables</li>
            <li><code>filename</code> - Custom name for the executable</li>
            <li><code>binary_src</code> - Custom PHP binary repository</li>
        </ul>

        <p>PHPacker will look for a config file in the following order:</p>

        <ol class="list-decimal">
            <li>
                Custom path specified via
                <code>--config=path/to/file.json</code>
            </li>
            <li>
                <code>phpacker.json</code>
                in the source directory via
                <code>--src</code>
                option
            </li>
            <li>
                <code>phpacker.json</code>
                in the current working directory
            </li>
        </ol>

        <flux:heading
            size="lg"
            level="2"
        >
            PHP INI Configuration
        </flux:heading>

        <p>Similarly PHPacker will look for ini configuration in the following order:</p>

        <ol class="list-decimal">
            <li>
                Custom path specified via
                <code>--ini=path/to/file.ini</code>
            </li>
            <li>Path specified in used config file</li>
            <li>
                <code>phpacker.ini</code>
                in the source directory via
                <code>--src</code>
                option
            </li>
            <li>
                <code>phpacker.ini</code>
                in the current working directory
            </li>
            <li>
                Interactive prompt if
                <code>--ini</code>
                is passed without a value
            </li>
        </ol>

        <flux:heading
            size="lg"
            level="2"
        >
            Example INI File
        </flux:heading>

        <p>Here's an example of a basic PHP INI configuration:</p>

        <!-- prettier-ignore -->
        <x-code language="ini" >
; Memory settings
memory_limit = 256M

; Error handling
display_errors = Off
log_errors = On
error_log = stderr
        </x-code>
    </x-prose>
</x-layouts.docs>
