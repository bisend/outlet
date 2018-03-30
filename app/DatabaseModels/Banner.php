<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Banner
 *
 * @property int $id
 * @property string $image
 * @property string|null $url_ru
 * @property string|null $url_uk
 * @property string|null $text_ru
 * @property string|null $text_uk
 * @property string|null $btn_text_ru
 * @property string|null $btn_text_uk
 * @property bool $is_visible
 * @property int $priority
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereBtnTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereBtnTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereUrlRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Banner whereUrlUk($value)
 * @mixin \Eloquent
 */
class Banner extends Model
{
    protected $table = 'banners';
}
