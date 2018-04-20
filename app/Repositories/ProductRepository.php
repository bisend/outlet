<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 15:55
 */

namespace App\Repositories;

use App\DatabaseModels\Product;
use App\DatabaseModels\Promotion;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository
{
    /**
     * word separator for search
     * @var string
     */
    protected $wordsSeparator = '+';

    /**
     * like separator for search query
     * @var string
     */
    protected $likeSeparator = '%';

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

    /**
     * get single product for product page
     * @param $model
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function get_product_by_slug($model)
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
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
            ->whereSlug($model->slug)
            ->whereIsVisible(true)
            ->first([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                "slug",
                "is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$model->language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

    /**
     * get similar products to current product
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_similar_products($model)
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
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
            ->whereCategoryId($model->product_category->id)
            ->whereIsVisible(true)
            ->whereNotIn('id', [$model->product->id])
            ->orderByRaw('priority desc', 'name')
            ->limit(8)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                "slug",
                "is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$model->language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

    /**
     * get products for Cart
     * @param $productIds
     * @param $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCartProducts($productIds, $language)
    {
        return Product::with([
            'images',
            'sizes' => function ($query) use ($language) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
            },
            'properties' => function ($query) use ($language) {
                $query->select([
                    'properties.id',
                    'properties.product_id',
                    'properties.property_name_id',
                    'properties.property_value_id',
                    'properties.priority',
                    'property_names.id',
                    'property_values.id',
                    'property_names.slug',
                    "property_names.name_$language as property_name",
                    "property_values.name_$language as property_value",
                ]);
                $query->join('property_names', function ($join) {
                    $join->on('properties.property_name_id', '=', 'property_names.id');
                });
                $query->join('property_values', function ($join) {
                    $join->on('properties.property_value_id', '=', 'property_values.id');
                });
            }
        ])
            ->whereIn('id', $productIds)
            ->whereIsVisible(true)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$language as name",
                "slug",
                "is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$language as meta_title",
                "meta_description_$language as meta_description",
                "meta_keywords_$language as meta_keywords",
                "meta_h1_$language as meta_h1",
            ]);
    }


    /**
     * return search products
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllProductsForSearch($model)
    {
        $orderByRaw = 'name';

        if ($model->sort == 'popularity')
        {
            $orderByRaw = 'rating desc, name';
        }
        elseif ($model->sort == 'new')
        {
            $orderByRaw = 'created_at desc, name';
        }
        elseif ($model->sort == 'price-asc')
        {
            $orderByRaw = 'price asc, name';
        }
        elseif ($model->sort == 'price-desc')
        {
            $orderByRaw = 'price desc, name';
        }

        $words = explode($this->wordsSeparator, $model->series);
        $wordsReverse = array_reverse($words);
        $seriesReverse = implode($this->likeSeparator, $wordsReverse);
        $series = implode($this->likeSeparator, $words);

        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
            ->where(function ($query) use ($series, $seriesReverse) {
                $query->where('is_visible', '=', true);
                $query->where("name_ru", 'like', '%' . $series . '%');
                $query->orWhere("name_ru", 'like', '%' . $seriesReverse . '%');
                $query->where('is_visible', '=', true);
            })
            ->orWhere(function ($query) use ($series, $seriesReverse) {
                $query->where('is_visible', '=', true);
                $query->where("name_uk", 'like', '%' . $series . '%');
                $query->orWhere("name_uk", 'like', '%' . $seriesReverse . '%');
                $query->where('is_visible', '=', true);
            })
            ->orderByRaw($orderByRaw)
            ->offset($model->searchProductsOffset)
            ->limit($model->searchProductsLimit)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                "slug",
                "is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$model->language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

    /**
     * return count of search products
     * @param $model
     * @return int
     */
    public function getCountSearchProducts($model)
    {
        $words = explode($this->wordsSeparator, $model->series);
        $wordsReverse = array_reverse($words);
        $seriesReverse = implode($this->likeSeparator, $wordsReverse);
        $series = implode($this->likeSeparator, $words);

        return Product::where(function ($query) use ($series, $seriesReverse) {
            $query->where('is_visible', '=', true);
            $query->where("name_ru", 'like', '%' . $series . '%');
            $query->orWhere("name_ru", 'like', '%' . $seriesReverse . '%');
            $query->where('is_visible', '=', true);
        })->orWhere(function ($query) use ($series, $seriesReverse) {
            $query->where('is_visible', '=', true);
            $query->where("name_uk", 'like', '%' . $series . '%');
            $query->orWhere("name_uk", 'like', '%' . $seriesReverse . '%');
            $query->where('is_visible', '=', true);
        })->count();
    }

    /**
     * return ajax search products
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAjaxSearchProducts($model)
    {
        $orderByRaw = 'name';

        $words = explode($this->wordsSeparator, $model->series);
        $wordsReverse = array_reverse($words);
        $seriesReverse = implode($this->likeSeparator, $wordsReverse);
        $series = implode($this->likeSeparator, $words);

        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
            ->where(function ($query) use ($series, $seriesReverse) {
                $query->where('products.is_visible', '=', true);
                $query->where("name_ru", 'like', '%' . $series . '%');
                $query->orWhere("name_ru", 'like', '%' . $seriesReverse . '%');
                $query->where('products.is_visible', '=', true);
            })
            ->orWhere(function ($query) use ($series, $seriesReverse) {
                $query->where('products.is_visible', '=', true);
                $query->where("name_uk", 'like', '%' . $series . '%');
                $query->orWhere("name_uk", 'like', '%' . $seriesReverse . '%');
                $query->where('products.is_visible', '=', true);
            })
            ->orderByRaw($orderByRaw)
            ->limit(5)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                "slug",
                "is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$model->language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

    /**
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getAllSalesProducts($model)
    {
        $model->salesPromotion = Promotion::wherePriority(3)->first();

        $orderByRaw = 'name';

        if ($model->sort == 'popularity')
        {
            $orderByRaw = 'rating desc, name';
        }
        elseif ($model->sort == 'new')
        {
            $orderByRaw = 'created_at desc, name';
        }
        elseif ($model->sort == 'price-asc')
        {
            $orderByRaw = 'price asc, name';
        }
        elseif ($model->sort == 'price-desc')
        {
            $orderByRaw = 'price desc, name';
        }

        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
                $query->where('products_promotions.promotion_id', '=', $model->salesPromotion->id);
            })
            ->whereIsVisible(true)
            ->orderByRaw($orderByRaw)
            ->offset($model->offset)
            ->limit($model->limit)
            ->get([
                'products.id',
                'category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                "slug",
                "is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$model->language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

    /**
     * @param $model
     * @return int
     */
    public function getCountAllSalesProducts($model)
    {
        $model->salesPromotion = Promotion::wherePriority(3)->first();

        return Product::whereHas('promotions', function ($query) use ($model) {
            $query->where('products_promotions.promotion_id', '=', $model->salesPromotion->id);
        })->whereIsVisible(true)->count();
    }

    /**
     * return all products for category (with pagination)
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllProductsForCategory($model)
    {
        $orderByRaw = 'priority desc, name';

        if ($model->sort == 'popularity')
        {
            $orderByRaw = 'rating desc, name';
        }
        elseif ($model->sort == 'new')
        {
            $orderByRaw = 'created_at desc, name';
        }
        elseif ($model->sort == 'price-asc')
        {
            $orderByRaw = 'price asc, name';
        }
        elseif ($model->sort == 'price-desc')
        {
            $orderByRaw = 'price desc, name';
        }

        return Product::with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
            ->join('product_category', function ($query) use ($model) {
                $query->on('products.id', '=', 'product_category.product_id')
                    ->where('product_category.category_id', '=', "".$model->currentCategory->id."");
            })
            ->where('products.is_visible', '=', true)
            ->orderByRaw($orderByRaw)
            ->offset($model->categoryProductsOffset)
            ->limit($model->categoryProductsLimit)
            ->get([
                'products.id',
                'products.category_id',
                'breadcrumb_category_id',
                "name_$model->language as name",
                "slug",
                "products.is_visible",
                "in_stock",
                "price",
                "old_price",
                "description_$model->language as description",
                "products.priority",
                "vendor_code",
                "rating",
                "number_of_views",
                "meta_title_$model->language as meta_title",
                "meta_description_$model->language as meta_description",
                "meta_keywords_$model->language as meta_keywords",
                "meta_h1_$model->language as meta_h1",
            ]);
    }

    /**
     * return count of all products related to current Category
     * @param $model
     * @return int
     */
    public function getCountProductsCategory($model)
    {
        return Product::join('product_category', function ($query) use ($model) {
            $query->on('products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', "".$model->currentCategory->id."");
        })
            ->where('products.is_visible', '=',true)
            ->count();
    }

    /**
     * return min value of price for categories
     * @param $model
     * @return mixed
     */
    public function getPriceMinForCategoryProducts($model)
    {
        return Product::join('product_category', function ($query) use ($model) {
                $query->on('products.id', '=', 'product_category.product_id')
                    ->where('product_category.category_id', '=', "". $model->currentCategory->id . "");
            })->where('products.is_visible', '=',true)->min('price');
    }

    /**
     * return max value of price for categories
     * @param $model
     * @return mixed
     */
    public function getPriceMaxForCategoryProducts($model)
    {
        return Product::join('product_category', function ($query) use ($model) {
            $query->on('products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', "". $model->currentCategory->id . "");
        })->where('products.is_visible', '=',true)->max('price');
    }

    /**
     * return min value of price for filtered categories
     * @param $model
     * @return mixed
     */
    public function getPriceMinForFiltersCategoryProducts($model)
    {
        $query = Product::query();

        $query->join('product_category', function ($query) use ($model) {
            $query->on('products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', "". $model->currentCategory->id . "");
        })->min('price');

        if (count($model->parsedFilters) > 0)
        {
            foreach ($model->parsedFilters as $name => $values) {
                $query->whereHas('properties', function ($query) use ($name, $values) {
                    $query->whereHas('property_names', function ($query) use ($name) {
                        $query->whereIn('slug', [$name]);
                    })->whereHas('property_values', function ($query) use ($values) {
                        $query->whereIn('slug', $values);
                    });
                });
            }
        }

        return $query->where('products.is_visible', '=', true)->min('price');
    }

    /**
     * return max value of price for filtered categories
     * @param $model
     * @return mixed
     */
    public function getPriceMaxForFiltersCategoryProducts($model)
    {
        $query = Product::query();

        $query->join('product_category', function ($query) use ($model) {
            $query->on('products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', "". $model->currentCategory->id . "");
        })->max('price');

        if (count($model->parsedFilters) > 0)
        {
            foreach ($model->parsedFilters as $name => $values) {
                $query->whereHas('properties', function ($query) use ($name, $values) {
                    $query->whereHas('property_names', function ($query) use ($name) {
                        $query->whereIn('slug', [$name]);
                    })->whereHas('property_values', function ($query) use ($values) {
                        $query->whereIn('slug', $values);
                    });
                });
            }
        }

        return $query->where('products.is_visible', '=', true)->max('price');
    }

    /**
     * return products for filtered categories
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllProductsForFiltersCategory($model)
    {
        $orderByRaw = 'priority desc, name';

        if ($model->sort == 'popularity')
        {
            $orderByRaw = 'rating desc, priority desc, name';
        }
        elseif ($model->sort == 'new')
        {
            $orderByRaw = 'created_at desc, priority desc, name';
        }
        elseif ($model->sort == 'price-asc')
        {
            $orderByRaw = 'price asc, priority desc, name';
        }
        elseif ($model->sort == 'price-desc')
        {
            $orderByRaw = 'price desc, priority desc, name';
        }

        $query = Product::query();

        $query->with([
            'images',
            'sizes' => function ($query) use ($model) {
                $query->select([
                    'sizes.id',
                    "sizes.name_$model->language as name",
                    'sizes.slug'
                ]);
            },
            'promotions' => function ($query) {
                $query->orderByRaw('promotions.priority desc');
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
        ]);

        if ($model->priceMin && $model->priceMax)
        {
            $query->whereBetween('price', [$model->priceMin, $model->priceMax]);
        }

        foreach ($model->parsedFilters as $name => $values) {
            $query->whereHas('properties', function ($query) use ($name, $values) {
                $query->whereHas('property_names', function ($query) use ($name) {
                    $query->whereIn('slug', [$name]);
                })->whereHas('property_values', function ($query) use ($values) {
                    $query->whereIn('slug', $values);
                });
            });
        }

        $query->orderByRaw($orderByRaw)
            ->join('product_category', function ($query) use ($model) {
                $query->on('products.id', '=', 'product_category.product_id')
                    ->where('product_category.category_id', '=', "".$model->currentCategory->id."");
            })
            ->offset($model->categoryProductsOffset)
            ->limit($model->categoryProductsLimit);


        return $query->where('products.is_visible', '=', true)->get([
            'products.id',
            'products.category_id',
            'breadcrumb_category_id',
            "name_$model->language as name",
            "slug",
            "products.is_visible",
            "in_stock",
            "price",
            "old_price",
            "description_$model->language as description",
            "products.priority",
            "vendor_code",
            "rating",
            "number_of_views",
            "meta_title_$model->language as meta_title",
            "meta_description_$model->language as meta_description",
            "meta_keywords_$model->language as meta_keywords",
            "meta_h1_$model->language as meta_h1",
            'products.created_at'
        ]);
    }

    /**
     * return count of product filtered categories
     * @param $model
     * @return int
     */
    public function getCountProductsFiltersCategory($model)
    {
        $query = Product::query();

        if ($model->priceMin && $model->priceMax)
        {
            if ($model->priceMin && $model->priceMax)
            {
                $query->whereBetween('price', [$model->priceMin, $model->priceMax]);
            }
        }

        foreach ($model->parsedFilters as $name => $values) {
            $query->whereHas('properties', function ($query) use ($name, $values) {
                $query->whereHas('property_names', function ($query) use ($name) {
                    $query->whereIn('slug', [$name]);
                })->whereHas('property_values', function ($query) use ($values) {
                    $query->whereIn('slug', $values);
                });
            });
        }

        $query->join('product_category', function ($query) use ($model) {
            $query->on('products.id', '=', 'product_category.product_id')
                ->where('product_category.category_id', '=', "". $model->currentCategory->id . "");
        })->where('products.is_visible', '=', true);

        return $query->count();
    }

}