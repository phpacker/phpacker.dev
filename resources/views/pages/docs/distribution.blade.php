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
        There are multiple ways to distribute your binaries, they are just files after all. The most common in the PHP ecosystem is through Composer
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <p>Composer itself does not natively support automatic binary selection based on platform. PHPacker automates this process by use of a specialized composer plugin.</p>

        <p>The PHPacker Composer Installer automates everything around installing the correct executable for each platform. Simply drop it in and you're ready to go.</p>

        <p>Go ahead and install the PHPacker Composer Installer plugin in your app. Note it cannot be a dev-dependency</p>

        <x-code language="shell">composer require phpacker/composer-installer</x-code>

        <p>
            Next, define the alias you want to use for your executable inside
            <code>composer.json</code>
            :
        </p>

        <!-- prettier-ignore -->
        <x-code language="json" >
"extra": {
    "phpacker-install": "my-app",
}
        </x-code>

        <p>
            You don't have to define the typical bin section in your
            <code>composer.json</code>
            file. PHPacker will discover your executables using the detected
            <code>phpacker.json</code>
            config file.
        </p>

        <p>
            Now whenever your cli app is installed, the installer will automatically detect your
            <code>phpacker.json</code>
            file and copy the correct executable for the intended platform and architecture, in this example using
            <code>my-app</code>
            as the executable name.
        </p>

        <p>The executables installed in a Windows environment will not use the .exe extension. We handle installation of executables in a special way when run in a Windows environment:</p>

        <ol class="list-disc">
            <li>A .bat file is generated automatically to reference the binary</li>
            <li>A Unix-style proxy file with the same name as the binary is also generated, which is useful for WSL, Linux VMs, etc.</li>
        </ol>
    </x-prose>
</x-layouts.docs>
