<x-layouts.docs title="Installation - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Self-update mechanism
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        The updater comes with a simpe API for checking, verifying & applying updates for you.
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <h2>
            Installation
        </h2>

        <p>The self-update mechanism is designed to work together with the <a href="docs/distribution/publishing">publisher cli</a>. You'll have to install the publisher packager & configure a provider to set things up.</p>

        <h2>
            Implement the self-update command
        </h2>

        <p>We provide a very lightweight API for checking for & applying updates you can use when writing your own <code>self-update</code> command. In it's simplest form it it involves only these three steps:</p>

        <x-code language="php">
$updateManager = UpdateManager::make(__DIR__ . '/path/to/phpacker.json');

// Check for updates - returns a UpdateMeta object
$updateManager->check();

// Apply the update
$updateManager->update();
        </x-code>

        <p>You might have noticed we need to pass the <code>phpacker.json</code> file in the <code>UpdateManager</code> manually. This is because when you compile a phar archive, the config file will be encoded inside the executable itself. There is no way to detect it.</p>

        <p>
            To include the <code>phpacker.json</code> file using
            <a
                href="https://github.com/box-project/box"
                target="_blank"
                rel="noopener noreferrer"
            >
                humbug/box
            </a>
            please include the following in your <code>box.json</code> file:
        </p>

        <x-code language="json">
{
    "files": [
        "phpacker.json"
    ]
}
        </x-code>


        <h2>
            Complete example
        </h2>

        <p>Here's a basic example on how these can be applied using Laravel Prompts:</p>

        <x-code language="php">
protected function execute(InputInterface $input, OutputInterface $output): int
{
    $updateManager = UpdateManager::make(__DIR__ . '/../../phpacker.json');
    $updateData = $updateManager->check();

    // Check for new version
    if (! $updateData->updateAvailable) {
        note("You're on the latest version {$updateData->currentVersion}");

        return Command::SUCCESS;
    }

    // Confirm
    if ($input->isInteractive()) {
        note("Update available! Do you want to update {$updateData->currentVersion} -> {$updateData->latestVersion} ?");
        pause('Press ENTER to continue.');
    }

    // Perform the update
    spin(
        fn () => $updateManager->update(),
        "Installing update {$updateData->latestVersion}"
    );

    info('Update installed successfully!');
    return Command::SUCCESS;
}
        </x-code>

        <p>Note that it's best to exit the process as fast as possible after the update finishes. The process itself is still using the old version and it might error when performing operations after.</p>

    </x-prose>
</x-layouts.docs>
