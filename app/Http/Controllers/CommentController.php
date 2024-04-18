<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function savecomment(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->message = $request->input('message');
        $comment->save();

        if ($request->ajax()) {
            
            return response()->json(['success' => 'Your comment has been submitted successfully!']);
        } else {
            // If not AJAX, redirect back with success message
            return redirect()->back()->with('success', 'Your comment has been submitted successfully!');
        }
    }

}


