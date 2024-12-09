<?php

namespace App\Http\Controllers\Mhs;

use App\Http\Controllers\Controller;
use App\Models\Backend\Mhs;
use App\Models\Backend\Posts;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : Response
    {
        $mhs = Mhs::orderBy("id","DESC")->get();
        return Inertia::render("Mahasiswa/Posts",[
            "title" => "Mahasiswa ",
            "posts" => $mhs
        ]);
    }

    public function search(Request $request) 
    {
        
        $mhs = Mhs::where("nama","like", "%". $request->input("search") . "%")->orderBy("id","DESC")->get();
        return response()->json($mhs);
    }

    public function getProdi(Request $request) {
        $prodi = Posts::all();
        return response()->json($prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) : Response
    {

        return inertia::render("",[
            "title" => "Posts Create"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            "nama" => "required|string|max:255|unique:App\Models\Backend\mhs,nama",
            "npm" => "required|max:11|unique:App\Models\Backend\Mhs,npm",
            "postId" => "required",
            "image" => "exclude_if:image,null|image|mimes:jpg,png,jpeg,jfif|max:2048"
        ]);


        if($request->hasFile("image")) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = Storage::disk('image')->putFileAs('image', $file, $fileName);
        }else{
            $filePath = "image/default.jfif";
        }

        Mhs::create([
            "nama" => Str::upper($request->nama),
            "npm" => $request->npm,
            "postId" => $request->postId,
            "image" => $filePath
        ]);
        return Redirect::route('mahasiswa')->with('message', "Data berhasil disimpan");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->nama);
        $request->validate([
            "nama" => ['required',
                'string',
                'max:255',
                Rule::unique('mhs', 'nama')->ignore($id)],
            "npm" => ['required',
                'max:11',
                Rule::unique('mhs', 'npm')->ignore($id)],
            "postId" => ['required'],
            "image" => ['nullable',"image",
                "mimes:jpg,png,jpeg,jfif",
                "max:2048",
                Rule::unique('mhs', 'image')->ignore($id)],
        ]);
        $posts = Mhs::findOrFail($id);

        if($request->hasFile("image")) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = Storage::disk('image')->putFileAs('image', $file, $fileName);
            if(Storage::disk("image")->exists($posts->image) && $posts->image != "image/default.jfif") Storage::disk("image")->delete($posts->image);
        }else{
            $filePath = $posts->image;
        }

        $posts->update([ 
            "nama" => Str::upper($request->nama),
            "npm" => $request->npm,
            "postId" => $request->postId,
            "image" => $filePath 
        ]);
        
        return Redirect::route('mahasiswa')->with('message', "Data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Mhs::findOrFail($id);
        if(Storage::disk("image")->exists($post->image) && $post->image != "image/default.jfif") Storage::disk("image")->delete($post->image);
        $post->delete();
        return Redirect::route('mahasiswa')->with('message', "Data berhasil dihapus");
    }
}
