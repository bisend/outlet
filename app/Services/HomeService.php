<?php

namespace App\Services;

use App\Repositories\BannerRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MainSliderRepository;
use App\Repositories\MetaTagRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PromotionRepository;

/**
 * Class HomeService
 * @package App\Services
 */
class HomeService extends LayoutService
{
    /**
     * @var MainSliderRepository
     */
    protected $main_slider_repository;

    /**
     * @var ProductRepository
     */
    protected $product_repository;

    /**
     * @var BannerRepository
     */
    protected $banner_repository;

    /**
     * @var PromotionRepository
     */
    protected $promotion_repository;

    /**
     * @var MetaTagRepository
     */
    protected $meta_tag_repository;

    /**
     * HomeService constructor.
     * @param CategoryRepository $categoryRepository
     * @param MainSliderRepository $mainSliderRepository
     * @param ProductRepository $productRepository
     * @param BannerRepository $bannerRepository
     * @param PromotionRepository $promotionRepository
     * @param MetaTagRepository $metaTagRepository
     */
    public function __construct(CategoryRepository $categoryRepository,
                                MainSliderRepository $mainSliderRepository,
                                ProductRepository $productRepository,
                                BannerRepository $bannerRepository,
                                PromotionRepository $promotionRepository,
                                MetaTagRepository $metaTagRepository)
    {
        parent::__construct($categoryRepository);

        $this->main_slider_repository = $mainSliderRepository;

        $this->product_repository = $productRepository;

        $this->banner_repository = $bannerRepository;

        $this->promotion_repository = $promotionRepository;

        $this->meta_tag_repository = $metaTagRepository;
    }

    /**
     * filling model with data
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model); // TODO: Change the autogenerated stub

        $this->fill_sales_promotion($model);

        $this->fill_top_promotion($model);

        $this->fill_new_promotion($model);

        $this->fill_main_slider($model);

        $this->fill_new_slider_products($model);

        $this->fill_banners($model);

        $this->fill_sales_slider_products($model);

        $this->fill_top_slider_products($model);

        $this->fill_meta_tags($model);
    }

    /**
     * filling sales promotion
     * @param $model
     */
    private function fill_sales_promotion($model)
    {
        $model->sales_promotion = $this->promotion_repository->get_sales_promotion($model);
    }

    /**
     * filling top promotion
     * @param $model
     */
    private function fill_top_promotion($model)
    {
        $model->top_promotion = $this->promotion_repository->get_top_promotion($model);
    }

    /**
     * filling new promotion
     * @param $model
     */
    private function fill_new_promotion($model)
    {
        $model->new_promotion = $this->promotion_repository->get_new_promotion($model);
    }

    /**
     * filling main_slider
     * @param $model
     */
    private function fill_main_slider($model)
    {
        $model->main_slider = $this->main_slider_repository->get_main_slider($model);
    }

    /**
     * filling new_slider
     * @param $model
     */
    private function fill_new_slider_products($model)
    {
        $model->new_slider_products = $this->product_repository->get_new_slider_products($model);

        if (!is_null($model->new_slider_products) && $model->new_slider_products->count() > 0)
        {
            foreach ($model->new_slider_products as $new_slider_product)
            {
                $new_slider_product->currentSizeId = $new_slider_product->sizes[0]->id;
            }
        }
    }

    /**
     * filling banners
     * @param $model
     */
    private function fill_banners($model)
    {
        $model->banners = $this->banner_repository->get_banners($model);
    }

    /**
     * filling sales_slider
     * @param $model
     */
    private function fill_sales_slider_products($model)
    {
        $model->sales_slider_products = $this->product_repository->get_sales_slider_products($model);

        if (!is_null($model->sales_slider_products) && $model->sales_slider_products->count() > 0)
        {
            foreach ($model->sales_slider_products as $sales_slider_product)
            {
                $sales_slider_product->currentSizeId = $sales_slider_product->sizes[0]->id;
            }
        }
    }

    /**
     * filling top_slider
     * @param $model
     */
    private function fill_top_slider_products($model)
    {
        $model->top_slider_products = $this->product_repository->get_top_slider_products($model);

        if (!is_null($model->top_slider_products) && $model->top_slider_products->count() > 0)
        {
            foreach ($model->top_slider_products as $top_slider_product)
            {
                $top_slider_product->currentSizeId = $top_slider_product->sizes[0]->id;
            }
        }
    }

    /**
     * filling meta tags
     * @param $model
     */
    private function fill_meta_tags($model)
    {
        $meta_tag = $this->meta_tag_repository->getMetaTagByPageName($model);
        $model->title = $meta_tag->meta_title;
        $model->description = $meta_tag->meta_description;
        $model->keywords = $meta_tag->meta_keywords;
        $model->h1 = $meta_tag->meta_h1;
    }
}