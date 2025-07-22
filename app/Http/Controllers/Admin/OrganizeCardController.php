<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizeCardRequest;
use App\Models\MyCard;
use Illuminate\Support\Facades\Auth;

class OrganizeCardController extends Controller
{
    public function create(MyCard $myCard)
    {
        $user = Auth::user()->load('tags','categories');
        $myCard = $myCard->load(['tags','categories','cardNotes' => function ($query) use ($user) {
                         $query->where('user_id', $user->id);
            }]);
        $tagIds = $myCard->tags->pluck('id')->toArray();
        $categoryId = optional($myCard->categories->first())->id;
        return view('auth.admin.organize-card', compact('myCard','user','tagIds','categoryId'));
    }

    public function store(OrganizeCardRequest $request,Mycard $myCard)
    {
        $request->validated();
        $user = Auth::user();
        $user->cardNotes()->updateOrCreate(
            [
            'my_card_id'    => $myCard->id
            ],
            [
                'note'=> $request->notes,
            ]);


        $myCard->tags()->sync($request->tags);

        $myCard->categories()->sync($request->category);

        return redirect()->route('dashboard.shared.card.view')
            ->with('success', 'Assigned successfully!');
    }
}
