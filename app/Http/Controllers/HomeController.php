<?php

namespace AccountActivity\Http\Controllers;

use Illuminate\Http\Request;
use AccountActivity\UserLoginHistory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {
	$UserLoginHistory = UserLoginHistory::select(DB::raw('created_at, inet_ntoa(user_ip) as user_ip'))->where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->offset(1)->take(5)->get();
	return View::make('show')->with('UserLoginHistory', $UserLoginHistory);
    }
}
