<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\OrderStatusModel;
use Auth;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function getSaledReport()
    {
        $user = Auth::user()->user_id;
    	$orders = OrderModel::where('user_id', $user)->get();
    	$orderdetails = OrderDetailModel::get();
    	$total = 0;
        $discount = 0;

    	foreach($orders as $order){
            if($order->orderstatus_id == 2){
                $total = $total + $order->order_totalprice;
                $discount = $discount + $order->order_totaldiscount;
            }
    	}

    	return view('store.user.report.saled-report')
    		->with('orders', $orders)
    		->with('orderdetails', $orderdetails)
    		->with('total', $total)
            ->with('discount', $discount);
    }

    public function getAllReport()
    {
        $user = Auth::user()->user_id;
    	$orders = OrderModel::where('user_id', $user)->get();
    	$orderdetails = OrderDetailModel::get();
    	$total = 0;
        $discount = 0;

    	foreach($orders as $order){
    		$total = $total + $order->order_totalprice;
            $discount = $discount + $order->order_totaldiscount;
    	}

    	return view('store.user.report.all-report')
    		->with('orders', $orders)
    		->with('orderdetails', $orderdetails)
    		->with('total', $total)
            ->with('discount', $discount);
    }

    public function getGeneratePDF()
    {
        $user = Auth::user()->user_id;
        $orders = OrderModel::where('user_id', $user)->get();
        $orderdetails = OrderDetailModel::get();
        $total = 0;
        $discount = 0;

        foreach($orders as $order){
            if($order->orderstatus_id == 2){
                $total = $total + $order->order_totalprice;
                $discount = $discount + $order->order_totaldiscount;
            }
        }

        $pdf = PDF::loadView('store.user.generate-report.report-to-pdf', 
            [
                'orders' => $orders,
                'orderdetails' => $orderdetails,
                'total' => $total,
                'discount' => $discount
            ]);

        return $pdf->stream('report-saled.pdf');
    }

}
