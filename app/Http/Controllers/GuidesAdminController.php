<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class GuidesAdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Guides/admin/Index', [
            'filters' => Request::all('search', 'trashed'),
            'guides' => Auth::user()->guides()
                ->orderBy('title')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($guide) => [
                    'id' => $guide->id,
                    'title' => $guide->title,
                    'content' => $guide->content,
                    'image' => $guide->image,
                    'categorie' => $guide->getCategory(),
                    'user_id' => $guide->user_id,
                    'deleted_at' => $guide->deleted_at,
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Guide/Create');
    }

//    public function store()
//    {
//        Auth::user()->account->organizations()->create(
//            Request::validate([
//                'name' => ['required', 'max:100'],
//                'email' => ['nullable', 'max:50', 'email'],
//                'phone' => ['nullable', 'max:50'],
//                'address' => ['nullable', 'max:150'],
//                'city' => ['nullable', 'max:50'],
//                'region' => ['nullable', 'max:50'],
//                'country' => ['nullable', 'max:2'],
//                'postal_code' => ['nullable', 'max:25'],
//            ])
//        );
//
//        return Redirect::route('organizations')->with('success', 'Organization created.');
//    }

    public function edit(Guide $guide)
    {
        return Inertia::render('Guides/admin/Edit.vue', [
            'guide' => [
                'id' => $guide->id,
                'title' => $guide->title,
                'content' => $guide->content,
                'image' => $guide->image,
                'categoryId' => $guide->categoryId,
                'user_id' => $guide->user_id,
            ],
        ]);
    }

    public function update(Guide $guide)
    {

        $guide->update(
            Request::validate([
                'title' => ['nullable', 'max:50'],
                'content' => ['nullable', 'max:50'],
                'image' => ['nullable', 'max:150'],
                'categoryId' => ['nullable', 'max:50'],
                'user_id' => ['nullable', 'max:50'],
                'online' => ['required']
            ])
        );

        return Redirect::back()->with('success', 'Guide updated.');
    }

    public function destroy(Guide $organization)
    {
        $organization->delete();

        return Redirect::back()->with('success', 'Guide deleted.');
    }

    public function restore(Guide $organization)
    {
        $organization->restore();

        return Redirect::back()->with('success', 'Guide restored.');
    }
}
