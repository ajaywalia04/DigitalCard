<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{

    public function create()
    {
        $socialLinks = Auth::user()->socialMedias->pluck('link', 'name')->toArray();
        return view('auth.admin.landingPage.social-media', compact('socialLinks'));
    }

    public function store(SocialMediaRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        foreach ($request->input('social') as $name => $link) {
            if (!empty($link)) {
                $user->socialMedias()->updateOrCreate([
                    'name'    => $name
                ],[
                    'link'    => $link,
                ]);
            }
        }

        return redirect()->route('dashboard.social.create')
            ->with('success', 'Social links added successfully!');
    }

}
