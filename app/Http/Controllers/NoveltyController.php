<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
// use App\Services\ProfileService;
use App\Services\NoveltyService;
use App\ViewModels\NoveltyViewModel;
use JavaScript;

/**
 * Class NoveltyController
 * @package App\Http\Controllers
 */
class NoveltyController extends LayoutController
{
    /**
     * @var NoveltyService
     */
    protected $noveltyService;

    public function __construct(NoveltyService $noveltyService)
    {
        $this->noveltyService = $noveltyService;
    }

    public function index(string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new NoveltyViewModel('novelty', $language, 'default', 1);

        $this->noveltyService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.novelty', compact('model'));
    }

    public function indexSort(string $sort, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new NoveltyViewModel('novelty', $language, $sort, 1);

        $this->noveltyService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.novelty', compact('model'));
    }

    public function indexPagination($page, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new NoveltyViewModel('novelty', $language, 'default', $page);

        $this->noveltyService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.novelty', compact('model'));
    }

    public function indexPaginationSort($sort, $page, string $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new NoveltyViewModel('novelty', $language, $sort, $page);

        $this->noveltyService->fill($model);

        \Debugbar::info($model);

        JavaScript::put([
            'products' => $model->products,
            'sortItems' => $model->sortItems->items
        ]);

        return view('pages.novelty', compact('model'));
    }
}
