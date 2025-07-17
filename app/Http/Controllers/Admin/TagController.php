<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;


class TagController extends Controller
{
    public function index($slug){
    }

    public function view()
    {
        $user = Auth::user();
        $tags = $user->tag;
        return view('auth.admin.tag',compact('tags'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('auth.admin.create-tag');
    }

    public function store(TagRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->tag()->create([
            'name'    => $request->name,
        ]);

        return redirect()->route('admin.dashboard.tag.view')
            ->with('success', 'Tag created successfully!');
    }

    public function edit(Tag $tag)
    {
        return view('auth.admin.edit-tag', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag){
        $request->validated();

        $tag->update([
            'name'    => $request->name,
        ]);

        return redirect()->route('admin.dashboard.tag.view')
            ->with('success', 'Tag updated successfully!');
    }
}
