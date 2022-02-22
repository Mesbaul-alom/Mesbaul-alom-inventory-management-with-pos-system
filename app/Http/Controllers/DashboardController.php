<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasRole('user')){
            return view ('userdash');
        }elseif(Auth::user()->hasRole('admin')){
            $admin=Admin::all()->get();
            $adminCount=$admin->count();
            dd($adminCount);
            return view ('admin.index',compact('adminCount'));
        }elseif(Auth::user()->hasRole('super_admin')){
            return view ('superdash');
        }
        return view('admin.index');
    }
    public function myprofile()
    {
        return view ('myprofile');
    }
    public function postcreate()
    {
        return view ('postcreate');
    }


}
