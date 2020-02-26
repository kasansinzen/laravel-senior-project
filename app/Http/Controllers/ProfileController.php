<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialize;
use Auth;
use App\Models\UpgradeModel;
use App\Models\ShopModel;
use Carbon\Carbon;
use App\Models\IntervalModel;
use Illuminate\Support\Facades\Storage;
use File;

class ProfileController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()){
            $userIndex = Auth::user();
            $shop = $this->checkHasShop($id);
            $upgrades = UpgradeModel::where('user_id', $id)->get();
            $total = $this->resultOfUpgrade($id);
            $interval = IntervalModel::where('user_id' ,$id)->latest()->first();
            $dateEnd = '-';
            $diff = '-';
            $urlPic = $this->checkPathPicture($userIndex->picture);
            //dd($urlPic);
                if($interval){
                    $dateNow = date('Y-m-d h:m:s');
                    $dateEnd = $interval->interval_end;

                    $diff = round(abs(strtotime($dateNow) - strtotime($dateEnd)) / 86400);
                }
        }

        return view('store.user.profile.show-profile')
            ->with('userIndex', $userIndex)
            ->with('shop', $shop)
            ->with('upgrades', $upgrades)
            ->with('total', $total)
            ->with('dateEnd', $dateEnd)
            ->with('diff', $diff)
            ->with('urlPic', $urlPic);
    }

    private function checkHasShop($id)
    {
        $shop = ShopModel::where('user_id', $id)->first();
        if($shop){
            $getShop = $shop->shop_url;
            return $getShop;
        }
        else{
            $getShop = null;
            return $getShop;
        }
    }

    private function resultOfUpgrade($id)
    {
        $upgrades = UpgradeModel::where('user_id', $id)->get();
        $total = 0;

        foreach ($upgrades as $upgrade) {
            $total = $total + $upgrade->upgrade_amount;
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
        if(!$id){
            return redirect('/store');
        }
        else{
            $userEdit = User::find($id);
            $urlPic = $this->checkPathPicture($userEdit->picture);

            return view('store.user.profile.edit-profile')
                ->with('userEdit', $userEdit)
                ->with('urlPic', $urlPic);
        }
        
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
        if(!$request['name']){
            return redirect('/store');
        }
        else{
            $profileUpdate = User::find($id);

            if($request['picture']){
                Storage::disk('public')->delete($profileUpdate->picture);
                    
                $file = $request['picture'];
                $extension = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('/uploads/users/'.$extension, File::get($file));
                $path = ('/uploads/users/'.$extension);
                $profileUpdate->picture = $path;
            }
            
            $profileUpdate->name = $request['name'];
            $profileUpdate->save();

            return redirect('/store');
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
        //
    }

    public function checkPathPicture($pic)
    {
        $url = Storage::url($pic);
        $path = '';

        if(substr($url, 0,15) == '/storage/https:'){
            $path = $pic;
        }
        else{
            $path = Storage::url($pic);
        }

        return $path;
    }
}