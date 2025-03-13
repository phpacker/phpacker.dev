<x-layouts.docs title="Execution Context - phpacker">
    <flux:heading
        size="xl"
        level="1"
    >
        Detecting Execution Context
    </flux:heading>

    <flux:subheading
        size="lg"
        class="max-w-prose"
    >
        PHPacker provides built-in environment detection so you can adapt your application's behavior based on whether it's running locally or in a build.
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
            Environment Detection
        </flux:heading>

        <p>
            PHPacker automatically injects a
            <code>PHPACKER_ENV</code>
            environment variable into your application's runtime. This variable indicates whether your application is:
        </p>

        <ul class="list-disc">
            <li>
                Running locally during development (
                <code>local</code>
                )
            </li>
            <li>
                Running from a compiled distribution binary (
                <code>production</code>
                )
            </li>
        </ul>

        <p>
            You can access this variable using PHP's standard
            <code>getenv()</code>
            function:
        </p>

        <!-- prettier-ignore -->
        <x-code language="php" >
$environment = getenv('PHPACKER_ENV'); // Returns 'local' or 'production'
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Common Use Cases
        </flux:heading>

        <p>This environment detection enables several powerful patterns:</p>

        <ol class="list-decimal">
            <li>
                <strong>Error Handling</strong>
                : Display detailed error information during development while showing user-friendly error pages in production
            </li>
            <li>
                <strong>Performance Optimization</strong>
                : Enable caching and other optimizations in production while keeping development more dynamic
            </li>
            <li>
                <strong>Feature Toggling</strong>
                : Activate debugging tools or development-only features in local environments
            </li>
        </ol>

        <p>Below you see a example on toggling the bootstrapping of the popular Collision package based on execution context:</p>

        <!-- prettier-ignore -->
        <x-code language="php" >
use NunoMaduro\Collision\Provider;

if(getenv('PHPACKER_ENV') === 'local')
    (new Provider)->register();
}
        </x-code>

        <flux:heading
            size="lg"
            level="2"
        >
            Caveats
        </flux:heading>

        <p>
            The environment variable will always be detected in
            <code>production</code>
            builds.
        </p>

        <p>
            The
            <code>local</code>
            environment is always detected in apps that use the composer autoloader. However, without the autoloader present the environment is not automatically injected.
        </p>

        <p>If this applies to you, please consider these alternatives:</p>

        <!-- prettier-ignore -->
        <x-code language="php" >
// Inverting the 'production' conditional
if(getenv('PHPACKER_ENV') !== 'production')
    //
}

// Detect the SAPI ('micro' in builds)
if(php_sapi_name() === 'micro')
    //
}
        </x-code>
    </x-prose>
</x-layouts.docs>
