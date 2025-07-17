<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
use App\Models\SharedCard;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.web.login');
    }


    public function storeLoginForm(LoginRequest $request)
    {

        $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$request->filled('remember_me'))) {
            if (session()->has('mycard')) {
                SharedCard::storeDataIfUserNotLoggedIn();
            }
            return redirect(RouteServiceProvider::HOME);
        }

        return redirect("login")->with('error', 'Login details are not valid');
    }



    public function showRegistrationPage()
    {

        return view('auth.web.register');
    }


    public function storeRegistrationPageData(RegisterRequest $request)
    {
        $request->validated();
        $data = $request->all();

        $user = User::createUser($data);

        Mail::to($user->email)->send(new RegisterMail($user));

        Auth::login($user);
        if (session()->has('mycard')) {
            SharedCard::storeDataIfUserNotLoggedIn();
        }
        return redirect(RouteServiceProvider::HOME);
    }

    public function showForgotPasswordPage()
    {
        return view('auth.web.forgotPassword');
    }

    public function sendResetLinkEmail(Request $request){
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request){
        return view('auth.web.resetPassword', ['token' => $request->token, 'email' => $request->email]);
    }

    public function reset(PasswordResetRequest $request){
        $request->validated();
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password'       => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('show.login.form')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
