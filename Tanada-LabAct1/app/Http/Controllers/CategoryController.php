<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory(){
        $categories = Category::all();
        return view("admin.category.category",compact("categories"));
    }
    public function newCategoryPage(){
        return view("admin.category.newCategory");
    }
    public function addCategory(Request $request){
        $data['user_id'] = auth()->user()->id;
        $data['category_name'] = $request->input('category');
        

        $insert = Category::create($data);

        return redirect()->route('AllCat');

    }
}
