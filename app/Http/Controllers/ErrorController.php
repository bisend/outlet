<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\ErrorService;
use App\ViewModels\ErrorViewModel;

/**
 * Class ErrorController
 * @package App\Http\Controllers
 */
class ErrorController extends LayoutController
{
    /**
     * @var ErrorService
     */
    protected $errorService;

    /**
     * ErrorController constructor.
     * @param ErrorService $errorService
     */
    public function __construct(ErrorService $errorService)
    {
        $this->errorService = $errorService;
    }

    /**
     * show error page
     * @param $error
     * @param string $language
     * @return mixed
     */
    public function index($error, $language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ErrorViewModel('error', $language, $error);

        $this->errorService->fill($model);

        return response()->view("errors.$error", compact('model'), $error);
    }
}
