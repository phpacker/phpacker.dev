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
    "force-autodiscovery": true,
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

        <p>Your app will exit immediately after the update succeeds. The process itself is still using the old version and it might error when performing operations after.</p>

        <h3>

        </h3>

        <p>When you distribute your app on multiple channels, like Composer you might want to only register your `self-update` command when the app is running as a standalone executable. Here's how you can conditionally register a command using Symfony Console:</p>

        <x-code language="php">
$application = new Application('phpacker', getVersion());

// Compiled build only commands
if (php_sapi_name() === 'micro') {
    $application->add(new SelfUpdate);
}
        </x-code>

        <h2>
            Error handling
        </h2>

        <p>The <code>check()</code> and <code>update()</code> methods can throw specific exceptions that you should handle in your implementation. Here are the main exceptions to catch:</p>

        <x-code language="php">
use PHPacker\Publisher\Exceptions\ChecksumException;
use PHPacker\Publisher\Exceptions\ManagedByComposerException;
use PHPacker\Publisher\Exceptions\NoUpdateAvailableException;
use Symfony\Component\HttpClient\Exception\TimeoutException;
use Symfony\Component\HttpClient\Exception\TransportException;

try {
    $updateManager = UpdateManager::make(__DIR__ . '/../../phpacker.json');
    $updateData = $updateManager->check();

    if ($updateData->updateAvailable) {
        $updateManager->update();
    }
} catch (ManagedByComposerException $e) {
    // App is installed via Composer, self-update not allowed
    error('Cannot update: This application is managed by Composer');
} catch (NoUpdateAvailableException $e) {
    // No update available when trying to force update
    info('You are already on the latest version');
} catch (ChecksumException $e) {
    // Downloaded file failed checksum validation
    error('Update failed: File integrity check failed');
} catch (TimeoutException|TransportException $e) {
    // Network or connection issues
    error('Update failed: Could not connect to update server');
} catch (RuntimeException $e) {
    // General runtime errors (missing files, permissions, etc.)
    error('Update failed: ' . $e->getMessage());
}
        </x-code>

        <h3>Method exceptions</h3>

        <h4><code>check()</code> method</h4>

        <x-code language="php">
/**
 * @throws TimeoutException
 * @throws TransportException
 */
public function check(): UpdateMeta
        </x-code>

        <ul class="list-disc">
            <li><strong>TimeoutException/TransportException</strong>: Network-related errors when fetching release information from the provider.</li>
        </ul>

        <h4><code>update()</code> method</h4>

        <x-code language="php">
/**
 * @throws RuntimeException
 * @throws TimeoutException
 * @throws TransportException
 * @throws ChecksumException
 * @throws NoUpdateAvailableException
 * @throws ManagedByComposerException
 */
public function update()
        </x-code>

        <ul class="list-disc">
            <li><strong>ManagedByComposerException</strong>: Executable is installed via Composer (in <code>vendor/bin</code> directory). Self-updates are disabled to prevent conflicts.</li>
            <li><strong>NoUpdateAvailableException</strong>: No newer version is available. Use <code>check()</code> first to avoid this.</li>
            <li><strong>ChecksumException</strong>: Downloaded files failed SHA256 checksum validation. Indicates file corruption or security issues.</li>
            <li><strong>TimeoutException/TransportException</strong>: Network errors when downloading update files or fetching manifest.</li>
            <li><strong>RuntimeException</strong>: General errors including missing platform builds, file system permissions, or configuration problems.</li>
        </ul>

    </x-prose>
</x-layouts.docs>
