<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PrizeCategory;

class HomeController extends Controller
{
    public function getIndex()
    {
        $prize_categories = PrizeCategory::all();
        return view('pages.frontend.home.index',compact('prize_categories'));
    }
}
