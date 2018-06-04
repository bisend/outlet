<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationMessage;
use Auth;
use JavaScript;

/**
 * Class LayoutController
 * @package App\Http\Controllers
 */
class LayoutController extends Controller
{
    use NotificationMessage;


    /**
     * Puts trans for JS
     *
     * @param string|null $pageName
     */
    protected function putJavaScriptTrans($pageName = null)
    {
        $trans = [];

        if ($pageName) {
            $pageTrans = trans("js.$pageName");
            if (is_array($pageTrans) && count($pageTrans) > 0) {
                foreach ($pageTrans as $pageTransKey => $pageTransValue) {
                    $trans['PAGE'][$pageTransKey] = $pageTransValue;
                }
            }
        }

        $trans['ERROR'] = trans('js.error');
        if (!Auth::check()) {
            $trans['AUTH'] = trans('js.auth');
        }

        JavaScript::put([
            'TRANS' => $trans
        ]);
    }
}
