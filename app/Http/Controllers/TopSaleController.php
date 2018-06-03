<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
// use App\Services\ProfileService;
use App\Services\TopSaleService;
use App\ViewModels\TopSaleViewModel;
use JavaScript;

/**
 * Class TopSaleController
 * @package App\Http\Controllers
 */
class TopSaleController extends LayoutController
{
    /**
     * @var TopSaleService
     */
    protected $topSaleService;

    public function __construct(TopSaleService $topSaleService)
    {
        $this->topSaleService = $topSaleService;
    }

    public function index(string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new TopSaleViewModel('top-sale', $language, 'default', 1);

        $this->topSaleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.top-sale', compact('model'));
    }

    public function indexSort(string $sort, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new TopSaleViewModel('top-sale', $language, $sort, 1);

        $this->topSaleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.top-sale', compact('model'));
    }

    public function indexPagination($page, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new TopSaleViewModel('top-sale', $language, 'default', $page);

        $this->topSaleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.top-sale', compact('model'));
    }

    public function indexPaginationSort($sort, $page, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new TopSaleViewModel('top-sale', $language, $sort, $page);

        $this->topSaleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.top-sale', compact('model'));
    }
}
