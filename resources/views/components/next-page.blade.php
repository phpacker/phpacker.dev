@php
    function getNextPage($currentUrl)
    {
        $pages = config('navigation');

        // Loop until we find our current key
        while (current($pages) !== $currentUrl && current($pages) !== null) {
            next($pages);
        }

        // Move to the next element
        next($pages);

        // Get the key and value of the next element
        $nextKey = key($pages);
        $nextValue = current($pages);

        // If next key is null, we were at the end of the array
        if ($nextKey === null) {
            return null; // Or handle this case as you prefer
        }

        return [$nextKey, $nextValue];
    }
@endphp

@php
    [$label, $href] = getNextPage('/' . request()->path());
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
