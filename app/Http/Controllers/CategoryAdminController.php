<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Guide;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CategoryAdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Category/admin/Index', [
            'filters' => Request::all('search', 'trashed'),
            'categories' => Category::select('*')
                ->orderBy('title')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($guide) => [
                    'id' => $guide->id,
                    'title' => $guide->title,
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Category/admin/Create');
    }

    public function store()
    {
        Category::create(
            Request::validate([
                'title' => ['required', 'max:100'],
            ])
        );

        return Redirect::back()->with('success', 'Categorie created.');
    }

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
            ])
        );

        return Redirect::back()->with('success', 'Guide updated.');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return Redirect::back()->with('success', 'Guide deleted.');
    }

    public function restore(Guide $organization)
    {
        $organization->restore();

        return Redirect::back()->with('success', 'Guide restored.');
    }
}
