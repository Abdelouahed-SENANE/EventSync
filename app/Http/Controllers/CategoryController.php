<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function categories() {
        $categories = Category::all();
        return view('admin.categories' , ['categories' => $categories]);
    }

    public function store(Request $request) {
        $validatePicture = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
        if ($validatePicture->fails()){
            return response()->json(['errors' => $validatePicture->errors() , 'status' => false]);
        }
        $newCategory = Category::create([
            'title' => $verfiedInput->title,
            'description' => $verfiedInput->description
        ]);
        return response()->json(['status' => true , 'success' => 'Category added succefully']);
    }
    public function delete(Request $request) {
        try {
            $category = Category::findOrFail($request->category);
            $category->delete();
            return back()->with(['success' => 'Category is deleted succefully']);
        }catch(ModelNotFoundException $r){
            dd($r->getMessage());
        }

    }
}
