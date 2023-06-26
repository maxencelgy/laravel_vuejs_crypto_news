<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Guide;
use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'articles' =>  Guide::latest('created_at')->take(3)->get(),
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }
}
