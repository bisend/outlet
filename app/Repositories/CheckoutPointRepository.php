<?php


namespace App\Repositories;


use App\DatabaseModels\CheckoutPoint;

class CheckoutPointRepository
{
    public function getCheckoutPoints($model)
    {
        return CheckoutPoint::whereIsVisible(true)
            ->orderBy('priority')
            ->get([
                'id',
                "name_$model->language as name",
                'slug'
            ]);
    }

    public function getCheckoutPoint($model)
    {
        return CheckoutPoint::whereIsVisible(true)
            ->whereId($model->selectedCheckoutPointId)
            ->first([
                'id',
                "name_$model->language as name",
                'slug'
            ]);
    }
}