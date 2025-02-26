<x-layouts.docs title="Installation - phpacker">

    <flux:heading size="xl" level="1">Installation</flux:heading>

    <flux:subheading size="lg" class="max-w-prose">PHPacker enables you to package any PHP script or PHAR into a standalone, cross-platform executable. It handles all the complexity of bundling PHP runtime with your application, making distribution simple and hassle-free.</flux:subheading>

    <flux:separator variant="subtle" class="my-6" />


    <x-prose>

        <flux:heading size="lg" level="2">Installation</flux:heading>

        <p>You can install PHPacker globally via Composer:</p>

        <x-code language='shell'>
            composer global require phpacker/phpacker
        </x-code>

        <p>Or as a project dependency:</p>

        <x-code language='shell'>
            composer require phpacker/phpacker --dev
        </x-code>

        <flux:heading size="lg" level="2">Quick Start</flux:heading>

        <p>Build an executable from your PHP script with a single command:</p>

        <x-code language='shell'>
            phpacker build --src=./app.php
        </x-code>

    </x-prose>


</x-layouts.docs>
