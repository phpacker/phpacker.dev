<x-layouts.docs title="Custom PHP Builds - phpacker">

    <flux:heading size="xl" level="1">Custom PHP Builds</flux:heading>

    <flux:subheading size="lg" class="max-w-prose">PHPacker supports custom PHP builds with specific extensions through our <a href="https://github.com/phpacker/php-bin" target="_blank" rel="noopener noreferrer">php-bin</a> repository.</flux:subheading>

    <flux:separator variant="subtle" class="my-6" />


    <div class="max-w-prose prose-zinc prose-sm">

        <p>
            To create a custom build:
        </p>

        <ol class="list-decimal">
            <li>Fork the <a href="https://github.com/phpacker/php-bin" target="_blank" rel="noopener noreferrer">php-bin</a> repository</li>
            <li>Modify php-extensions.txt (<a href="https://static-php.dev/en/guide/extensions.html" target="_blank" rel="noopener noreferrer">supported extensions</a>)</li>
            <li>Run the GitHub Workflows</li>
            <li>Tag a release</li>
        </ol>

        <p>
            Use custom builds by specifying your repository:
        </p>

        <x-code language='shell'>
            phpacker build all --repository="your-org/php-bin"
        </x-code>

        <p>
            Or from a config file:
        </p>

        <x-code language='json'>
{
  "repository": "your-org/php-bin"
}
        </x-code>

    </div>


</x-layouts.docs>
