<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialize;
use Auth;
use App\Models\PaymentModel;
use App\Models\ShopModel;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
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
            $userIndex = User::where('user_id', $id)->first();
        }

        return view('store.admin.profile-management.show-profile-management')
            ->with('userIndex', $userIndex);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userEdit = User::where('user_id', $id)->first();

        return view('store.admin.profile-management.edit-profile-management')
            ->with('userEdit', $userEdit);
        
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
                Storage::disk('public')->put('/uploads/admin/'.$extension, File::get($file));
                $path = ('/uploads/admin/'.$extension);
                $profileUpdate->picture = $path;
            }
            
            $profileUpdate->name = $request['name'];
            $profileUpdate->email = $request['email'];
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
}
