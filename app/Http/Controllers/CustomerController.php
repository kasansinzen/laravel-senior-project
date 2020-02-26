<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Auth;

class CustomerController extends Controller
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
        $customersIndex = CustomerModel::where('user_id', $user)->orderBy('customer_id', 'desc')->paginate(10);
        $customerCount = CustomerModel::where('user_id', $user)->count();

        return view('store.user.customer.index-customer')
            ->with('customersIndex', $customersIndex)
            ->with('customerCount', $customerCount);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerShow = CustomerModel::find($id);
        $ordersShow = OrderModel::where('customer_id', $id)->get();
        $orderdetailsShow = OrderDetailModel::get();
        $total = 0;

        foreach ($ordersShow as $order) {
            $total = $total + $order->order_totalprice;
        }
        
        return view('store.user.customer.show-customer')
                ->with('ordersShow', $ordersShow)
                ->with('orderdetailsShow', $orderdetailsShow)
                ->with('customerShow', $customerShow)
                ->with('total', $total);
    }
}
