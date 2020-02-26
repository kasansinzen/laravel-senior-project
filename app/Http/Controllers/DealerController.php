<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealerModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;

class DealerController extends Controller
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
        $user = Auth::user();
        $deals = DealerModel::where('user_id',$user->user_id)->orderBy('dealer_id', 'desc')->paginate(10);
        $dealerCount = DealerModel::where('user_id',$user->user_id)->count();
        $level_id = '2';

        return view('store.user.dealer.index-dealer')
            ->with('dealers', $deals)
            ->with('user', $user)
            ->with('level_id', $level_id)
            ->with('dealerCount', $dealerCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.user.dealer.create-dealer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request == null){
            return redirect()->back();
        }
        else{
            $dealerStore = new DealerModel();

            if($request['dealer_picture'] != null){
                $file = $request['dealer_picture'];
                $extension = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('/uploads/dealers/'.$extension, File::get($file));
                $path = ('/uploads/dealers/'.$extension);
                $dealerStore->dealer_picture = $path;
            }

            $dealerStore->dealer_name = $request['dealer_name'];
            $dealerStore->dealer_tel = $request['dealer_tel'];
            $dealerStore->dealer_email = $request['dealer_email'];
            $dealerStore->user_id = Auth::user()->user_id;
            //dd($dealer);
            $dealerStore->save();

            return redirect('/store/dealer');
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
        $dealerShow = DealerModel::find($id);
        $getCustomer = CustomerModel::where('customer_email', $dealerShow->dealer_email)->first();

        if($getCustomer){
            $orders = OrderModel::where('customer_id', $getCustomer->customer_id)->get();
            $total = $this->resultOfOrderDealer($getCustomer->customer_id);
        }
        else{
            $orders = null;
            $total = 0;
        }
        
        $orderdetails = OrderDetailModel::get();
        
        return view('store.user.dealer.show-dealer')
            ->with('dealerShow', $dealerShow)
            ->with('orders', $orders)
            ->with('orderdetails', $orderdetails)
            ->with('total', $total);
    }

    private function resultOfOrderDealer($id)
    {
        $total = 0;
        $orders = OrderModel::where('customer_id', $id)->get();
        foreach ($orders as $order) {
            $total = $total + $order->order_totalprice;
        }

        return $total;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dealerEdit = DealerModel::find($id);

        return view('store.user.dealer.edit-dealer')
            ->with('dealerEdit', $dealerEdit);
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
        if(!$request){
            return redirect()->back();
        }
        else{
            $dealerUpdate = DealerModel::find($id);

            if($request['dealer_picture']){
                $delete = Storage::disk('public')->delete($dealerUpdate->dealer_picture);
                //dd($delete);

                $file = $request['dealer_picture'];
                $extension = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('/uploads/dealers/'.$extension, File::get($file));
                $path = ('/uploads/dealers/'.$extension);
                $dealerUpdate->dealer_picture = $path;
            }

            $dealerUpdate->dealer_name = $request['dealer_name'];
            $dealerUpdate->dealer_tel = $request['dealer_tel'];
            $dealerUpdate->dealer_email = $request['dealer_email'];
            $dealerUpdate->user_id = Auth::user()->user_id;
            $dealerUpdate->save();

            return redirect('/store/dealer');
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
        $dealerDestroy = DealerModel::find($id);
        Storage::disk('public')->delete($dealerDestroy->dealer_picture);
        $dealerDestroy->delete();

        return redirect('/store/dealer');
    }
}
