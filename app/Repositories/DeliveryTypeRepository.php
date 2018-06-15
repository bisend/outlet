<?php

namespace App\Repositories;


use App\DatabaseModels\DeliveryType;

class DeliveryTypeRepository
{
    public function getDeliveryTypes($model)
    {
        return DeliveryType::whereIsVisible(true)
            ->get([
                'id',
                "name_$model->language as name",
                "slug",
            ]);
    }

    public function getDeliveryType($model)
    {
        return DeliveryType::whereIsVisible(true)
            ->whereId($model->selectedDeliveryTypeId)
            ->first([
                'id',
                "name_$model->language as name",
                "slug"
            ]);
    }
}