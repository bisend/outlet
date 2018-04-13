<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 14:25
 */

namespace App\Repositories;

use App\DatabaseModels\Category;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository
{
    /**
     * get all categories for menu
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_categories($model)
    {
        return Category::whereIsVisible(true)
            ->whereNull('parent_id')
            ->with([
                'childs' => function ($query) use ($model) {
                    $query->select([
                        'id',
                        'parent_id',
                        "name_$model->language as name",
                        'slug',
                        'is_visible',
                        'priority',
                        'image',
                        "description_$model->language as description",
                        "meta_title_$model->language as meta_title",
                        "meta_description_$model->language as meta_description",
                        "meta_keywords_$model->language as meta_keywords",
                        "meta_h1_$model->language as meta_h1",
                    ])->whereIsVisible(true)->orderByRaw('priority desc', 'name');
//                    $query->with([
//                        'childs' => function ($query) use ($model) {
//                            $query->select([
//                                'id',
//                                'parent_id',
//                                "name_$model->language as name",
//                                'slug',
//                                'is_visible',
//                                'priority',
//                                'image',
//                                "description_$model->language as description",
//                                "meta_title_$model->language as meta_title",
//                                "meta_description_$model->language as meta_description",
//                                "meta_keywords_$model->language as meta_keywords",
//                                "meta_h1_$model->language as meta_h1",
//                            ])->whereIsVisible(true)->orderByRaw('priority desc', 'name');
//                        }
//                    ]);
                }
            ])
            ->get([
                'id',
                'parent_id',
                "name_$model->language as name",
                'slug',
                'is_visible',
                'priority',
                'image',
                "description_$model->language as description",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

//    public function getCurrentCategoryBySlug($model)
//    {
//        return Category::with([
//            'meta_tag' => function ($query) use ($language) {
//                $query->select([
//                    'meta_tags.id',
//                    "meta_tags.title_$language as title",
//                    "meta_tags.description_$language as description",
//                    "meta_tags.keywords_$language as keywords",
//                    "meta_tags.h1_$language as h1"
//                ]);
//            }
//        ])
//            ->whereSlug($slug)->whereIsVisible(true)
//            ->first([
//                'id',
//                'parent_id',
//                'meta_tag_id',
//                'icon',
//                "name_$language as name",
//                'slug',
//                "description_$language as description",
//                'priority'
//            ]);
//    }
//
    public function get_product_category_by_id($model)
    {
        return Category::whereId($model->product->category_id)
            ->whereIsVisible(true)
            ->first([
                'id',
                'parent_id',
                "name_$model->language as name",
                'slug',
                'is_visible',
                'priority',
                'image',
                "description_$model->language as description",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }
}