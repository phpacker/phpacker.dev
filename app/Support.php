<?php

namespace App;

class Support
{
    public static function getNextPage($currentUrl)
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
}
