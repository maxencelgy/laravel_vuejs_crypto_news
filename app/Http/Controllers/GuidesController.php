<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Guide;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class GuidesController extends Controller
{

    public function index(){
        return Inertia::render('Guides/Index', [
            'likes' => Like::all(),
            'users' => User::all(),
            'articles' => Guide::where('online', 1)->get(),
            'categories' => Category::all(),
            'user' => [
                'id' => Auth::user()->id ?? 0,
            ],
        ]);
    }



    public function create()
    {
        $user = Auth::user();

        return Inertia::render('Guides/Create', [
            'categories' => Category::all(),
            'user' => $user,
        ]);
    }

    public function show(Guide $guide){
        if (!$guide->online) {
            return Redirect::route('home');
        }
        return Inertia::render('Guides/Show', [
            'article' => $guide,
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }
    public function success(Guide $guide){
        return Inertia::render('Guides/Success', [
            'article' => $guide,
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'content' => ['required'],
            'categoryId' => ['required', 'max:150'],
            'photo' => ['nullable', 'image'],
        ]);

        $guide = Guide::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'image' => $request->file('image') ? $request->file('image')->store('guides') : null,
            'categoryId' => $request->get('categoryId'),
        ]);

        return redirect()->route('guides.success', $guide)->with('success', 'Le guide apparaît une fois que l\'administrateur l\'aura mis en ligne.');
    }

}
