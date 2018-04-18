<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 16.04.2018
 * Time: 23:12
 */

namespace App\ViewModels;

use App\Helpers\Languages;

/**
 * Class SearchAjaxViewModel
 * @package App\ViewModels
 */
class SearchAjaxViewModel
{
    /**
     * @var
     */
    public $searchProducts;

    /**
     * @var
     */
    public $countSearchProducts;

    /**
     * @var string
     */
    public $language;

    /**
     * @var null
     */
    public $series;

    /**
     * SearchAjaxViewModel constructor.
     * @param null $series
     * @param string $language
     */
    public function __construct($series = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $this->series = $series;

        $this->language = $language;
    }
}