<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.dashboard.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.dashboard.detail', compact('blog'));
    }
}
