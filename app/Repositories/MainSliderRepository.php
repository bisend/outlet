<?php

namespace App\Repositories;

use App\DatabaseModels\MainSlider;

/**
 * Class MainSliderRepository
 * @package App\Repositories
 */
class MainSliderRepository
{
    /**
     * get sliders for main_slider
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_main_slider($model)
    {
        return MainSlider::whereIsVisible(true)
            ->orderByRaw('priority desc', 'name')
            ->get([
                'id',
                'image',
                "url_$model->language as url",
                "big_text_$model->language as big_text",
                "small_text_$model->language as small_text",
                "btn_text_$model->language as btn_text",
                "is_visible",
                'priority'
            ]);
    }
}