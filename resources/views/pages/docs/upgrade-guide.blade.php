<x-layouts.docs title="Upgrade to v1.0.0 - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Upgrade to v1
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        PHPacker v1 introduces several breaking changes to improve usability and consistency. This guide will help you migrate from previous versions.
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
            High Impact Changes
        </flux:heading>

        <ul class="list-disc">
            <li><a href="#output-directory-structure">Output Directory Structure</a></li>
            <li><a href="#command-renamed">Command Renamed: download → fetch</a></li>
        </ul>

        <flux:heading
            size="lg"
            level="2"
        >
            Medium Impact Changes
        </flux:heading>

        <ul class="list-disc">
            <li><a href="#configuration-option-renamed">Configuration Option Renamed: repository → binary_src</a></li>
        </ul>

        <flux:heading
            size="lg"
            level="2"
        >
            New Features
        </flux:heading>

        <flux:separator />

        <h3 id="filename-option">Custom Executable Names</h3>

        <p>You can now customize the executable name using the <code>--filename</code> option:</p>

        <x-code language="shell">phpacker build --filename=my-app</x-code>

        <p>Or in <code>phpacker.json</code>:</p>

        <!-- prettier-ignore -->
        <x-code language="json">
{
  "filename": "my-app"
}
        </x-code>

        <p>When no custom filename is provided, the default remains <code>{platform}-{arch}</code> (e.g., <code>linux-x64</code>, <code>mac-arm</code>).</p>

        <h3 id="publisher-cli">Publisher CLI</h3>

        <p>We've added an addon lightweight publishing & self-update mechanism for PHPacker executables. Perfect for applications distributed via direct download (curl, file sharing, etc.)</p>

        <p>Simply install the publisher in your app:</p>

        <x-code language="sh">
            composer require phpacker/publisher
        </x-code>

        <x-code language="sh">
            ./vendor/bin/phpacker-publisher release
        </x-code>

        <p>We're launching with GitHub Releases support and we encourage contributions to add additional drivers (S3, Spaces) <a href="/docs/distribution/publisher">[Docs]</a></p>

        <h3 id="self-update-mechanism">Self-update mechanism</h3>

        <p>The updater comes with a simple API for checking, verifying & applying updates for you. You're free to implement this in your own <code>self-update</code> commands. <a href="/docs/distribution/updater">[Docs]</a></p>

        <x-code language="php">
$updateManager = UpdateManager::make(__DIR__ . '/path/to/phpacker.json');

// Check for updates - returns a UpdateMeta object
$updateManager->check();

// Apply the update
$updateManager->update();
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Breaking Changes
        </flux:heading>

        <flux:separator />

        <h3 id="output-directory-structure" class="mb-6">
            <flux:badge size="sm" color="red">high</flux:badge>
            Output Directory Structure
        </h3>

        <p>The output directory structure for built executables has changed to support custom executable names.</p>

        <p><strong>Before:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="text">
build/
├── linux/
│   ├── linux-arm
│   └── linux-x64
├── mac/
│   ├── mac-arm
│   └── mac-x64
└── windows/
    └── windows-x64.exe
        </x-code>

        <p><strong>After:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="text">
build/
├── linux-arm/
│   └── {filename}
├── linux-x64/
│   └── {filename}
├── mac-arm/
│   └── {filename}
├── mac-x64/
│   └── {filename}
└── windows-x64/
    └── {filename}.exe
        </x-code>

        <p><strong>Migration required:</strong> Update any scripts or automation that reference the old directory structure. Change paths from <code>build/{platform}/{platform}-{arch}</code> to <code>build/{platform}-{arch}/{filename}</code>.</p>

        <h3 id="command-renamed" class="mb-6">
            <flux:badge size="sm" color="red">high</flux:badge> Command Renamed: `download` → `fetch`
        </h3>

        <p>The <code>phpacker download</code> command has been renamed to <code>phpacker fetch</code> for better consistency with CLI conventions.</p>

        <p><strong>Before:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="shell">
phpacker download
phpacker download --force
phpacker download your-org/php-bin
        </x-code>

        <p><strong>After:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="shell">
phpacker fetch
phpacker fetch --force
phpacker fetch your-org/php-bin
        </x-code>

        <h4>Migration Steps</h4>

        <ol class="list-decimal">
            <li>Update any scripts or CI/CD pipelines that use <code>phpacker download</code></li>
            <li>Replace with <code>phpacker fetch</code> using the same arguments and options</li>
            <li>The functionality remains identical - only the command name has changed</li>
        </ol>

        <h3 id="configuration-option-renamed" class="mb-6">
            <flux:badge size="sm" color="amber" >medium</flux:badge> Configuration Option Renamed: `repository` → `binary_src`
        </h3>

        <p>The <code>repository</code> option in <code>phpacker.json</code> and corresponding command arguments has been renamed to <code>binary_src</code> for clarity.</p>

        <p><strong>Why this change?</strong> The new name removes ambiguity about repository type and clearly distinguishes it from your application's source repository.</p>

        <p><strong>Before:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="json">
{
  "repository": "my-org/php-binaries"
}
        </x-code>

        <!-- prettier-ignore -->
        <x-code language="shell">
phpacker build --repository=my-org/php-binaries
        </x-code>

        <p><strong>After:</strong></p>

        <!-- prettier-ignore -->
        <x-code language="json">
{
  "binary_src": "my-org/php-binaries"
}
        </x-code>

        <!-- prettier-ignore -->
        <x-code language="shell">
phpacker build --binary-src=my-org/php-binaries
        </x-code>

        <h4>Migration Steps</h4>

        <ol class="list-decimal">
            <li>Update your <code>phpacker.json</code> config files to use <code>binary_src</code> instead of <code>repository</code></li>
            <li>Update command-line usage to use <code>--binary-src</code> option instead</li>
            <li>Review any scripts that reference the old configuration option</li>
        </ol>

        <p>
            <em>For more information, see the
            <a href="/">PHPacker documentation</a>.
            </em>
        </p>
    </x-prose>
</x-layouts.docs>
