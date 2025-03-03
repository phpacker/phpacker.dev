<x-layouts.app
    title="phpacker"
    class="dark:bg-gradient-to-b dark:from-zinc-900 dark:to-zinc-700"
>
    <flux:main>
        {{-- Hero --}}
        <div class="flex h-screen items-center justify-center">
            <div class="flex">
                <div class="flex w-lg max-w-full flex-col sm:w-xl">
                    <h1 class="mb-6 text-center text-3xl leading-snug font-extrabold tracking-wide sm:text-6xl">
                        <x-svg.logo class="mr-1 inline size-7 -translate-y-0.5 sm:size-14" />
                        Self-contained
                        <br />
                        PHP executables
                    </h1>

                    <h2 class="text-center text-xl font-extrabold tracking-wide sm:text-4xl">build once, run anywhere</h2>

                    <div class="mt-16 flex flex-col items-center justify-center space-y-3 space-x-4 sm:flex-row sm:space-y-0">
                        <flux:button
                            icon="arrow-down-tray"
                            href="/docs/installation"
                        >
                            Get PHPacker now!
                        </flux:button>

                        <flux:button
                            href="#in-action"
                            icon-trailing="arrow-down"
                            variant="ghost"
                        >
                            See it in action
                        </flux:button>
                    </div>
                </div>

                <div class="hidden sm:block">
                    <x-svg.wiggly-arrow class="text-brand sm:mr4 ml-4 h-64 sm:h-80" />
                </div>
            </div>
        </div>

        <div
            id="in-action"
            class="flex items-center justify-center pt-10"
        >
            <div
                x-data="{
                    src: null,
                    play() {
                        const gif = '/cli-demo.gif'
                        this.src = gif + '?t=' + Math.floor(Date.now() / 1000)
                        this.playing = true
                    },
                }"
                x-init="play()"
                x-intersect.enter.half.once="play()"
                x-title="phpacker-demo"
                class="relative w-3xl max-w-full flex-col overflow-hidden rounded-lg bg-[#0C182D] shadow-lg"
            >
                <div class="flex space-x-1.5 px-2 py-3">
                    <div class="size-3 rounded-full bg-red-500 opacity-80"></div>
                    <div class="size-3 rounded-full bg-yellow-500 opacity-90"></div>
                    <div class="size-3 rounded-full bg-green-500 opacity-80"></div>
                </div>

                <img
                    x-show="src"
                    :src="src"
                    alt="PHPacker demo"
                    class="w-[522px] max-w-full"
                />

                <div class="absolute right-3 bottom-3">
                    <flux:button
                        x-on:click="play()"
                        icon="play"
                        size="xs"
                        variant="subtle"
                        tooltip="Replay demo"
                    />
                </div>
            </div>
        </div>

        <div class="mt-20 mb-10 flex justify-center md:mt-60">
            <div class="max-w-6xl rounded-xl bg-slate-100 px-6 py-20 text-slate-700 dark:bg-white">
                <!-- Intro -->
                <div class="mt-6 flex flex-col items-center justify-center space-y-10 md:mx-24">
                    <h2 class="text-center text-3xl">Package PHP Apps Without the Hassle</h2>

                    <p class="max-w-2xl text-center text-lg">PHPacker enables you to package any PHP script or PHAR into a standalone, cross-platform executable. It handles all the complexity of bundling PHP with your application, making distribution simple and hassle-free.</p>
                </div>

                <hr class="mx-8 my-14 text-slate-300 md:mx-20 md:my-24 dark:text-slate-200" />

                <!-- Grid -->
                <div class="grid grid-cols-1 gap-x-0 gap-y-12 pr-6 sm:gap-x-5 md:grid-cols-2 md:gap-x-20 md:pr-0 lg:mx-24">
                    <!-- Feature 1 -->
                    <div class="flex space-x-5 sm:space-x-6">
                        <div>
                            <x-svg.logo class="size-6 sm:size-10" />
                        </div>

                        <div>
                            <h3 class="mb-2 font-semibold">Self-Contained Executables</h3>
                            <p>Distribute your CLI app as a single file - PHP is bundled with your application, eliminating compatibility issues.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex space-x-4 sm:space-x-5">
                        <div>
                            <x-svg.pitch.cpu class="text-brand size-7 sm:size-11" />
                        </div>

                        <div>
                            <h3 class="mb-2 font-semibold">Cross-Platform Support</h3>
                            <p>Build executables for macOS, Linux, and Windows from a single codebase - deploy anywhere without platform-specific adjustments.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex space-x-5 sm:space-x-6">
                        <div>
                            <x-svg.pitch.brackets class="text-brand size-6 sm:size-10" />
                        </div>

                        <div>
                            <h3 class="mb-2 font-semibold">Project Configuration</h3>
                            <p>Store build and INI settings in version-controlled files - ensure consistent builds across teams and CI/CD pipelines.</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex space-x-4 sm:space-x-5">
                        <div>
                            <x-svg.pitch.php class="text-brand size-7 sm:size-11" />
                        </div>

                        <div>
                            <h3 class="mb-2 font-semibold">Multiple PHP Versions</h3>
                            <p>Choose from PHP 8.2, 8.3, or 8.4 to match your application's requirements or take advantage of latest features.</p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="flex space-x-5 sm:space-x-6">
                        <div>
                            <x-svg.pitch.update class="text-brand size-6 sm:size-10" />
                        </div>

                        <div>
                            <h3 class="mb-2 font-semibold">Automated Updates</h3>
                            <p>Keep your PHP runtime binaries up-to-date with a simple command - always build with the latest improvements.</p>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="flex space-x-5 sm:space-x-6">
                        <div>
                            <x-svg.pitch.binary class="text-brand size-6 sm:size-10" />
                        </div>

                        <div>
                            <h3 class="mb-2 font-semibold">Custom PHP Binaries</h3>
                            <p>Use your own custom-built PHP binaries with specific extensions by pointing to your forked repository.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="group mt-36 mb-10 text-center text-sm tracking-wide opacity-90">
            <a
                href="http://leuver.ink"
                target="_blank"
                rel="noopener noreferrer"
            >
                Made with
                <x-svg.heart class="group-hover:text-brand mx-0.5 inline size-5" />
                for the PHP community by
                <strong class="group-hover:text-brand">Willem Leuverink</strong>
            </a>
        </div>
    </flux:main>
</x-layouts.app>
