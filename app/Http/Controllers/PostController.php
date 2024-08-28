<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function savedata(Request $req)
    {
        $req->validate([
            'tittle' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'desc' => 'required',
        ]);

        $formdata = $req->all();

        if (!empty($formdata['id'])) {
            $tbl = Post::find($formdata['id']);
        } else {
            $tbl = new Post;
        }

        if ($req->hasFile('photo')) {
            $req->validate([
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // If there's a new photo, upload it
            $photoPath = $req->file('photo')->store('photos');
            $tbl->photo = $photoPath;
        }


        // If no new photo is uploaded and there's an old photo,
        // keep the old photo
        if (empty($tbl->photo) && !empty($formdata['old_photo'])) {
            $tbl->photo = $formdata['old_photo'];
        }

        $tbl->tittle = $formdata['tittle'];
        $tbl->author = $formdata['author'];
        $tbl->category_id = $formdata['category_id'];
        $tbl->desc = $formdata['desc'];

        $tbl->save();

        return response()->json(['success' => 'Changes are successful']);
    }

    public function editdata(Request $request)
    {
        $id = $request->input('id');
        $record = Post::find($id);

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    public function deletedata(Request $req)
    {
        Post::where('id', $req->id)->delete();
        return response()->json(['error' => 'Data is deleted']);
    }

    public function post()
    {
        $data = Post::all();
        $categories = Category::all();

        return view('adminpanel.post', compact('data', 'categories'));
    }
}
