<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'content' => 'required',
            'image' => 'required',
            'categorie' => 'required',
        ]);

        Blog::create($validated);

        return redirect()->route('blog.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog = Blog::findOrFail($blog->id);

        $validated = $request->validate([
            'title' => 'required|max:255|unique:blogs,title,' . $blog->id,
            'content' => 'required',
            'image' => 'required',
            'categorie' => 'required',
        ]);

        $blog->update($validated);

        return redirect()->route('blog.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Data berhasil diperbarui.');

    }
}
