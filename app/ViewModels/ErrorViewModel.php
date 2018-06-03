<?php

namespace App\ViewModels;

/**
 * Class ErrorViewModel
 * @package App\ViewModels
 */
class ErrorViewModel extends LayoutViewModel
{
    /**
     * @var null
     */
    public $error;

    /**
     * ErrorViewModel constructor.
     * @param string $view
     * @param string $language
     * @param null $error
     */
    public function __construct($view, $language, $error = null)
    {
        parent::__construct($view, $language);
        
        $this->error = $error;
    }
}