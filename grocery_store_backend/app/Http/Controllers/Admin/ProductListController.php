<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function GetProductListByRemarks($remark){
        // $remark = $remark;
        // $productList = ProductList::where('remark', $remark)->get();

        $productList = ProductList::with('categories')->where('remark', $remark)->limit(5)->get();

        return $productList;
    }

    public function GetProductListByCategory($id){
        $products = ProductList::where('category_id', $id)->get();
        return $products;
    }

    public function GetProductsById($id){
        $products = ProductList::where('id', $id)->get();
        return $products;
    }

    public function SearchProduct($search_term){
        $key = $search_term;
        $searchProduct = ProductList::where('title', 'LIKE', "%{$key}%")->orWhere('brand', 'LIKE', "%{$key}%")->limit(6)->get();

        return $searchProduct;
    }
}
