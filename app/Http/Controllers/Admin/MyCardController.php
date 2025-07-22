<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyCardEditRequest;
use App\Http\Requests\MyCardRequest;
use App\Models\MyCard;
use Illuminate\Support\Facades\Auth;

class MyCardController extends Controller
{
    public function index($slug){
        $myCard = MyCard::where('slug',$slug)->first();
        if($myCard){
            return view('web.cards.'.$myCard->card_no, compact('myCard'));
        }
        return redirect()->route('home.page')->with('error','The card does not exist or the link is invalid.');
    }

    public function view()
    {
        $user = Auth::user();
        $myCard = $user->myCard;
        MyCard::createQrCode();

        return view('auth.admin.viewCards.'.$myCard->card_no, compact('myCard'));
    }

    public function create()
    {
        $user = Auth::user();
        if($user->myCard){
           return redirect()->route('dashboard.view');
        }
        return view('auth.admin.create-new-card', compact('user'));
    }

    public function store(MyCardRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->myCard()->create([
            'full_name'    => $request->full_name,
            'job_title' => $request->job_title,
            'department' => $request->department,
            'company_name' =>$request->company_name,
            'phone_no' => $request->phone_no,
            'company_address' => $request->company_address,
            'bio' => $request->bio,
            'card_no' => $request->card_no,
            'email'=> $user->email,
        ]);

        MyCard::createQrCode();

        return redirect()->route('dashboard.card.view')
            ->with('success', 'Card created successfully!');
    }

    public function edit(Mycard $myCard)
    {
        return view('auth.admin.edit-card', compact('myCard'));
    }

    public function update(MyCardEditRequest $request, Mycard $myCard){
        $request->validated();
        $myCard->update([
            'full_name'    => $request->full_name,
            'job_title' => $request->job_title,
            'department' => $request->department,
            'company_name' =>$request->company_name,
            'phone_no' => $myCard->phone_no,
            'company_address' => $request->company_address,
            'bio' => $request->bio,
            'card_no' => $request->card_no,
            'email'=> $myCard->email,
        ]);

        return redirect()->route('dashboard.card.view')
            ->with('success', 'Card updated successfully!');
    }
}
