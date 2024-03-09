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
        $verfiedInput = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
        if ($verfiedInput->fails()){
            $errors = [
                'errors' => $verfiedInput->errors()->all(),
                'status' => false
            ];
            return  response()->json($errors);
        }
        $newCategory = new Category();
        $newCategory->title = $request->input('title');
        $newCategory->description = $request->input('description');
        $newCategory->save();
        $categories = Category::all();
        return response()->json(['status' => true , 'back' => back()->with(['success' => 'Category Added successfully'])]);
    }
    public function update(Request $request) {
        $verfiedInput = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
        if ($verfiedInput->fails()){
            $errors = [
                'errors' => $verfiedInput->errors()->all(),
                'status' => false
            ];
            return  response()->json($errors);
        }
        $updateCategory = Category::findOrFail($request->category);
        $updateCategory->title = $request->input('title');
        $updateCategory->description = $request->input('description');
        $updateCategory->update();
        return response()->json(['status' => true , 'back' => back()->with(['success' => 'Category updated successfully'])]);
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
