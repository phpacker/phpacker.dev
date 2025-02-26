<x-layouts.docs title="Installation - phpacker">

    <flux:heading size="xl" level="1">Configuration</flux:heading>

    <flux:subheading size="lg" class="max-w-prose">Using a config file you are able to predefine any argument or option otherwise passed to the build command. This way you can have all parameters for your project in a single version tracked file.</flux:subheading>

    <flux:separator variant="subtle" class="my-6" />


    <div class="max-w-prose prose-zinc prose-sm">

        <p>By using this method you'll be able to run the build command without providing any input:</p>

        <x-code language='shell'>
            phpacker build
        </x-code>

        <flux:heading size="lg" level="2">JSON Configuration (phpacker.json)</flux:heading>

        <p>Place a phpacker.json file in your project root to define build settings:</p>

        <x-code language='json'>
{
    "src": "./bin/app.phar",
    "dest": "./build",
    "ini": "./phpacker.ini",
    "platform": "all",
    "php": "8.4",
    "repository": "optional/custom-php-bin-repo"
}
        </x-code>

        <p>PHPacker will look for a config file in the following order:</p>

        <ol class="list-decimal">
            <li>Custom path specified via --config=path/to/file.json</li>
            <li>phpacker.json in the source directory via --src option</li>
            <li>phpacker.json in the current working directory</li>
        </ol>

        <flux:heading size="lg" level="2">PHP INI Configuration</flux:heading>

        <p>Similarly PHPacker will look for ini configuration in the following order:</p>

        <ol class="list-decimal">
            <li>Custom path specified via --ini=path/to/file.ini</li>
            <li>Path specified in used config file</li>
            <li>phpacker.ini in the source directory via --src option</li>
            <li>phpacker.ini in the current working directory</li>
            <li>Interactive prompt if --ini is passed without a value</li>
        </ol>

    </div>

</x-layouts.docs>
