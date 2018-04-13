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
    protected $category_repository;

    /**
     * LayoutService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->category_repository = $categoryRepository;
    }

    /**
     * filling model with data
     * @param $model
     */
    public function fill($model)
    {
        $this->localize_application($model);
        $this->fill_categories($model);
    }

    /**
     * set application locale (ru|uk)
     * @param $model
     */
    private function localize_application($model)
    {
        Languages::localizeApp($model->language);
    }

    /**
     * filling categories
     * @param $model
     */
    private function fill_categories($model)
    {
        $model->categories = $this->category_repository->get_categories($model);
    }
}