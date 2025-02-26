<x-layouts.docs title="Custom PHP Builds - phpacker">

    <flux:heading size="xl" level="1">Prepping your CLI app</flux:heading>

    <flux:subheading size="lg" class="max-w-prose">When building an executable using PHPacker, there are some important considerations.</flux:subheading>

    <flux:separator variant="subtle" class="my-6" />


    <x-prose>

        <flux:heading size="lg" level="2">Single PHP Script Limitations</flux:heading>

        <p>If you're building from a single PHP script, all code must be contained within that file. External dependencies through require or use statements are not supported. If your application needs external dependencies, you should first package it as a PHAR archive using a tool like <a href="https://github.com/box-project/box" target="_blank" rel="noopener noreferrer">humbug/box</a>.</p>

        <flux:heading size="lg" level="2">File System Access</flux:heading>

        <p>When your application is packaged (either from a single script or PHAR), it cannot write files within the application itself since everything is combined into a single executable. Instead, use the platform-specific application data directory for file storage. Here's a helper script to determine the correct path:</p>

        <x-code language='php'>
use Symfony\Component\Filesystem\Path;

$appName = 'my-app';

// Define APP_DATA constant
define('APP_DATA', match (PHP_OS_FAMILY) {
    'Darwin' => Path::join(getenv('HOME'), 'Library', 'Application', 'Support', $appName),
    'Windows' => Path::join(getenv('LOCALAPPDATA'), $appName),
    default => Path::join(getenv('HOME'), $appName))
});
        </x-code>

        <p>This ensures your application's data is stored in the appropriate location across different operating systems:</p>

        <ul class="list-disc">
            <li>macOS: ~/Library/Application Support/.my-app</li>
            <li>Windows: %LOCALAPPDATA%\my-app</li>
            <li>Linux: ~/.my-app</li>
        </ul>
    </x-prose>


</x-layouts.docs>
