<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpgradeModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class AdminReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getReportPayment()
    {
    	$upgrades = UpgradeModel::get();
    	$total = UpgradeModel::sum('upgrade_amount');

    	return view('store.admin.report-management.upgrade-report-management')
    		->with('upgrades', $upgrades)
    		->with('total', $total);
    }

    public function getReportOrder()
    {
    	$orders = OrderModel::get();
    	$orderdetails = OrderDetailModel::get();
    	$total = OrderModel::sum('order_totalprice');
        $discount = OrderModel::sum('order_totaldiscount');
        //dd($orderTotal = OrderModel::sum('order_totalprice'));

    	return view('store.admin.report-management.order-report-management')
    		->with('orders', $orders)
    		->with('orderdetails', $orderdetails)
    		->with('total', $total)
            ->with('discount', $discount);
    }

    private function resultReportOfPayment($payments)
    {
    	$total = 0;

    	foreach ($payments as $payment) {
    		$total = $total + $payment->payment_amount;
    	}

    	return $total; 
    }
}
