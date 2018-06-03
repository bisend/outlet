<?php

namespace App\Repositories;

use App\DatabaseModels\Promotion;

/**
 * Class PromotionRepository
 * @package App\Repositories
 */
class PromotionRepository
{
    /**
     * get sales promotion
     * @param $model
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function get_sales_promotion($model)
    {
        return Promotion::wherePriority(3)->first();
    }

    /**
     * get top promotion
     * @param $model
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function get_top_promotion($model)
    {
        return Promotion::wherePriority(2)->first();
    }

    /**
     * get new promotion
     * @param $model
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function get_new_promotion($model)
    {
        return Promotion::wherePriority(1)->first();
    }
}