<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 14:08
 */

namespace App\Services;

use App\Helpers\Languages;
use App\Repositories\CategoryRepository;

/**
 * Common Service for all pages
 * Class LayoutService
 * @package App\Services
 */
class LayoutService
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * LayoutService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * filling model with data
     * @param $model
     */
    public function fill($model)
    {
        $this->localizeApplication($model);
        $this->fillCategories($model);
    }

    /**
     * set application locale (ru|uk)
     * @param $model
     */
    private function localizeApplication($model)
    {
        Languages::localizeApp($model->language);
    }

    /**
     * filling categories
     * @param $model
     */
    private function fillCategories($model)
    {
        $model->categories = $this->categoryRepository->getCategories($model);
    }
}