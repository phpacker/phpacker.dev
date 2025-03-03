<x-layouts.app
    title="phpacker"
    class="dark:bg-gradient-to-b dark:from-zinc-900"
>
    <flux:main>
        {{-- Hero --}}
        <div class="flex h-screen items-center justify-center">
            <div class="flex w-lg max-w-full flex-col sm:w-xl">
                <h1 class="mb-6 text-center text-3xl leading-snug font-extrabold tracking-wide sm:text-6xl">
                    <x-svg.logo class="size-7 sm:size-14 mr-1 -translate-y-0.5 inline" />
                    Self-contained <br> PHP executables
                </h1>

                <h2 class="text-center text-xl font-extrabold tracking-wide sm:text-4xl">build once, run anywhere</h2>

                <div class="flex mt-16 justify-center space-x-4">

                    <flux:button icon="arrow-down-tray" href="/docs/installation">
                        Get PHPacker now!
                    </flux:button>

                    <flux:button href="#in-action" icon-trailing="arrow-down" variant="subtle">
                        See it in action
                    </flux:button>

                </div>
            </div>
        </div>

        <div id="in-action" class="pt-10 flex items-center justify-center">
            <div x-data="{
                    src: null,
                    play() {
                        const gif = '/cli-demo.gif'
                        this.src = gif + '?t=' + Math.floor(Date.now() / 1000)
                        this.playing = true
                    }
                }"
                x-init="play()"
                x-intersect.enter.half.once="play()"
                x-title="phpacker-demo"
                class="relative bg-[#0C182D] max-w-full flex-col w-3xl rounded-lg overflow-hidden"
            >
                <div class="flex space-x-1.5 py-2 px-1.5">
                    <div class="rounded-full size-3 bg-red-500 opacity-80"></div>
                    <div class="rounded-full size-3 bg-yellow-500 opacity-90"></div>
                    <div class="rounded-full size-3 bg-green-500 opacity-80"></div>
                </div>

                <img x-show="src" :src="src" alt="PHPacker demo" class="w-[522px] max-w-full">

                <div class="absolute right-3 bottom-3">
                    <flux:button x-on:click="play()" icon="play" size="xs" variant="subtle" />
                </div>
            </div>
        </div>


        <div class="flex mb-10 mt-60 justify-center">

            <div class="px-6 py-20 rounded-xl bg-slate-100 dark:bg-white max-w-6xl text-slate-700">

                <!-- Intro -->
                <div class="mt-6 md:mx-24 space-y-10">

                    <h2 class="text-3xl text-center">
                        Package PHP Apps Without the Hassle
                    </h2>

                    <p class="text-lg text-center">
                        PHPacker enables you to package any PHP script or PHAR into a standalone, cross-platform executable. It handles all the complexity of bundling PHP with your application, making distribution simple and hassle-free.
                    </p>

                </div>

                <hr class="my-24 mx-8 md:mx-20 text-slate-300 dark:text-slate-200" />

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-12 gap-x-0 sm:gap-x-5 md:gap-x-20 lg:mx-24">

                    <!-- Feature 1 -->
                    <div class="flex space-x-6">
                        <div>
                            <x-svg.logo class="size-10" />
                        </div>

                        <div>
                            <h3 class="font-semibold mb-2">Self-Contained Executables</h3>
                            <p>Distribute your CLI app as a single file - PHP is bundled with your application, eliminating compatibility issues.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex space-x-5">
                        <div>
                            <x-svg.pitch.cpu class="size-11 text-brand" />
                        </div>

                        <div>
                            <h3 class="font-semibold mb-2">Cross-Platform Support</h3>
                            <p>Build executables for macOS, Linux, and Windows from a single codebase - deploy anywhere without platform-specific adjustments.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex space-x-6">
                        <div>
                            <x-svg.pitch.brackets class="size-10 text-brand" />
                        </div>

                        <div>
                            <h3 class="font-semibold mb-2">Project Configuration</h3>
                            <p>Store build and INI settings in version-controlled files - ensure consistent builds across teams and CI/CD pipelines.</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex space-x-5">
                        <div>
                            <x-svg.pitch.php class="size-11 text-brand" />
                        </div>

                        <div>
                            <h3 class="font-semibold mb-2">Multiple PHP Versions</h3>
                            <p>Choose from PHP 8.2, 8.3, or 8.4 to match your application's requirements or take advantage of latest features.</p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="flex space-x-6">
                        <div>
                            <x-svg.pitch.update class="size-10 text-brand" />
                        </div>

                        <div>
                            <h3 class="font-semibold mb-2">Automated Updates</h3>
                            <p>Keep your PHP runtime binaries up-to-date with a simple command - always build with the latest improvements.</p>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="flex space-x-6">
                        <div>
                            <x-svg.pitch.binary class="size-10 text-brand" />
                        </div>

                        <div>
                            <h3 class="font-semibold mb-2">Custom PHP Binaries</h3>
                            <p>Use your own custom-built PHP binaries with specific extensions by pointing to your forked repository.</p>
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <div class="text-center mt-36 mb-12 text-sm tracking-wide group">
            <a href="http://leuver.ink" target="_blank" rel="noopener noreferrer">
                Made with <x-svg.heart class="inline size-5 mx-0.5 group-hover:text-brand" /> for the PHP community by <strong class="group-hover:text-brand">Willem Leuverink</strong>
            </a>
        </div>

    </flux:main>
</x-layouts.app>
