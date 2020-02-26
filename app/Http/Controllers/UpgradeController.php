<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpgradeModel;
use Auth;
use Session;
use File;
use Illuminate\Support\Facades\Storage;

class UpgradeController extends Controller
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
        return view('store.user.upgrade.index-upgrade');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upgradeFreeUsing()
    {
        return view('store.user.upgrade.free-upgrade');
    }

    public function upgradePaymentUsing()
    {
        return view('store.user.upgrade.payment-upgrade');
    }

    public function upgradePaymentConfirming()
    {
        return view('store.user.upgrade.payment-confirm-upgrade');
    }

    public function upgradePaymentConfirmed(Request $request)
    {
        
        $upgradeStore = new UpgradeModel();
        $user = Auth::user()->user_id;

        if($request['upgrade_picture']){
            $file = $request['upgrade_picture'];
            $extension = time().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put('/uploads/upgrades/'.$extension, File::get($file));
            $path = ('/uploads/upgrades/'.$extension);
            $upgradeStore->upgrade_picture = $path;
        }
        
        $upgradeStore->upgrade_accountno = $request['upgrade_accountno'];
        $upgradeStore->upgrade_bank = $request['upgrade_bank'];
        $upgradeStore->upgrade_amount = $request['upgrade_amount'];
        $upgradeStore->upgrade_name = $request['upgrade_name'];
        $upgradeStore->upgrade_date = $request['upgrade_date'];
        $upgradeStore->upgrade_time = $request['upgrade_time'];
        $upgradeStore->user_id = $user;
        $upgradeStore->save();

        if($upgradeStore->upgrade_id){
            Session::flash('success', 'ยืนยันข้อมูลชำระเรียบร้อย');
            $getUpgrade = UpgradeModel::find($upgradeStore->upgrade_id);

            return view('store.user.upgrade.success-upgrade')
                ->with('getUpgrade', $getUpgrade);
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
        //
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
