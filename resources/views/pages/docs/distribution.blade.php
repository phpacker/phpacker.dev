<x-layouts.docs title="Distribution - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Distribution
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        There are multiple ways to distribute your binaries. While they are simply files, the most common distribution method in the PHP ecosystem is through Composer.
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <p>Composer doesn't natively support automatic binary selection based on environment. PHPacker solves this by use of a a specialized Composer plugin that handles platform-specific binary distribution automatically.</p>

        <p>To get started, install the PHPacker Composer Installer plugin in your application. Important: it must be a regular dependency, not a dev-dependency.</p>

        <x-code language="shell">composer require phpacker/composer-installer</x-code>

        <p>
            Next, define your executable's alias in your
            <code>composer.json</code>
            file:
        </p>

        <!-- prettier-ignore -->
        <x-code language="json" >
"extra": {
    "phpacker-install": "my-app",
}
        </x-code>

        <p>
            You don't need to define the typical
            <code>bin</code>
            section in your
            <code>composer.json</code>
            file. PHPacker automatically discovers your executables using the
            <code>phpacker.json</code>
            configuration file in your project.
        </p>

        <p>
            When your CLI application is installed, the installer detects your
            <code>phpacker.json</code>
            file and creates a proxy to the correct executable for the user's platform and architecture, using
            <code>my-app</code>
            (or whatever alias you've defined) as the command name.
        </p>

        <p>For Windows environments, executables are handled specially and do not use the .exe extension. Our Windows installation process includes:</p>

        <ol class="list-disc">
            <li>Automatic generation of a .bat file that references the binary</li>
            <li>Creation of a Unix-style proxy file with the same name as the binary, which supports WSL, Linux VMs, and similar environments</li>
        </ol>
    </x-prose>
</x-layouts.docs>
