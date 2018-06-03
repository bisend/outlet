<?php

namespace App\Http\Controllers;

use Artisan;
use Exception;

/**
 * Class ArtisanController
 * @package App\Http\Controllers
 */
class ArtisanController extends LayoutController
{
    /**
     * Launches artisan config:gen command
     *
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function generateConfiguration()
    {
        try {
            $this->storeNotificationMessage('Artisan [config:gen] OK!');

            Artisan::call('config:gen');
        } catch (Exception $e) {
            return 'Artisan [config:gen] ERROR!';
        }

        return redirect()->route('home');
    }
}
