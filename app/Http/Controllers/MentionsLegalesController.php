<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class MentionsLegalesController extends Controller
{
    public function index()
    {
        return Inertia::render('Mentions/Index');
    }

    public function politique()
    {
        return Inertia::render('Mentions/Politique');
    }

}
