<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;

class BlogController extends Controller
{
    public function getBlog()
    {
    	$newss = NewsModel::get();
    	
    	return view('home.blog-home')
    		->with('newss', $newss);
    }
}
