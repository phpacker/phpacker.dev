<?php

namespace App;

class Support
{
    public static function getNextPage($currentUrl)
    {
        // Flatten the navigation structure to include nested submenu items
        // This converts ['Distribution' => ['Publisher CLI' => '/', 'Self-update' => '/']]
        // to ['Publisher CLI' => '/', 'Self-update' => '/'] while preserving top-level items
        $pages = \collect(\config('navigation'))
            ->flatMap(function ($value, $key) {
                return is_array($value) ? $value : [$key => $value];
            });

        // Find the key for the current URL in our flattened navigation
        $currentKey = $pages->search($currentUrl);

        // If current URL is not found in navigation, return null
        if ($currentKey === false) {
            return null;
        }

        $pagesArray = $pages->toArray();
        $keys = array_keys($pagesArray);
        $values = array_values($pagesArray);

        // Find the numeric index of the current page in the array
        $currentIndex = array_search($currentKey, $keys);

        // If we can't find the index or we're at the last page, return null
        if ($currentIndex === false || $currentIndex + 1 >= count($keys)) {
            return null;
        }

        // Get the next page's key and URL
        $nextKey = $keys[$currentIndex + 1];
        $nextValue = $values[$currentIndex + 1];

        // Return array with [page title, page URL]
        return [$nextKey, $nextValue];
    }
}
