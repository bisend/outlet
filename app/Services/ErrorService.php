<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\MetaTagRepository;

/**
 * Class ErrorService
 * @package App\Services
 */
class ErrorService extends LayoutService
{
    protected $metaTagRepository;

    /**
     * ErrorService constructor.
     * @param CategoryRepository $categoryRepository
     * @param MetaTagRepository $metaTagRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        MetaTagRepository $metaTagRepository)
    {
        parent::__construct($categoryRepository);

        $this->metaTagRepository = $metaTagRepository;
    }

    /**
     * @param $model
     */
    public function fill($model)
    {
        parent::fill($model);

        $this->fillMetaTags($model);
    }

    private function fillMetaTags($model)
    {
        $metaTag = $this->metaTagRepository->getMetaTagByPageName($model);
        $model->title = $metaTag->meta_title;
        $model->description = $metaTag->meta_description;
        $model->keywords = $metaTag->meta_keywords;
        $model->h1 = $metaTag->meta_h1;
    }
}
