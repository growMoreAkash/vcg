<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getList(): string
    {
        return "List of posts";
    }


    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'pdfFile' => 'nullable|mimes:pdf|max:10000',
        ]);

        $data = $request->all();

        // if ($request->hasFile('photo')) {
        //     $data['photo'] = $request->file('photo')->store('photos', 'public');
        // }

        // if ($request->hasFile('pdfFile')) {
        //     $data['pdfFile'] = $request->file('pdfFile')->store('pdfs', 'public');
        // }

        $post = Post::create($data);
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return Post::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Note: For multipart/form-data updates in Laravel, use POST with _method=PUT
        $data = $request->all();

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($post->photo);
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $post->update($data);
        return response()->json($post, 200);
    }

    // DELETE post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete([$post->photo, $post->pdfFile]);
        $post->delete();
        return response()->json(['message' => 'Post deleted'], 200);
    }
}
