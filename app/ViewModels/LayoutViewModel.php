<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 14:30
 */

namespace App\ViewModels;

/**
 * contains common data for all pages
 * Class LayoutViewModel
 * @package App\ViewModels
 */
abstract class LayoutViewModel
{
    /**
     * contains view name (page name)
     * @var string $view
     */
    public $view;

    /**
     * contains app language (locale)
     * @var string $language
     */
    public $language;

    /**
     * contains categories for menu
     * @var $categories
     */
    public $categories;

    /**
     * contains user data
     * @var $user
     */
    public $user;

    /**
     * contains profile data
     * @var $profile
     */
    public $profile;

    /**
     * contains meta title
     * @var string $title
     */
    public $title;

    /**
     * contains meta description
     * @var string $description
     */
    public $description;

    /**
     * contains meta keywords
     * @var string $keywords
     */
    public $keywords;

    /**
     * contains meta h1
     * @var string $h1
     */
    public $h1;

    /**
     * LayoutViewModel constructor.
     * @param $view
     * @param $language
     */
    public function __construct($view, $language)
    {
        $this->view = $view;
        $this->language = $language;
    }
}