<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function categories() {
        $categories = Category::all();
        return view('admin.categories' , ['categories' => $categories]);
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
