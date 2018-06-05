<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationMessage;
use Auth;
use JavaScript;
use Session;

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

            if (Session::has('social_email')) {
                JavaScript::put([
                    'SOCIAL_EMAIL' => true,
                    'SOCIAL_EMAIL_USER_NAME' => Session::get('social_email.name'),
                ]);
            }
        }

        JavaScript::put([
            'TRANS' => $trans,
        ]);
    }
}
