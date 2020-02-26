<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpgradeModel;
use File;
use Illuminate\Support\Facades\Storage;

class AdminUpgradeController extends Controller
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
        $upgrades = UpgradeModel::orderBy('upgrade_id', 'desc')->paginate(10);

        return view('store.admin.upgrade-management.index-upgrade-management')
            ->with('upgrades', $upgrades);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upgrade = UpgradeModel::find($id);

        return view('store.admin.upgrade-management.show-upgrade-management')
            ->with('upgrade', $upgrade);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upgrade = UpgradeModel::find($id);
        Storage::disk('public')->delete($upgrade->upgrade_picture);
        $upgrade->delete();

        return redirect('store/admin/upgrade-management');
    }
}
