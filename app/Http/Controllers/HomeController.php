<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\HomeService;
use App\ViewModels\HomeViewModel;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends LayoutController
{
    /**
     * @var HomeService
     */
    protected $home_service;

    /**
     * HomeController constructor.
     * @param HomeService $homeService
     */
    public function __construct(HomeService $homeService)
    {
        $this->home_service = $homeService;
    }

    /**
     * action for home page
     * @param string $language
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new HomeViewModel('home', $language);

        $this->home_service->fill($model);

        \Debugbar::info($model);
        return view('pages.home', compact('model'));
    }
}