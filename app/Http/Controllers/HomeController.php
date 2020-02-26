<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Users;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->isAdmin){
            $upgrades = \App\Models\UpgradeModel::orderBy('upgrade_id', 'desc')->paginate(10);
            $orders = \App\Models\OrderModel::orderBy('order_no', 'desc')->paginate(10);
            
            $upgradeCount = \App\Models\UpgradeModel::count();
            $userCount = \App\User::whereNull('isAdmin')->count();
            $productCount = \App\Models\ProductModel::count();
            $orderCount = \App\Models\OrderModel::count();

            return view('store.admin.home')
                ->with('upgrades', $upgrades)
                ->with('orders', $orders)
                ->with('upgradeCount', $upgradeCount)
                ->with('userCount', $userCount)
                ->with('productCount', $productCount)
                ->with('orderCount', $orderCount);
        }
        else{
            $orders = \App\Models\OrderModel::where('user_id', $user->user_id)->orderBy('order_no', 'desc')->paginate(10);
            $news = \App\Models\NewsModel::orderBy('news_id', 'desc')->paginate(10);

            $orderCount = \App\Models\OrderModel::where('user_id', $user->user_id)->count();
            $customerCount = \App\Models\CustomerModel::where('user_id', $user->user_id)->count();
            $orderSum = \App\Models\OrderModel::where('user_id', $user->user_id)->sum('order_totalprice');
            $shopCount = \App\Models\ShopModel::where('user_id', $user->user_id)->count();

            $processInterval = $this->processIntervalOfUser($user->user_id);
            
            return view('store.user.home')
                ->with('orders', $orders)
                ->with('orderCount', $orderCount)
                ->with('customerCount', $customerCount)
                ->with('orderSum', $orderSum)
                ->with('shopCount', $shopCount)
                ->with('news', $news);
        }
    }

    public function processIntervalOfUser($userID)
    {
        $interval = \App\Models\IntervalModel::where('user_id', $userID)->latest()->first();

        if($interval){
            $today = date('Y-m-d h:m:s');
            $end = $interval->interval_end;

            if($today == $end){
                $user = new Users();
                $user->level_id = 1;
                $user->save();
            }
        }
    }
}
