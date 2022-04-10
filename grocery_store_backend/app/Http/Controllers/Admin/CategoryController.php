<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function GetAllCategories(){
        $categories = Category::all();
        $categoryDetailsArr = [];

        foreach($categories as $value){
            $subcategory = Subcategory::where('category_id', $value['id'])->get();

            $item = [
                'category_id' => $value['id'],
                'category_name' => $value['category_name'],
                "category_image" => $value['image'],
                'subcategories' => $subcategory
            ];

            array_push($categoryDetailsArr, $item);
        }

        // return response()->json([
        //     "message" => $categories
        // ]);

        return $categoryDetailsArr;
        
    }

    public function GetCategoriesById($id){

        $category = Category::with('subCategories')->where('id', $id)->get();

        return $category;
    }
}
