<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        return view('auth.admin.help', compact('user'));
    }

    public function submitHelp(HelpRequest $request){
        $request->validated();
        $user = Auth::user();
        $user->helps()->create([
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        return redirect()->back()
            ->with('success', 'message send successfully!');
    }
}
