<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\MainSlider
 *
 * @property int $id
 * @property string $image
 * @property string|null $url_ru
 * @property string|null $url_uk
 * @property bool $is_visible
 * @property int $priority
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereUrlRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereUrlUk($value)
 * @mixin \Eloquent
 * @property string|null $big_text_ru
 * @property string|null $big_text_uk
 * @property string|null $small_text_ru
 * @property string|null $small_text_uk
 * @property string|null $btn_text_ru
 * @property string|null $btn_text_uk
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereBigTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereBigTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereBtnTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereBtnTextUk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereSmallTextRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\MainSlider whereSmallTextUk($value)
 */
class MainSlider extends Model
{
    protected $table = 'main_slider';

}
