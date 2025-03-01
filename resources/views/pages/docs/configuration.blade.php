<x-layouts.docs title="Installation - phpacker">
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
        Using a config file you are able to predefine any argument or option otherwise passed to the build command. This way you can have all parameters for your project in a single version tracked file.
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <p>By using this method you'll be able to run the build command without providing any input:</p>

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
    "src": "./bin/app.phar",
    "dest": "./build",
    "ini": "./phpacker.ini",
    "platform": "all",
    "php": "8.4",
    "repository": "optional/custom-php-bin-repo"
}
        </x-code>

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
