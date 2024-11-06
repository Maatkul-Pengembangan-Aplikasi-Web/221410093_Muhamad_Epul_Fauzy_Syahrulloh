<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Backend\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : Response
    {
        $posts = Posts::all();
        return Inertia::render("Posts/Posts", ["title" => "Prodi","posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|string|max:255|unique:App\Models\Backend\Posts,nama",
            "kode" => "required|string|max:255|unique:App\Models\Backend\Posts,kode"
        ]);
        Posts::create(["nama" => Str::upper($request->nama),"kode" => Str::upper($request->kode)]);
        return Redirect::route('prodi')->with('message', "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nama" => ['required',
                'string',
                'max:255',
                Rule::unique('posts', 'nama')->ignore($id)],
            "kode" => ['required',
                'string',
                'max:255',
                Rule::unique('posts', 'kode')->ignore($id)]
        ]);
        $posts = Posts::findOrFail($id);
        $posts->update(["nama" => Str::upper($request->nama),"kode" => Str::upper($request->kode)]);
        
        return Redirect::route('prodi')->with('message', "Data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return Redirect::route('prodi')->with('message', "Data berhasil dihapus");
    }
}
