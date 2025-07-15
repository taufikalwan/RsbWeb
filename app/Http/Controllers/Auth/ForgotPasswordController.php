<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    // Tambahkan properti ini
    protected $linkRequestView = 'frontend.auth.password.email';

    public function showLinkRequestForm()
    {
        return view($this->linkRequestView);
    }
}
