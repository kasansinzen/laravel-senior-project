<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\OrderStatusModel;
use Auth;
use App\Models\DealerModel;
use Illuminate\Support\Collection;

class OrderController extends Controller
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
    public function index(Request $request)
    {
        $user = Auth::user()->user_id;
        $orders = OrderModel::where('user_id', $user)->orderBy('order_no', 'desc')->paginate(10);
        $orderCount = OrderModel::where('user_id', $user)->count();
        $checked = 0;

        if($request['order-all']){
            $checked = 1;
            $orders = OrderModel::where('user_id', $user)->orderBy('order_no', 'desc')->paginate(10);
        }
        else if($request['order-customer']){
            $checked = 2;
            $orders = OrderModel::where('user_id', $user)->where('isDealer', 0)
                ->orderBy('order_no', 'desc')->paginate(10);
        }
        else if($request['order-dealer']){
            $checked = 3;
            $orders = OrderModel::where('user_id', $user)->where('isDealer', 1)
                ->orderBy('order_no', 'desc')->paginate(10);
        }
        
        return view('store.user.order.index-order')
            ->with('orders', $orders)
            ->with('orderCount', $orderCount)
            ->with('checked', $checked);
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
        $orderstatusShow = OrderStatusModel::get();
        $user = Auth::user();

        return view('store.user.order.show-order')
            ->with('orderShow', $orderShow)
            ->with('orderdetailsShow', $orderdetailsShow)
            ->with('orderstatusShow', $orderstatusShow)
            ->with('user', $user);
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
        $orderUpdate = OrderModel::find($id);
        $orderUpdate->orderstatus_id = $request['orderstatus_id'];
        $orderUpdate->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = OrderModel::find($id);
        /*$orderDetails = OrderDetailModel::where('order_no', $id)->get();
        //dd($orderDetails);
        foreach ($orderDetails as $orderDetail) {
            $orderDetailDestroy = OrderDetailModel::where('order_no', $id)->get();
            dd($orderDetailDestroy);
            $orderDetailDestroy->delete();
        }

        $order->delete();*/
        $orderDetails->delete();

        return redirect('/store/order');
    }
}
