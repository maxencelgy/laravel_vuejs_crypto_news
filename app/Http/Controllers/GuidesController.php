<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class GuidesController extends Controller
{

    public function index(){
        return Inertia::render('Guides/Index');
    }


    public function create()
    {
        return Inertia::render('Guides/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'content' => ['required', 'max:850'],
            'categoryId' => ['required', 'max:150'],
            'photo' => ['nullable', 'image'],
        ]);

        Guide::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'image' => $request->file('image') ? $request->file('image')->store('guides') : null,
            'categoryId' => $request->get('categoryId'),
        ]);

        return redirect()->route('guides')->with('success', 'Guide créé.');
    }




}
