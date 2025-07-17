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
        $mycard = MyCard::where('slug',$slug)->first();
        if($mycard){
            return view('web.cards.'.$mycard->card_no, compact('mycard'));
        }
        return redirect()->route('home.page')->with('error','The card does not exist or the link is invalid.');
    }

    public function view()
    {
        $user = Auth::user();
        $mycard = $user->mycard;
        MyCard::createQrCode();

        return view('auth.admin.viewCards.'.$mycard->card_no, compact('mycard'));
    }

    public function create()
    {
        $user = Auth::user();
        if($user->mycard){
           return redirect()->route('admin.dashboard');
        }
        return view('auth.admin.create-new-card', compact('user'));
    }

    public function store(MyCardRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->mycard()->create([
            'fullname'    => $request->fullname,
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

        return redirect()->route('admin.dashboard.card.view')
            ->with('success', 'Card created successfully!');
    }

    public function edit(Mycard $mycard)
    {
        return view('auth.admin.edit-card', compact('mycard'));
    }

    public function update(MyCardEditRequest $request, Mycard $mycard){
        $request->validated();
        $mycard->update([
            'fullname'    => $request->fullname,
            'job_title' => $request->job_title,
            'department' => $request->department,
            'company_name' =>$request->company_name,
            'phone_no' => $mycard->phone_no,
            'company_address' => $request->company_address,
            'bio' => $request->bio,
            'card_no' => $request->card_no,
            'email'=> $mycard->email,
        ]);

        return redirect()->route('admin.dashboard.card.view')
            ->with('success', 'Card updated successfully!');
    }
}
