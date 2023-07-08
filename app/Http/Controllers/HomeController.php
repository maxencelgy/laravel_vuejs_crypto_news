<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Guide;
use App\Models\Like;
use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'articles' =>  Guide::latest('created_at')->take(3)->where('online', 1)->get(),
            'articlesOne' =>  Guide::take(5)->where('online', 1)->get(),
            'categories' => Category::all(),
            'likes' => Like::all(),
            'user' => auth()->user(),
            'users' => User::all(),
        ]);
    }
}
