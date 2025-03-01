<div>
    <pre class="group-[.dark]/html:hidden"><x-torchlight-code {{ $attributes->class('text-sm select-all') }} theme="serendipity-light" >
{{ $slot }}
    </x-torchlight-code></pre>

    <pre class="hidden group-[.dark]/html:block"><x-torchlight-code {{ $attributes->class('text-sm select-all') }} theme="winter-is-coming-blue" >
{{ $slot }}
    </x-torchlight-code></pre>
</div>
