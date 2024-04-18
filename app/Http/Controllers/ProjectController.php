<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class ProjectController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }
    public function listingPage()
    {
        $post = Post::all();
        $category = Category::all();
        return view('frontend.listing', compact('post', 'category'));
    }
    public function medicalGuide()
    {
        $posts = Post::all();
        $category = Category::all();
        return view('frontend.medicalGuide', compact('posts', 'category'));
    }
    public function studyGuide()
    {
        $posts = Post::all();
        $category = Category::all();
        return view('frontend.studyGuide', compact('posts', 'category'));
    }
    public function travelGuide()
    {
        $posts = Post::all();
        $category = Category::all();
        return view('frontend.travelGuide', compact('posts', 'category'));
    }
    public function scientificGuide()
    {
        $posts = Post::all();
        $category = Category::all();
        return view('frontend.scientificGuide', compact('posts', 'category'));
    }
    public function postDetail($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('frontend.post', compact('post', 'comments'));
    }
    public function test()
    {
        return view('frontend.test');
    }




}
