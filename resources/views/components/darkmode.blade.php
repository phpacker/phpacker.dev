<button
    x-data
    x-cloak
    x-title="darkmode-toggle"
    x-on:click="$flux.dark = ! $flux.dark"
    :aria-checked="$flux.dark"
    :class="$flux.dark ? 'bg-zinc-600' : 'bg-zinc-300'"
    :aria-label="$flux.dark ? 'Disable darkmode' : 'Enable darmode'"
    class="relative inline-flex w-11 rounded-full py-1 transition"
    type="button"
    role="switch"
>
    {{-- heroicon-m-sun --}}
    <svg
        x-show="$flux.dark"
        x-transition
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
        class="absolute left-1 h-4 w-4 text-zinc-300"
        fill="currentColor"
    >
        <path
            d="M10 2a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 2zM10 15a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 15zM10 7a3 3 0 100 6 3 3 0 000-6zM15.657 5.404a.75.75 0 10-1.06-1.06l-1.061 1.06a.75.75 0 001.06 1.06l1.06-1.06zM6.464 14.596a.75.75 0 10-1.06-1.06l-1.06 1.06a.75.75 0 001.06 1.06l1.06-1.06zM18 10a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 0118 10zM5 10a.75.75 0 01-.75.75h-1.5a.75.75 0 010-1.5h1.5A.75.75 0 015 10zM14.596 15.657a.75.75 0 001.06-1.06l-1.06-1.061a.75.75 0 10-1.06 1.06l1.06 1.06zM5.404 6.464a.75.75 0 001.06-1.06l-1.06-1.06a.75.75 0 10-1.061 1.06l1.06 1.06z"
        />
    </svg>

    {{-- heroicon-m-moon --}}
    <svg
        x-show="!$flux.dark"
        x-transition
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
        class="absolute right-1 h-4 w-4 text-zinc-400"
        fill="currentColor"
    >
        <path
            fill-rule="evenodd"
            d="M7.455 2.004a.75.75 0 01.26.77 7 7 0 009.958 7.967.75.75 0 011.067.853A8.5 8.5 0 116.647 1.921a.75.75 0 01.808.083z"
            clip-rule="evenodd"
        />
    </svg>

    {{-- toggle indicator --}}
    <span
        :class="$flux.dark ? 'translate-x-6' : 'translate-x-1'"
        class="h-4 w-4 rounded-full bg-white shadow-md transition"
        aria-hidden="true"
    ></span>
</button>
