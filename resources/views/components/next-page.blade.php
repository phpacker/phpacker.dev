@use('App\Support')

@php
    [$label, $href] = Support::getNextPage('/' . request()->path());
@endphp

@if ($href)
    <div {{ $attributes->merge(['class' => 'mt-auto pt-10 max-w-3xl relative']) }}>
        <div class="flex justify-end">
            <a
                href="{{ $href }}"
                class="flex items-center space-x-3 p-4 text-sm"
            >
                <span>Up next: {{ $label }}</span>
                <x-svg.arrowhead class="text-brand size-4 -rotate-90" />
            </a>
        </div>
    </div>
@endif
