<?php

namespace App;

class Support
{
    public static function getNextPage($currentUrl)
    {
        // Flatten the navigation structure to include nested submenu items
        // This converts ['Distribution' => ['Publisher CLI' => ['href' => '/'], 'Self-update' => ['href' => '/']]]
        // to ['Publisher CLI' => ['href' => '/'], 'Self-update' => ['href' => '/']] while preserving top-level items
        $pages = collect(config('navigation'))
            ->flatMap(function ($value, $key) {
                // If it has an 'href' key, it's a page config
                if (isset($value['href'])) {
                    return [$key => $value];
                }
                // Otherwise, it's a nested menu, return its items
                return $value;
            });

        // Find the key for the current URL in our flattened navigation
        $currentKey = $pages->search(function ($pageConfig) use ($currentUrl) {
            return $pageConfig['href'] === $currentUrl;
        });

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
        $nextPageConfig = $values[$currentIndex + 1];

        // Return array with [page title, page URL]
        return [$nextKey, $nextPageConfig['href']];
    }
}
