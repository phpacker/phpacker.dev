<x-layouts.docs title="Custom PHP Builds - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Custom PHP Builds
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        Need specific PHP extensions not included in the default binaries? Create custom PHP builds with exactly the extensions your application requires using our
        <a
            href="https://github.com/phpacker/php-bin"
            target="_blank"
            rel="noopener noreferrer"
        >
            php-bin
        </a>
        template repository.
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
            Creating Custom Builds
        </flux:heading>

        <ol class="list-decimal">
            <li>
                <strong>Fork the repository:</strong> Start by forking the
                <a
                    href="https://github.com/phpacker/php-bin"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    php-bin
                </a>
                repository to your GitHub account
            </li>
            <li>
                <strong>Configure extensions:</strong> Edit <code>php-extensions.txt</code> to add or remove extensions. See
                <a
                    href="https://static-php.dev/en/guide/extensions.html"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    supported extensions
                </a>
                for available options
            </li>
            <li><strong>Set up GitHub token:</strong> Add a GitHub token with repository access to your fork's secrets</li>
            <li><strong>Build binaries:</strong> Trigger the GitHub Actions workflow to compile PHP binaries for all platforms</li>
            <li><strong>Create release:</strong> Tag a version to make the binaries available for PHPacker</li>
        </ol>

        <flux:heading
            size="lg"
            level="2"
        >
            Using a custom build
        </flux:heading>

        <p>Use custom builds by specifying your repository:</p>

        <x-code language="shell">phpacker build all --binary-src="your-org/php-bin"</x-code>

        <p>Or from a config file:</p>

        <!-- prettier-ignore -->
        <x-code language="json" >
{
  "binary_src": "your-org/php-bin"
}
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Using Private Repositories
        </flux:heading>

        <p>To use a private <code>php-bin</code> repository, create a <code>.env</code> file in your project root with a GitHub token:</p>

        <x-code language="shell"># .env file
GITHUB_TOKEN=ghp_your_github_token_here</x-code>

        <p>The token needs read access to your private repository containing the PHP binaries.</p>

    </x-prose>
</x-layouts.docs>
