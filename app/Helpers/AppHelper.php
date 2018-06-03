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
