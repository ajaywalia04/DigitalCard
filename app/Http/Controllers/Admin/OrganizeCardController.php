<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizeCardRequest;
use App\Models\MyCard;
use Illuminate\Support\Facades\Auth;

class OrganizeCardController extends Controller
{
    public function create(MyCard $mycard)
    {
        $user = Auth::user()->load('tag','category','cardnote');
        $mycard = $mycard->load(['tag','category','cardNotes' => function ($query) use ($user) {
                         $query->where('user_id', $user->id);
            }]);
        $tagIds = $mycard->tag->pluck('id')->toArray();
        $categoryIds = optional($mycard->category->first())->id;
        return view('auth.admin.organize-card', compact('mycard','user','tagIds','categoryIds'));
    }

    public function store(OrganizeCardRequest $request,Mycard $mycard)
    {
        $request->validated();
        $user = Auth::user();
        $user->cardnote()->updateOrCreate(
            [
            'my_card_id'    => $mycard->id
            ],
            [
                'note'=> $request->notes,
            ]);


        $mycard->tag()->sync($request->tags);

        $mycard->category()->sync($request->category);

        return redirect()->route('admin.dashboard.shared.card.view')
            ->with('success', 'Assigned successfully!');
    }
}
