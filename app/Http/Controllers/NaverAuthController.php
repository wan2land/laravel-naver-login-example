<?php
namespace App\Http\Controllers;

use App\User;
use Auth;
use Socialite;
use Response;
use Illuminate\Routing\Controller;

class NaverAuthController extends Controller
{
    public function index()
    {
        return Auth::user();
    }

    public function redirectToProvider()
    {
        return Socialite::with('naver')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::with('naver')->user();
        $userToLogin = User::where([
            'provider' => 'naver',
            'socialid' => $user->getId(),
        ])->first();
        if (!$userToLogin) {
            $userToLogin = new User([
                'provider' => 'naver',
                'socialid' => $user->getId(),
                'token' => $user->token,
                'name' => $user->getName(),
            ]);
            $userToLogin->save();
        }

        Auth::login($userToLogin);
        return redirect('/');
    }
}
