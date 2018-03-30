<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 14:30
 */

namespace App\ViewModels;


abstract class LayoutViewModel
{
    public $view;
    public $language;
    public $categories;
    public $user;
    public $profile;
    public $title;
    public $description;
    public $keywords;
    public $h1;

    public function __construct($view, $language)
    {
        $this->view = $view;
        $this->language = $language;
    }
}