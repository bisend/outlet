<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Category
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $meta_tag_id
 * @property string $name_ru
 * @property string $name_uk
 * @property string $slug
 * @property bool $is_visible
 * @property int $priority
 * @property string|null $image
 * @property string|null $description_ru
 * @property string|null $description_uk
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereDescriptionUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereNameUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $meta_title_ru
 * @property string|null $meta_title_uk
 * @property string|null $meta_description_ru
 * @property string|null $meta_description_uk
 * @property string|null $meta_keywords_ru
 * @property string|null $meta_keywords_uk
 * @property string|null $meta_h1_ru
 * @property string|null $meta_h1_uk
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaDescriptionUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaH1Ru($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaH1Uk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaKeywordsRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaKeywordsUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Category whereMetaTitleUk($value)
 */
class Category extends Model
{
    protected $table = 'categories';
}
