<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\CustomerModel;
use App\Models\DealerModel;
use App\Models\DiscountModel;

class SendReportController extends Controller
{
    public function sendReportConfirm($customerID, $orderID)
    {
        $customer = CustomerModel::find($customerID);
        $order = OrderModel::find($orderID);
        $orderDetails = OrderDetailModel::where('order_no', $orderID)->get();

        $email = $customer->customer_email;
        $discountTotal = $this->discountResult($email, $orderDetails);
        $totalPrice = $order->order_totalprice;
        //dd($orderDetail);
        return view('sender.send-report-confirm')
            ->with('customer', $customer)
            ->with('order', $order)
            ->with('orderDetails', $orderDetails)
            ->with('discountTotal', $discountTotal)
            ->with('totalPrice', $totalPrice);
    }

    public function sendReportSuccess($customerID, $orderID)
    {
        $customer = CustomerModel::find($customerID);
        $order = OrderModel::find($orderID);
        $orderDetails = OrderDetailModel::where('order_no', $orderID)->get();

        $email = $customer->customer_email;
        $discountTotal = $this->discountResult($email, $orderDetails);
        $totalPrice = $order->order_totalprice;
        //dd($orderDetail);
        return view('sender.send-report-success')
            ->with('customer', $customer)
            ->with('order', $order)
            ->with('orderDetails', $orderDetails)
            ->with('discountTotal', $discountTotal)
            ->with('totalPrice', $totalPrice);
    }

    public function discountResult($email, $orderDetails)
    {
        $discount_total = 0;
        $dealers = DealerModel::get();

        foreach ($dealers as $dealer) {
            if($dealer->dealer_email == $email){
                $discounts = DiscountModel::where('dealer_id', $dealer->dealer_id)->get();
                foreach ($discounts as $discount) {
                    foreach ($orderDetails as $orderDetail) {
                        //dd($product['item']['product_id']);
                        if($discount->product_id == $orderDetail->product_id){
                            //dd($sum = $sum + $discount->discount_result);
                            if($orderDetail->unit >= $discount->discount_unit){
                                $discount_total = $discount_total + $discount->discount_result;
                            }
                        }
                    }
                }
            }
        }
        return $discount_total;
    }
}
