<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        $users = User::all();
        return Inertia::render('Home', ['users' => $users]);
    }
}
