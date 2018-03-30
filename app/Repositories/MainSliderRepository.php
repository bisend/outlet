<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 15:41
 */

namespace App\Repositories;


use App\DatabaseModels\MainSlider;

class MainSliderRepository
{
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