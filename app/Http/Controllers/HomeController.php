<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PrizeCategory;
use Auth;
use App\Offer;

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
        return view('pages.frontend.home.index',compact('prize_categories'));
    }

    public function readOfferDoc($offer_id)
    {
        $offer = Offer::where('id', $offer_id)
                        ->first();
        return view('pages.frontend.home.readOfferDoc',compact('offer'));
    }

}
