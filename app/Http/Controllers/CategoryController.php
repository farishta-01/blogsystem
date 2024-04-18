<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {

        $data = Category::all();

        return view('adminpanel.Category', compact('data'));
    }
    public function saveCat(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',

        ]);


        $record = new Category();
        $record->name = $request->input('name');

        $record->save();

        return response()->json(['success' => 'Data saved successfully']);
    }


}

