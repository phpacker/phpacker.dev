<x-layouts.docs title="App Considerations - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Prepping your CLI app
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        Key considerations when packaging your PHP application as a standalone executable.
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
            Single PHP Script Limitations
        </flux:heading>

        <p>
            Single PHP scripts cannot include external files or dependencies. If your application uses Composer packages or multiple files, first create a PHAR archive using tools like
            <a
                href="https://github.com/box-project/box"
                target="_blank"
                rel="noopener noreferrer"
            >
                humbug/box
            </a>
            before packaging with PHPacker.
        </p>

        <flux:heading
            size="lg"
            level="2"
        >
            File System Access
        </flux:heading>

        <p>Packaged applications cannot modify their own files since everything is bundled into a single executable. Use platform-specific directories for data storage instead:</p>

        <!-- prettier-ignore -->
        <x-code language='php' >
use Symfony\Component\Filesystem\Path;

$appName = 'my-app';

// Define APP_DATA constant
define('APP_DATA', match (PHP_OS_FAMILY) {
    'Darwin' => Path::join(getenv('HOME'), 'Library', 'Application', 'Support', ".{$appName}"),
    'Windows' => Path::join(getenv('LOCALAPPDATA'), $appName),
    default => Path::join(getenv('HOME'), ".{$appName}"))
});
        </x-code>

        <p>This ensures your application's data is stored in the appropriate location across different operating systems:</p>

        <ul class="list-disc">
            <li>macOS: ~/Library/Application Support/.my-app</li>
            <li>Windows: %LOCALAPPDATA%\my-app</li>
            <li>Linux: ~/.my-app</li>
        </ul>

        <flux:heading
            size="lg"
            level="2"
        >
            Additional Application Considerations
        </flux:heading>

        <ul class="list-disc">
            <li>
                <strong>Environment variables</strong>
                : Access environment variables using the standard
                <code>getenv()</code>
                function or
                <code>$_ENV</code>
                superglobal
            </li>
            <li>
                <strong>Temporary files</strong>
                : Use
                <code>sys_get_temp_dir()</code>
                to get the system's temporary directory for temporary file operations
            </li>
            <li>
                <strong>Command line arguments</strong>
                : Use a library for robust CLI argument handling. Like
                <a
                    href="https://symfony.com/doc/current/components/console.html"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    symfony/console
                </a>
                ,
                <a
                    href="https://laravel-zero.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    laravel-zero
                </a>
                or
                <a
                    href="https://minicli.dev/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    minicli
                </a>
            </li>
        </ul>
    </x-prose>
</x-layouts.docs>
