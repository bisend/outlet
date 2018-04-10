<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 17:14
 */

namespace App\Repositories;

use App\DatabaseModels\Banner;

/**
 * Class BannerRepository
 * @package App\Repositories
 */
class BannerRepository
{
    /**
     * get banners
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function get_banners($model)
    {
        return Banner::whereIsVisible(true)
            ->orderByRaw('priority desc', 'name')
            ->limit($model->banners_limit)
            ->get([
                'id',
                'image',
                "url_$model->language as url",
                "text_$model->language as text",
                "btn_text_$model->language as btn_text"
            ]);
    }
}