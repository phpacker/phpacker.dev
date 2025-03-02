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

        <div id="in-action" class="flex items-center justify-center">
            <div x-data="{
                    src: null,
                    play() {
                        const gif = '/cli-demo.gif'
                        this.src = gif + '?t=' + Math.floor(Date.now() / 1000)
                        this.playing = true
                    }
                }"
                x-intersect.enter.half.once="play()"
                x-title="phpacker-demo"
                class="relative bg-[#0C182D] w-lg max-w-full flex-col sm:w-xl rounded-lg overflow-hidden"
                :class="{
                    'aspect-[1.10161225544]': !this.src //
                }"
            >
                <div class="flex space-x-1.5 py-2 px-1.5">
                    <div class="rounded-full size-3 bg-red-500 opacity-80"></div>
                    <div class="rounded-full size-3 bg-yellow-500 opacity-90"></div>
                    <div class="rounded-full size-3 bg-green-500 opacity-80"></div>
                </div>

                <img x-show="src" :src="src" alt="PHPacker demo" class="w-full">

                <div class="absolute right-3 bottom-3">
                    <flux:button x-on:click="play()" icon="play" size="xs" variant="subtle" />
                </div>
            </div>
        </div>

    </flux:main>
</x-layouts.app>
