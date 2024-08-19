<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function saveData(Request $req)
    {
        $req->validate([
            'tittle' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'desc' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming 'photo' is the file field name
        ]);

        $formData = $req->all();
        $post = new Post;

        if ($req->hasFile('photo')) {
            $photoPath = $req->file('photo')->store('photos');
            $post->photo = $photoPath;
        }

        $post->tittle = $formData['tittle']; // Corrected typo
        $post->author = $formData['author'];
        $post->category_id = $formData['category_id'];
        $post->desc = $formData['desc'];

        $post->save();

        return response()->json(['success' => 'Post saved successfully']);
    }

    public function editData($id)
    {

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    public function deleteData($id)
    {
        // dd($id);
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        // Delete associated photo if it exists
        if (!empty($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return response()->json(['success' => 'Post deleted successfully']);
    }

    public function getAllPosts()
    {
        $posts = Post::all();

        return response()->json($posts);
    }
    public function updateData(Request $req, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $req->validate([
            'tittle' => 'sometimes|required',
            'category_id' => 'sometimes|required',
            'author' => 'sometimes|required',
            'desc' => 'sometimes|required',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $formData = $req->all();

        if ($req->hasFile('photo')) {
            if (!empty($post->photo)) {
                Storage::delete($post->photo);
            }
            $photoPath = $req->file('photo')->store('photos');
            $post->photo = $photoPath;
        }

        if (isset($formData['tittle'])) {
            $post->tittle = $formData['tittle'];
        }
        if (isset($formData['author'])) {
            $post->author = $formData['author'];
        }
        if (isset($formData['category_id'])) {
            $post->category_id = $formData['category_id'];
        }
        if (isset($formData['desc'])) {
            $post->desc = $formData['desc'];
        }

        $post->save();

        return response()->json(['success' => 'Post updated successfully']);
    }
}

