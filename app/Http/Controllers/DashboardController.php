<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    // {
    //     return view('adminkab.index');
    // }
{
    if( Auth::user()->id_role == '1') {
        return view('adminkab.index');
    } else if (Auth::user()->id_role == '2') {
        return view('adminopd.index');
    } else if (Auth::user()->id_role == '3') {
        return view('adminsurat.index');
    } else if (Auth::user()->id_role == '4') {
        return view('user.index');
    } else if (Auth::user()->id_role == '5') {
        return view('TNDE.admin.dashboard');
    // } else {
    //     return view('assistant.dashboard');
    }
}
}
