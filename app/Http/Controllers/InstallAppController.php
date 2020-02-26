<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class InstallAppController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex() 
    {
    	$user = Auth::user()->user_id;
    	return view('store.user.install-app.index-install')
    		->with('user', $user);
    }
}
