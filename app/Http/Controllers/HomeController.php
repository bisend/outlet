<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\HomeService;
use App\ViewModels\HomeViewModel;
use Illuminate\Http\Request;

class HomeController extends LayoutController
{
    protected $home_service;

    public function __construct(HomeService $homeService)
    {
        $this->home_service = $homeService;
    }

    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new HomeViewModel('home', $language);

        $this->home_service->fill($model);

        \Debugbar::info($model->banners);
        return view('pages.home', compact('model'));
    }
}
