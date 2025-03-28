<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaBlogRequest;
use App\Models\CategoriaBlog;
use Illuminate\Http\Request;

class CategoriaBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriaBlogs= CategoriaBlog::all();
        return view('categoriasBlog.index', compact('categoriaBlogs'));
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
    public function store(CategoriaBlogRequest $request)
    {
        CategoriaBlog::create($request->validated());

        return redirect()->route('categoriaBlog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriaBlog $categoriaBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaBlog $categoriaBlog)
    {
        $categoriaBlogs = CategoriaBlog::all();

        return view('categoriasBlog.edit', compact('categoriaBlog', 'categoriaBlogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaBlogRequest $request, CategoriaBlog $categoriaBlog)
    {
        $categoriaBlog->update($request->validated());
        return redirect()->route('categoriaBlog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriaBlog $categoriaBlog)
    {
        $categoriaBlog->delete();
        return redirect()->route('categoriaBlog.index');
    }
}
