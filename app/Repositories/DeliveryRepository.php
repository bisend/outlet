<?php


namespace App\Repositories;


use App\DatabaseModels\Delivery;

/**
 * Class DeliveryRepository
 * @package App\Repositories
 */
class DeliveryRepository
{
    /**
     * return all deliveries
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllDeliveries($model)
    {
        return Delivery::get([
            'id',
            "name_$model->language as name",
            'slug'
        ]);
    }

    public function getDelivery($model)
    {
        return Delivery::whereId($model->selectedDeliveryId)->first([
            'id',
            "name_$model->language as name",
            'slug'
        ]);
    }
}