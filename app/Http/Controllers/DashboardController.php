<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $categories = Category::with('tasks')->get();
        $todos = Todo::all();
        
        return view('dashboard', compact('categories', 'todos'));
    }
}
