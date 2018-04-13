<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 12.04.2018
 * Time: 15:13
 */

namespace App\Repositories;


use App\DatabaseModels\Review;

/**
 * Class ReviewRepository
 * @package App\Repositories
 */
class ReviewRepository
{
    public function add_review($productId, $userId, $review, $name, $email, $rating)
    {
        $model = new Review();
        $model->product_id = $productId;
        $model->user_id = $userId;
        $model->review = $review;
        $model->name = $name;
        $model->email = $email;
        $model->rating = $rating;
        $model->save();
    }

    public function get_reviews($product_id, $review_offset, $review_limit)
    {
        return Review::whereProductId($product_id)
            ->whereIsModerated(true)
            ->offset($review_offset)
            ->orderByRaw('created_at desc')
            ->limit($review_limit)
            ->get();
    }

    public function get_reviews_count($productId)
    {
        return Review::whereProductId($productId)
            ->whereIsModerated(true)
            ->count();
    }
}