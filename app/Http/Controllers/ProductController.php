<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use App\Models\ShopModel;
use File;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->user_id;
        $productsIndex = ProductModel::where('user_id', $user)->orderBy('product_id', 'desc')->paginate(10);
        $productCount = ProductModel::where('user_id', $user)->count();
        $producttypesIndex = ProductTypeModel::where('user_id', $user)->get();
        $ptChecking = '';

        return view('store.user.product.index-product')
            ->with('productsIndex', $productsIndex)
            ->with('productCount', $productCount)
            ->with('producttypesIndex', $producttypesIndex)
            ->with('ptChecking', $ptChecking);
    }

    public function getProductOfType(Request $request) 
    {
        $user = Auth::user()->user_id;
        if ($request['producttype_id'] != 0) {
            $id = $request['producttype_id'];
            $productsIndex = ProductModel::where('user_id', $user)->where('producttype_id', $id)->paginate(10);
            $productCount = ProductModel::where('user_id', $user)->count();
            $producttypesIndex = ProductTypeModel::where('user_id', $user)->get();
            $ptChecking = ProductTypeModel::where('user_id', $user)->find($id);

            return view('store.user.product.index-product')
                ->with('productsIndex', $productsIndex)
                ->with('productCount', $productCount)
                ->with('producttypesIndex', $producttypesIndex)
                ->with('ptChecking', $ptChecking);
        }
        else{
            return redirect('/store/product');
        }
    }

    public function getProductType()
    {
        $id = Input::get("id");
        $user = Auth::user()->user_id;
        $productsIndex = ProductModel::where('user_id', $user)->where('producttype_id', $id)->get();
        //$productsIndex = json_decode($products);

        return view::make('store.user.product.index-product')
            ->with('productsIndex', $productsIndex);

        //return $productsIndex;

         //return response()->json(['response' => 'This is post method']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->user_id;
        $producttypesCreate = ProductTypeModel::where('user_id', $user)->get();

        return view('store.user.product.create-product')
            ->with('producttypesCreate', $producttypesCreate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['producttype_id'] == 0){
            Session::flash('error', 'โปรดเลือกประเภทสินค้า');
            return redirect()->back();
        }
        else{
            $productStore = new ProductModel();
            $id = Auth::user()->user_id;

            if($request['product_picture']){
                $file = $request['product_picture'];
                $extension = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('/uploads/products/'.$extension, File::get($file));
                $path = ('/uploads/products/'.$extension);
                $productStore->product_picture = $path;
            }
            
            $productStore->producttype_id = $request['producttype_id'];
            $productStore->product_name = $request['product_name'];
            $productStore->product_unit = $request['product_unit'];
            $productStore->product_price = $request['product_price'];
            $productStore->product_description = $request['product_description'];
            $productStore->user_id = $id;

            $shop = $this->createShop($id);
            if($shop){
                $productStore->save();
            }

            return redirect('/store/product');
        }
    }

    public function createShop($id)
    {
        $shop = ShopModel::where('user_id', $id)->first();
        if($shop != null){
            return redirect()->back();
        }
        else{
            $shopCreate = new ShopModel();
            $shopCreate->shop_url = 'https://kasansin-project2.000webhostapp.com/shop/'. $id;
            $shopCreate->user_id = $id;
            $shopCreate->save();

            return $id;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user()->user_id;
        $productShow = ProductModel::find($id);
        $url = Storage::url($productShow->product_picture);
        //dd($productShow->product_picture);

        return view('store.user.product.show-product')
            ->with('productShow', $productShow)
            ->with('user', $user)
            ->with('url', $url);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productEdit = ProductModel::find($id);
        $user = Auth::user()->user_id;
        $producttypes = ProductTypeModel::where('user_id', $user)->get();

        return view('store.user.product.edit-product')
            ->with('productEdit', $productEdit)
            ->with('producttypes', $producttypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request['product_name'] == null){
            Session::flash('error', 'โปรดเลือกประเภทสินค้า');
            return redirect()->back();
        }
        else{
            $productUpdate = ProductModel::find($id);

            if($request['product_picture']){
                /*$imageName = time().'.'.$request->product_picture->getClientOriginalExtension();
                $request->product_picture->move(public_path('images/product'), $imageName);
                $path = '/images/product/'. $imageName;
                $productUpdate->product_picture = $path;*/

                Storage::disk('public')->delete($productUpdate->product_picture);

                $file = $request['product_picture'];
                $extension = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('/uploads/products/'.$extension, File::get($file));
                $path = ('/uploads/products/'.$extension);
                $productUpdate->product_picture = $path;
            }    
         
            $productUpdate->producttype_id = $request['producttype_id'];
            $productUpdate->product_name = $request['product_name'];
            $productUpdate->product_unit = $request['product_unit'];
            $productUpdate->product_price = $request['product_price'];
            $productUpdate->product_description = $request['product_description'];
            
            $productUpdate->save();
            
            return redirect("/store/product");
        }       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDestroy = ProductModel::find($id);

        Storage::disk('public')->delete($productDestroy->product_picture);

        $productDestroy->delete();
        
        return redirect('/store/product');
    }
}