<x-layouts.docs title="Self-update mechanism - phpacker">
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
        The updater comes with a simple API for checking, verifying & applying updates for you.
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
            Installation
        </flux:heading>

        <p>The self-update mechanism is designed to work together with the <a href="/docs/distribution/publisher">publisher CLI</a>. You'll have to install the publisher package & configure a provider to set things up.</p>

        <flux:heading
            size="lg"
            level="2"
        >
            Implement the self-update command
        </flux:heading>

        <p>The updater API provides three core methods for implementing self-updates in your application:</p>

        <x-code language="php">
$updateManager = UpdateManager::make(__DIR__ . '/path/to/phpacker.json');

// Check for updates - returns a UpdateMeta object
$updateManager->check();

// Apply the update
$updateManager->update();
        </x-code>

        <p><strong>Important:</strong> The <code>phpacker.json</code> path must be provided manually because it's embedded within the compiled executable and cannot be auto-detected.</p>

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


        <flux:heading
            size="lg"
            level="2"
        >
            Complete example
        </flux:heading>

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

        <p><strong>Note:</strong> Your application will terminate immediately after a successful update since the running process uses the old version and cannot safely continue execution.</p>

        <h3>
            Conditional Command Registration
        </h3>

        <p>When distributing through multiple channels (Composer, standalone), only register the self-update command for compiled executables:</p>

        <x-code language="php">
$application = new Application('phpacker', getVersion());

if (php_sapi_name() === 'micro') {
    $application->add(new SelfUpdate);
}
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Error handling
        </flux:heading>

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

} catch (ManagedByComposerException $e) { // [tl! focus:start]

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

} // [tl! focus:end]
        </x-code>

        <h3>Method exceptions</h3>

        {{-- <h4><code>check()</code> method</h4> --}}

        <x-code language="php">
/**
 * @throws TimeoutException
 * @throws TransportException
 */
public function check(): UpdateMeta;
        </x-code>

        <ul class="list-disc">
            <li><strong>TimeoutException/TransportException</strong>: Network-related errors when fetching release information from the provider.</li>
        </ul>

        <x-code language="php">
/**
 * @throws RuntimeException
 * @throws TimeoutException
 * @throws TransportException
 * @throws ChecksumException
 * @throws NoUpdateAvailableException
 * @throws ManagedByComposerException
 */
public function update(): void;
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
