<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MyCard;
use App\Models\SharedCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SharedCardController extends Controller
{
    public function view(Request $request)
    {
        $user = Auth::user();

        $search = $request->input('search');

        $sharedCards = $user->sharedcard()
            ->whereHas('mycard', function ($query) use ($search) {
                if (!empty($search)) {
                    $query->where(function ($q) use ($search) {
                        $q->where('fullname', 'like', "%$search%")
                          ->orWhere('company_name', 'like', "%$search%")
                          ->orWhere('job_title', 'like', "%$search%")
                          ->orWhere('department', 'like', "%$search%");
                    });
                }
            })
            ->with(['mycard.tag','mycard.category',
                    'mycard.cardNotes' => function ($query) use ($user) {
                         $query->where('user_id', $user->id);
            }])
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]); // keep search term in pagination links
        return view('auth.admin.shared-card', compact('sharedCards', 'search', 'user'));
    }

    public function acceptCard(Request $request, MyCard $mycard){
        if (auth()->check()) {
            // User is logged in
            $user = auth()->user();
            $shared = SharedCard::where('user_id', $user->id)
                    ->where('mycard_id', $mycard->id)
                    ->first();
            if($shared){
                return redirect()->back()->with('success','Card is already exists');
            }else{
                $shared = $user->sharedcard()->create([
                    'mycard_id'       => $mycard->id,
                    'device_info'     => $request->userAgent(),
                ]);
            }
            return redirect()->back()->with('success','Card added successfully');

        } else {
            // User is NOT logged in
            session(['mycard' => $mycard->uuid]);
            return redirect()->route('show.login.form');
        }
    }
}
