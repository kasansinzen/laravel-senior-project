<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ShopingDealerController extends Controller
{
	public function registerDealer()
    {
        return view('shop.dealer-auth.register-dealer');
    }

    public function registedDealer(Request $request, $userID)
    {
        if($request == null){
            return redirect()->back();
        }
        else{
            $dealerStore = new DealerModel();

            if($request['dealer_picture'] != null){
                $imageName = time().'.'.$request->dealer_picture->getClientOriginalExtension();
                $request->dealer_picture->move(public_path('images/dealer'), $imageName);
                $path = '/images/dealer/'. $imageName;
                $dealerStore->dealer_picture = $path;
            }

            $dealerStore->dealer_name = $request['dealer_name'];
            $dealerStore->dealer_tel = $request['dealer_tel'];
            $dealerStore->dealer_email = $request['dealer_email'];
            $dealerStore->user_id = $userID;
            //dd($dealer);
            $dealerStore->save();
            
            return redirect('/shop/'.$userID);
        }
    }

    public function loginDealer()
    {
    	return view('shop.dealer-auth.login-dealer');
    }

    public function checkLoginDealer()
    {
        if(Auth::check()){
            //return 
        }
        else{
            $this->loginDealer();
        }
    }
}
