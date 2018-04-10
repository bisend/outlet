<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 15:55
 */

namespace App\Repositories;

use App\DatabaseModels\Product;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository
{
    /**
     * get products for 'new' slider
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_new_slider_products($model)
    {
        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) use ($model) {
                $query->where('products_promotions.promotion_id', '=', $model->new_promotion->id);
            },
            'properties' => function ($query) use ($model) {
                $query->select([
                    'properties.id',
                    'properties.product_id',
                    'properties.property_name_id',
                    'properties.property_value_id',
                    'properties.priority',
                    'property_names.id',
                    'property_values.id',
                    'property_names.slug',
                    "property_names.name_$model->language as property_name",
                    "property_values.name_$model->language as property_value",
                ]);
                $query->join('property_names', function ($join) {
                    $join->on('properties.property_name_id', '=', 'property_names.id');
                });
                $query->join('property_values', function ($join) {
                    $join->on('properties.property_value_id', '=', 'property_values.id');
                });
            }
        ])
            ->whereHas('promotions', function ($query) use ($model) {
                $query->where('products_promotions.promotion_id', '=', $model->new_promotion->id);
            })->whereIsVisible(true)
//            ->whereNotIn('products.id', $model->topIds)
//            ->orderByRaw($orderByRaw)
//            ->offset($categoryProductsOffset)
            ->limit($model->new_limit)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                'slug',
                'is_visible',
                'in_stock',
                'price',
                'old_price',
                "description_$model->language as description",
                'products.priority',
                'vendor_code',
                'rating',
                'number_of_views',
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
                'products.created_at'
            ]);
    }

    /**
     * get products for 'sales' slider
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_sales_slider_products($model)
    {
        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) use ($model) {
                $query->where('products_promotions.promotion_id', '=', $model->sales_promotion->id);
            },
            'properties' => function ($query) use ($model) {
                $query->select([
                    'properties.id',
                    'properties.product_id',
                    'properties.property_name_id',
                    'properties.property_value_id',
                    'properties.priority',
                    'property_names.id',
                    'property_values.id',
                    'property_names.slug',
                    "property_names.name_$model->language as property_name",
                    "property_values.name_$model->language as property_value",
                ]);
                $query->join('property_names', function ($join) {
                    $join->on('properties.property_name_id', '=', 'property_names.id');
                });
                $query->join('property_values', function ($join) {
                    $join->on('properties.property_value_id', '=', 'property_values.id');
                });
            }
        ])
            ->whereHas('promotions', function ($query) use ($model) {
                $query->where('products_promotions.promotion_id', '=', $model->sales_promotion->id);
            })->whereIsVisible(true)
//            ->whereNotIn('products.id', $model->topIds)
//            ->orderByRaw($orderByRaw)
//            ->offset($categoryProductsOffset)
            ->limit($model->new_limit)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                'slug',
                'is_visible',
                'in_stock',
                'price',
                'old_price',
                "description_$model->language as description",
                'products.priority',
                'vendor_code',
                'rating',
                'number_of_views',
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
                'products.created_at'
            ]);
    }

    /**
     * get products for 'top' slider
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_top_slider_products($model)
    {
        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) use ($model) {
                $query->where('products_promotions.promotion_id', '=', $model->top_promotion->id);
            },
            'properties' => function ($query) use ($model) {
                $query->select([
                    'properties.id',
                    'properties.product_id',
                    'properties.property_name_id',
                    'properties.property_value_id',
                    'properties.priority',
                    'property_names.id',
                    'property_values.id',
                    'property_names.slug',
                    "property_names.name_$model->language as property_name",
                    "property_values.name_$model->language as property_value",
                ]);
                $query->join('property_names', function ($join) {
                    $join->on('properties.property_name_id', '=', 'property_names.id');
                });
                $query->join('property_values', function ($join) {
                    $join->on('properties.property_value_id', '=', 'property_values.id');
                });
            }
        ])
            ->whereHas('promotions', function ($query) use ($model) {
                $query->where('products_promotions.promotion_id', '=', $model->top_promotion->id);
            })->whereIsVisible(true)
//            ->whereNotIn('products.id', $model->topIds)
//            ->orderByRaw($orderByRaw)
//            ->offset($categoryProductsOffset)
            ->limit($model->new_limit)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                'slug',
                'is_visible',
                'in_stock',
                'price',
                'old_price',
                "description_$model->language as description",
                'products.priority',
                'vendor_code',
                'rating',
                'number_of_views',
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
                'products.created_at'
            ]);
    }
}