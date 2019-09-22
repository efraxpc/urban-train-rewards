<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PrizeCategory;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $prize_categories = PrizeCategory::all();
        $user_logued = Auth::user();
        return view('pages.frontend.home.index',compact('prize_categories'), compact('user_logued'));
    }

}
