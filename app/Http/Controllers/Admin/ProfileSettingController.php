<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileSettingController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        return view('auth.admin.profile-setting', compact('user'));
    }
}
