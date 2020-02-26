<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use App\Models\DealerModel;
use Auth;
use Session;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $discountsIndex = DiscountModel::where('user_id', $user->user_id)->orderBy('discount_id', 'desc')->paginate(10);
        $discountCount = DiscountModel::where('user_id', $user->user_id)->count();
        $level_id = 2;

        return view('store.user.discount.index-discount')
            ->with('discountsIndex', $discountsIndex)
            ->with('user', $user)
            ->with('level_id', $level_id)
            ->with('discountCount', $discountCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $producttypesCreate = ProductTypeModel::where('user_id', Auth::user()->user_id)->get();
        $checkProducttype = null;
        $producttype_id = $request['producttype_id'];

        if(!$request['producttype_id']){
            return view('store.user.discount.create-discount')
            ->with('checkProducttype', $checkProducttype)
            ->with('producttypesCreate', $producttypesCreate);
        }
        else{
            $productsCreate = ProductModel::where('producttype_id', $producttype_id)->get();
            $dealersCreate = DealerModel::where('user_id', Auth::user()->user_id)->get();
            $checkProducttype = ProductTypeModel::find($producttype_id);
            
            return view('store.user.discount.create-discount')
                ->with('producttypesCreate', $producttypesCreate)
                ->with('checkProducttype', $checkProducttype)
                ->with('productsCreate', $productsCreate)
                ->with('dealersCreate', $dealersCreate);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getProduct = ProductModel::find($request['product_id']);

        if($request['dealer_id'] == 0){
            Session::flash('error', 'โปรดเลือกตัวแทนจำหน่าย');
            return redirect()->back();
        }
        else{
            $discountStore = new DiscountModel();
            $discountStore->discount_percent = $request['discount_percent'];
            $discountStore->product_id = $request['product_id'];
            $discountStore->dealer_id = $request['dealer_id'];
            $discountStore->discount_unit = $request['discount_unit'];
            $discountStore->discount_result = 
            ($getProduct->product_price * $request['discount_unit']) * ($request['discount_percent'] / 100);
            $discountStore->user_id = Auth::user()->user_id;
            $discountStore->save();

            return redirect('/store/discount');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discountEdit = DiscountModel::find($id);
        $productsEdit = ProductModel::where('user_id', Auth::user()->user_id)->get();
        $dealersEdit = DealerModel::where('user_id', Auth::user()->user_id)->get();

        return view('store.user.discount.edit-discount')
            ->with('discountEdit', $discountEdit)
            ->with('productsEdit', $productsEdit)
            ->with('dealersEdit', $dealersEdit);
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
        if(!$id){
            return redirect()->back();
        }
        else{
            $discountUpdate = DiscountModel::find($id);
            $discountUpdate->discount_unit = $request['discount_unit'];
            $discountUpdate->discount_percent = $request['discount_percent'];
            $discountUpdate->save();

            return redirect('/store/discount');
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
        $discountDestroy = DiscountModel::find($id);
        $discountDestroy->delete();

        return redirect('/store/discount');
    }
}
