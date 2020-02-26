<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\Storage;
use File;

class AdminNewsController extends Controller
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
        $newss = NewsModel::orderBy('news_id', 'desc')->paginate(10);
        $newsCount = NewsModel::count();

        return view('store.admin.news-management.index-news-management')
            ->with('newss', $newss)
            ->with('newsCount', $newsCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.admin.news-management.create-news-management');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new NewsModel();

        if($request['news_picture']){
            $file = $request['news_picture'];
            $extension = time().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put('/uploads/news/'.$extension, File::get($file));
            $path = ('/uploads/news/'.$extension);
            $news->news_picture = $path;
        }

        $news->news_header = $request['news_header'];
        $news->news_content = $request['news_content'];
        $news->save();

        return redirect('store/admin/news-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = NewsModel::find($id);

        return view('store.admin.news-management.show-news-management')
            ->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsModel::find($id);

        return view('store.admin.news-management.edit-news-management')
            ->with('news', $news);
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
        $news = NewsModel::find($id);

        if($request['news_picture']){
            Storage::disk('public')->delete($news->news_picture);

            $file = $request['news_picture'];
            $extension = time().'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put('/uploads/news/'.$extension, File::get($file));
            $path = ('/uploads/news/'.$extension);
            $news->news_picture = $path;
        }

        $news->news_header = $request['news_header'];
        $news->news_content = $request['news_content'];
        $news->save();

        return redirect('store/admin/news-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = NewsModel::find($id);
        Storage::disk('public')->delete($news->news_picture);
        $news->delete();

        return redirect('store/admin/news-management');
    }
}
