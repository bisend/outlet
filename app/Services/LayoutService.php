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

class LayoutService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function fill($model)
    {
        $this->localizeApplication($model);
        $this->fillCategories($model);
    }

    private function localizeApplication($model)
    {
        Languages::localizeApp($model->language);
    }

    private function fillCategories($model)
    {
        $model->categories = $this->categoryRepository->getCategories($model);
    }
}