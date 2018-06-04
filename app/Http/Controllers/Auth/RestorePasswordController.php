<?php

namespace App\Http\Controllers\Auth;

use App\DatabaseModels\User;
use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Mail\RestorePassword;
use DB;
use Exception;
use Mail;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class RestorePasswordController
 * @package App\Http\Controllers\Auth
 */
class RestorePasswordController extends LayoutController
{
    /**
     * sending new password to user
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore()
    {
        if(!request()->ajax()) {
            throw new BadRequestHttpException();
        }

        $language = request('language');

        Languages::localizeApp($language);

        $user = User::whereEmail(request('email'))->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'failed' => 'email'
            ]);
        }

        $newPassword = (str_random(15) . $user->id);

        DB::beginTransaction();

        $user->password = bcrypt(md5($newPassword));
        $user->save();

        try {
            Mail::to($user)->send(new RestorePassword($user, $newPassword, $language));
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'failed' => 'server'
            ]);
        }

        DB::commit();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
