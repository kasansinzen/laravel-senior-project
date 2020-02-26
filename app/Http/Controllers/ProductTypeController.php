<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTypeModel;
use Illuminate\Support\Facades\Input;
use Auth;

class ProductTypeController extends Controller
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
        $producttypesIndex = ProductTypeModel::where('user_id', $user)->paginate(10);
        
        return view('store.user.producttype.index-producttype')
            ->with('producttypesIndex', $producttypesIndex);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request['producttype_name']){
            return redirect()->back();
        }
        else{
            $producttypeStore = new ProductTypeModel();
            $producttypeStore->producttype_name = $request['producttype_name'];
            $producttypeStore->user_id = Auth::user()->user_id;
            $producttypeStore->save();

            return redirect('/store/producttype');
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
        $producttypeEdit = ProductTypeModel::find($id);

        return view('store.user.producttype.edit-producttype')
            ->with('producttypeEdit', $producttypeEdit);
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
        if(!$request['producttype_name']){
            return redirect()->back();
        }  
        else{
            $producttypeUpdate = ProductTypeModel::find($id);
            $producttypeUpdate->producttype_name = $request['producttype_name'];
            
            $producttypeUpdate->save();
            
            return redirect("/store/producttype");
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
        $producttypeDestroy = ProductTypeModel::find($id);
        $producttypeDestroy->delete();

        return redirect('/store/producttype');
    }
}
