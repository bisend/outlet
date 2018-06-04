<?php

namespace App\Http\Controllers\Auth;

use App\DatabaseModels\SocialLogin;
use App\DatabaseModels\User;
use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Repositories\ProfileRepository;
use App\Repositories\WishListRepository;
use Session;
use Socialite;

/**
 * Class GoogleLoginController
 * @package App\Http\Controllers\Auth
 */
class GoogleLoginController extends LayoutController
{
    /**
     * @var ProfileRepository
     */
    protected $profileRepository;

    /**
     * @var WishListRepository
     */
    protected $wishListRepository;

    /**
     * GoogleLoginController constructor.
     * @param ProfileRepository $profileRepository
     * @param WishListRepository $wishListRepository
     */
    public function __construct(ProfileRepository $profileRepository, WishListRepository $wishListRepository)
    {
        $this->profileRepository = $profileRepository;
        
        $this->wishListRepository = $wishListRepository;
    }

    /**
     * method handles redirect query to google provider
     * @param string $language
     * @return mixed
     */
    public function redirectToProvider($language = Languages::DEFAULT_LANGUAGE)
    {
        Session::put('previousSocialLoginUrl', url()->previous());

        Languages::localizeApp($language);

        Session::put('language', $language);

        return Socialite::driver('google')->redirect();
    }

    /**
     * method handles callback from google and trying to register|login user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback()
    {
        $userProvider = Socialite::driver('google')->user();

        $name = $userProvider->getName();

        $email = $userProvider->getEmail();

        $providerId = $userProvider->getId();

        $socialLogin = SocialLogin::whereProviderId($providerId)->first();
        
        if ($socialLogin) {
            $user = User::whereId($socialLogin->user_id)->first();

            auth()->login($user);

            if (Session::has('previousSocialLoginUrl')) {
                return redirect(Session::get('previousSocialLoginUrl'));
            }

            if (Session::has('language')) {
                return redirect(url_home(Session::get('language')));
            } else {
                return redirect('/');
            }
        }

        if (!$socialLogin) {
            $user = User::whereEmail($email)->first();

            if (!$user) {
                $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->password = bcrypt(md5(str_random(16)));
                $user->active = true;
                $user->save();
                $confirmationToken = str_random(31) . $user->id;
                $user->confirmation_token = $confirmationToken;
                $user->save();

                $this->profileRepository->createProfile($user);
                
                $this->wishListRepository->createWishList($user->id);
            }

            $sLogin = new SocialLogin();
            $sLogin->user_id = $user->id;
            $sLogin->provider_id = $providerId;
            $sLogin->provider_name = 'google';
            $sLogin->save();

            auth()->login($user);

            if (Session::has('previousSocialLoginUrl')) {
                return redirect(Session::get('previousSocialLoginUrl'));
            }

            if (Session::has('language')) {
                return redirect(url_home(Session::get('language')));
            } else {
                return redirect('/');
            }
        }

        if (Session::has('previousSocialLoginUrl')) {
            return redirect(Session::get('previousSocialLoginUrl'));
        }

        if (Session::has('language')) {
            return redirect(url_home(Session::get('language')));
        } else {
            return redirect('/');
        }
    }
}
