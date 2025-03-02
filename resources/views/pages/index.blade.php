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

            <div class="p-6 rounded-lg bg-slate-100 dark:bg-white max-w-6xl text-slate-700">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-12 gap-x-20 mx-24 my-14">

                    <!-- Feature 1 -->
                    <div>
                        <h3 class="font-semibold leading-7">Cross-Platform Support</h3>
                        <p>Build executables for macOS, Linux, and Windows from a single codebase - deploy anywhere without platform-specific adjustments.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div>
                        <h3 class="font-semibold leading-7">Self-Contained Deployments</h3>
                        <p>Distribute your application as a single file - PHP is bundled with your application, eliminating compatibility issues.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div>
                        <h3 class="font-semibold leading-7">Project Configuration</h3>
                        <p>Store build settings in version-controlled files - ensure consistent builds across teams and CI/CD pipelines.</p>
                    </div>

                    <!-- Feature 4 -->
                    <div>
                        <h3 class="font-semibold leading-7">Multiple PHP Versions</h3>
                        <p>Choose from PHP 8.2, 8.3, or 8.4 to match your application's requirements or take advantage of latest features.</p>
                    </div>

                    <!-- Feature 5 -->
                    <div>
                        <h3 class="font-semibold leading-7">Automated Updates</h3>
                        <p>Keep your PHP runtime binaries up-to-date with a simple command - always build with the latest improvements.</p>
                    </div>

                    <!-- Feature 6 -->
                    <div>
                        <h3 class="font-semibold leading-7">Custom PHP Runtimes</h3>
                        <p>Use your own custom-built PHP binaries with specific extensions by pointing to your forked repository.</p>
                    </div>








                </div>
            </div>

        </div>

    </flux:main>
</x-layouts.app>
