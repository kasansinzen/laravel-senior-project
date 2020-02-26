<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentModel;
use Auth;

class PaymentController extends Controller
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
        $paymentsIndex = PaymentModel::where('user_id', $user)->get();
        $paymentCount = PaymentModel::where('user_id', $user)->count();

        return view('store.user.payment.index-payment')
            ->with('paymentsIndex', $paymentsIndex)
            ->with('paymentCount', $paymentCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.user.payment.create-payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request['payment_bank']){
            return redirect()->back();
        }
        else{
            $paymentStore = new PaymentModel();
            $paymentStore->payment_bank = $request['payment_bank'];
            $paymentStore->payment_accountno = $request['payment_accountno'];
            $paymentStore->payment_name = $request['payment_name'];
            $paymentStore->payment_description = $request['payment_description'];
            $paymentStore->user_id = Auth::user()->user_id;
            $paymentStore->save();

            return redirect('/store/payment');
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
        $paymentShow = PaymentModel::find($id);

        return view('store.user.payment.show-payment')
            ->with('paymentShow', $paymentShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentEdit = PaymentModel::find($id);

        return view('store.user.payment.edit-payment')
            ->with('paymentEdit', $paymentEdit);
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
        $paymentDestroy = PaymentModel::find($id);
        $paymentDestroy->delete();

        return redirect('/store/payment');
    }
}
