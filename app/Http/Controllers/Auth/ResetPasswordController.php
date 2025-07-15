<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Show the password reset form.
     */
    public function showResetForm(Request $request, $token = null)
    {
        if (is_null($token)) {
            return redirect()->route('password.request');
        }

        return view('frontend.auth.password.reset', [
            'token' => $token,
            'email' => $request->input('email'),
        ]);
    }
}
