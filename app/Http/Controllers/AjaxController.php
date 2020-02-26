<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Input;
use Auth;

class AjaxController extends Controller
{
	// shop/index-shop
    public function selectProducttype()
    {
    	$id = Input::get("id");
        $user = Input::get("user");
        $products = ProductModel::where('producttype_id', $id)->get();

        if($id == 0){
            $products = ProductModel::where('user_id', $user)->get();
        }

        $returnHTML = view('shop.ajax.select-product')->with('products', $products)->render();
        return response()->json(['html' => $returnHTML]); 
    }

    // store/user/product/ajax/select-product
    public function getProducttypeOfStore()
    {
    	$userID = Auth::user()->user_id;
    	$id = Input::get("id");
    	$productsIndex = ProductModel::where('user_id', $userID)->where('producttype_id', $id)->paginate(10);

    	$returnHTML = view('store.user.product.ajax-index-product')->with('productsIndex', $productsIndex)->render();
    	return response()->json(['html' => $returnHTML]);
    }
}
