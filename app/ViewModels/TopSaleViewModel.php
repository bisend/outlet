<?php

namespace App\ViewModels;

use App\Helpers\ProductsSort;

/**
 * Class TopSaleViewModel
 * @package App\ViewModels
 */
class TopSaleViewModel extends LayoutViewModel
{
    /**
     * @var string
     */
    public $sort;

    /**
     * @var ProductsSort
     */
    public $sortItems;

    //pagination fields
    /**
     * @var int
     */
    public $limit = 24;

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var int
     */
    public $offset;

    /**
     * @var int
     */
    public $countProducts;

    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    public $products;

    /**
     * TopSaleViewModel constructor.
     * @param string $view
     * @param string $language
     * @param string $sort
     * @param $page
     */
    public function __construct(string $view, string $language, string $sort, $page)
    {
        parent::__construct($view, $language);

        $this->sort = $sort;

        $this->page = $page;

        $this->sortItems = new ProductsSort(null, null, $page, $language, $this->sort);

        $this->offset = ($this->page - 1) * $this->limit;
    }
}
