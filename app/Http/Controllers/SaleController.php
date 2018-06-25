<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\SaleService;
use App\ViewModels\SaleViewModel;
use JavaScript;

// use App\Services\ProfileService;

class SaleController extends LayoutController
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index(string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SaleViewModel('sale', $language, 'default', 1);

        $this->saleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        // Puts trans for JS
        $this->putJavaScriptTrans($model->view);

        return view('pages.sale', compact('model'));
    }

    public function indexSort(string $sort, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SaleViewModel('sale', $language, $sort, 1);

        $this->saleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        // Puts trans for JS
        $this->putJavaScriptTrans($model->view);

        return view('pages.sale', compact('model'));
    }

    public function indexPagination($page, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SaleViewModel('sale', $language, 'default', $page);

        $this->saleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        // Puts trans for JS
        $this->putJavaScriptTrans($model->view);

        return view('pages.sale', compact('model'));
    }

    public function indexPaginationSort($sort, $page, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new SaleViewModel('sale', $language, $sort, $page);

        $this->saleService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        // Puts trans for JS
        $this->putJavaScriptTrans($model->view);

        return view('pages.sale', compact('model'));
    }
}
