<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SharedCard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        // 1. Cards this user accepted
        $cardsAcceptedCount = $user->sharedCards()->count();
        // 2. User's cards accepted by others
        $cardsAcceptedByOthersCount = SharedCard::where('my_card_id', optional($user->myCard)->id)->count();
        $sharedCards = $user->sharedCards()->with('myCard')->latest()->take(2)->get();
        return view('auth.admin.dashboard', compact('user','sharedCards','cardsAcceptedCount','cardsAcceptedByOthersCount'));
    }

}
