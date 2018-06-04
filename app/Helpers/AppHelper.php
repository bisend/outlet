<?php

/**
 * Create pagination helper
 */
if (!function_exists('create_pagination')) {
    function create_pagination($page = 1, $itemsPerPage = null, $totalItemsCount = null)
    {
        return \App\Helpers\Paginator::createPagination($page, $itemsPerPage, $totalItemsCount);
    }
}

/**
 * Create pagination helper
 */
if (!function_exists('get_url_language')) {
    function get_url_language($language)
    {
        if ($language == \App\Helpers\Languages::DEFAULT_LANGUAGE) {
            return '';
        }

        return $language;
    }
}
