<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = OrderModel::orderBy('order_no', 'desc')->paginate(10);
        $orderCount = OrderModel::count();

        if($request['order-all']){
            $orders = OrderModel::orderBy('order_no', 'desc')->paginate(10);
        }
        else if($request['order-customer']){
            $orders = OrderModel::where('isDealer', 0)
                ->orderBy('order_no', 'desc')->paginate(10);
        }
        else if($request['order-dealer']){
            $orders = OrderModel::where('isDealer', 1)
                ->orderBy('order_no', 'desc')->paginate(10);
        }

        return view('store.admin.order-management.index-order-management')
            ->with('orders', $orders)
            ->with('orderCount', $orderCount);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderShow =  OrderModel::find($id);
        $orderdetailsShow = OrderDetailModel::where('order_no', $id)->get();

        return view('store.admin.order-management.show-order-management')
            ->with('orderShow', $orderShow)
            ->with('orderdetailsShow', $orderdetailsShow);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
