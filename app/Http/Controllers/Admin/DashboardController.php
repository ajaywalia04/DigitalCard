<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SharedCard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        // 1. Cards this user accepted
        $cardsAcceptedCount = $user->sharedcard()->count();
        // 2. User's cards accepted by others
        $cardsAcceptedByOthersCount = SharedCard::where('mycard_id', optional($user->mycard)->id)->count();
        $sharedCards = $user->sharedcard()->with('mycard')->latest()->take(2)->get();
        return view('auth.admin.dashboard', compact('user','sharedCards','cardsAcceptedCount','cardsAcceptedByOthersCount'));
    }

}
