<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 12.04.2018
 * Time: 11:23
 */

namespace App\Repositories;

use App\DatabaseModels\MetaTag;

/**
 * Class MetaTagRepository
 * @package App\Repositories
 */
class MetaTagRepository
{
    /**
     * get meta tag for page by page name.  Example page name = 'home'
     * @param $model
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function getMetaTagByPageName($model)
    {
        return MetaTag::wherePageName($model->view)->first([
            'id',
            'page_name',
            "meta_title_$model->language as meta_title",
            "meta_description_$model->language as meta_description",
            "meta_keywords_$model->language as meta_keywords",
            "meta_h1_$model->language as meta_h1",
        ]);
    }
}