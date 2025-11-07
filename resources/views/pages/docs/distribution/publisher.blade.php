<x-layouts.docs title="Installation - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Publisher CLI
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        PHPacker provides a lightweight cli tool to push your executables to GitHub Releases.
    </flux:subheading>

    <flux:separator
        variant="subtle"
        class="my-6"
    />

    <x-prose>
        <h2>
            Installation
        </h2>

        <p>The Publisher is a separate package. You need to install it in your project:</p>

        <x-code language="shell">composer require phpacker/publisher</x-code>

        <flux:callout icon="exclamation-triangle" color="purple" class="my-12">
            <flux:callout.heading>Right now we only suport the <code>github</code> provider</flux:callout.heading>
            <flux:callout.text>
                Using the GitHub provider you'll need to have a GITHUB_TOKEN in your <code>.env</code> file or passed along with the publisher command. The token must have `Contents` -> `Read and write` permissions for the repository you're publishing to.
            </flux:callout.text>
        </flux:callout>

        <h2>
            Configuration
        </h2>

        <p>When using the updater it is required to use a `phpacker.json` file for configuring your builds. Please read more about the available configuration options <a href="/docs/configuration">here</a>.

        Then add the following to the your `phpacker.json`:</p>

        <x-code language="json">
{
    "filename": "my-app", // optional
    "publisher": {
        "version": "0.5", // current semver of your build
        "provider": "github",
        "github_branch": "main",
        "github_repo": "your-repo",
        "github_owner": "your-org"
    }
        </x-code>



        <h2>
            Publishing workflow
        </h2>

        <p>At minimum you have to follow these steps to publish a release:</p>

        <ol class="list-decimal">
            <li>Use a `phpacker.json` file to configure your your updater provider</li>
            <li>Make sure you've bumped the current version in `phpacker.json`</li>
            <li>Build your executables with PHPacker</li>
            <li>Push your code, so the source is up to date with the published executables</li>
        </ol>

        <p>Then run the cli-tool <code>./vendor/bin/phpacker-publisher release</code></p>

        <p>It'll detect your config, create checksums and zip everything up before creating a draft release in GitHub. Make sure to publish the release when you're ready.</p>

        <flux:callout icon="sparkles" color="purple" class="my-12">
            <flux:callout.heading>You can use a release-only repository</flux:callout.heading>
            <flux:callout.text>
                If your source code is private you may use a different repository to host your releases
            </flux:callout.text>
        </flux:callout>

        <h3>
            Example
        </h3>

        <p>
            A full build & publish scripts using
            <a
                href="https://github.com/box-project/box"
                target="_blank"
                rel="noopener noreferrer"
            >
                humbug/box
            </a> to compile our phar might look something like this.
        </p>

        <x-code language="json">
"scripts": {
    "build": [
        "cpx box compile",
        "vendor/bin/phpacker build"
    ],
    "release": [
        "@composer run-script build",
        "vendor/bin/phpacker-publisher release --no-interaction --verbose"
    ]
}
        </x-code>

        Please mind that the <code>phpacker.json</code> file needs to be included in your build when you plan on integrating the <code>self-update</code> mechanism. You can make sure box includes it by adding it to your <code>box.json</code> file:

        <x-code language="json">
{
    "main": "bin/my-app",
    "output": "build/phpacker.phar",
    "files": [
        "phpacker.json"
    ]
}
        </x-code>


    </x-prose>
</x-layouts.docs>
