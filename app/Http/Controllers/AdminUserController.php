<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use App\Models\UpgradeModel;
use App\Models\LevelModel;
use App\Models\IntervalModel;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
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
        $users = User::whereNull('isAdmin')->orderBy('user_id', 'desc')->paginate(10);
        $userCount = User::count();

        return view('store.admin.user-management.index-user-management')
            ->with('users', $users)
            ->with('userCount', $userCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.admin.user-management.create-user-management');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        if($request['picture'] != null){
            /*$imageName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('images/product'), $imageName);
            $path = '/images/user/'. $imageName;
            $user->picture = $path;*/

            $file = $request['picture'];
            $extension = time().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put('/uploads/users/'.$extension, File::get($file));
            $path = ('/uploads/users/'.$extension);
            $user->picture = $path;
        }
        
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->level_id = 2;
        $user->save();

        return redirect('/store/admin/user-management');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $shop = $this->checkHasShop($id);
        $upgrades = UpgradeModel::where('user_id', $id)->get();
        $total = $this->resultOfUpgrade($id);
        $levels = LevelModel::get();
        $interval = IntervalModel::where('user_id' ,$id)->latest()->first();
        $dateEnd = '-';
        $diff = '-';

            if($interval){
                $dateNow = date('Y-m-d h:m:s');
                $dateEnd = $interval->interval_end;

                $diff = round(abs(strtotime($dateNow) - strtotime($dateEnd)) / 86400);
            }
        //dd($diff);

        return view('store.admin.user-management.show-user-management')
            ->with('user', $user)
            ->with('shop', $shop)
            ->with('upgrades', $upgrades)
            ->with('total', $total)
            ->with('levels', $levels)
            ->with('dateEnd', $dateEnd)
            ->with('diff', $diff);
    }

    private function checkHasShop($id)
    {
        $shop = \App\Models\ShopModel::where('user_id', $id)->first();
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
        $user = User::find($id);

        return view('store.admin.user-management.edit-user-management')
            ->with('user', $user);
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
        $user = User::find($id);

        if($request['level_id']){
            $user->level_id = $request['level_id'];
            $user->save();

            if($user->level_id == '2'){
                $dateStart = date('Y-m-d h:m:s');
                $userSignup = time() + (86400 * 30);
                $dateEnd = date('Y-m-d h:m:s', $userSignup);

                $intervalUpdate = new IntervalModel();
                $intervalUpdate->interval_start = $dateStart;
                $intervalUpdate->interval_end = $dateEnd;
                $intervalUpdate->user_id = $id;
                $intervalUpdate->save();
            }

            return redirect()->back();
        }
        else{
            if ($request['picture']) {
                Storage::disk('public')->delete($user->picture);

                $file = $request['picture'];
                $extension = time().'.'.$file->getClientOriginalExtension();
                Storage::disk('public')->put('/uploads/users/'.$extension, File::get($file));
                $path = ('/uploads/users/'.$extension);
                $user->picture = $path;
            }

            $user->name = $request['name'];
            $user->email = $request['email'];  
            $user->save();

            return redirect('/store/admin/user-management');
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
        $user = User::find($id);
        Storage::disk('public')->delete($user->picture);
        $user->delete();

        return redirect('store/admin/user-management');
    }
}
