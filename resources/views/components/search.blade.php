<div {{ $attributes }}>
    <div id="docsearch"></div>

    <flux:input
        kbd="⌘K"
        as="button"
        variant="filled"
        placeholder="Search..."
        icon="magnifying-glass"
        x-on:click="document.querySelector('#docsearch .DocSearch-Button').click()"
    />
</div>
