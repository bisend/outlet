<?php

namespace App\Services;

use App\Helpers\Paginator;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\ViewModels\TopSaleViewModel;

/**
 * Class TopSaleService
 * @package App\Services
 */
class TopSaleService extends LayoutService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * TopSaleService constructor.
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        parent::__construct($categoryRepository);

        $this->productRepository = $productRepository;
    }

    /**
     * @param TopSaleViewModel $model
     */
    public function fill($model)
    {
        parent::fill($model); // TODO: Change the auto generated stub

        $this->fillProducts($model);

        $this->fillCountProducts($model);

        $this->fillMetaTags($model);

        $this->fillSeoTags($model);
    }

    /**
     * @param TopSaleViewModel $model
     */
    public function fillProducts($model)
    {
        $model->products = $this->productRepository->getAllTopSaleProducts($model);

        if (!is_null($model->products) && $model->products->count() > 0)
        {
            foreach ($model->products as $product)
            {
                $product->currentSizeId = $product->sizes[0]->id;
            }
        }
    }

    /**
     * @param TopSaleViewModel $model
     */
    public function fillCountProducts($model)
    {
        $model->countProducts = $this->productRepository->getCountAllTopSaleProducts($model);
    }

    /**
     * @param TopSaleViewModel $model
     */
    private function fillMetaTags($model)
    {
        $model->title = trans('home.top-sale');
        $model->description = trans('home.top-sale');
        $model->keywords = trans('home.top-sale');
        $model->h1 = trans('home.top-sale');
    }

    /**
     * @param TopSaleViewModel $model
     */
    private function fillSeoTags($model)
    {
        $pages = Paginator::createPagination($model->page, $model->limit, $model->countProducts);

        $isPrev = array_shift($pages);
        $isNext = array_pop($pages);

        if ($isPrev) {
            $model->metaLinkPrev = url_novelty_per_page($model->sort, $model->page - 1, $model->language);
        }

        if ($isNext) {
            $model->metaLinkNext = url_novelty_per_page($model->sort, $model->page + 1, $model->language);
        }

        if (((int)$model->page) > 1) {
            $model->setNoIndex = true;
        } else if ($model->sort != 'default') {
            $model->setNoIndex = true;
        }
    }
}
