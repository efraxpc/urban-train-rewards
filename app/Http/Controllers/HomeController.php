<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PrizeCategory;
use App\Offer;
use App\User;
use App\Reward;
use App\ContactInfo;
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
        $contact_info = ContactInfo::find(1);
        return view('pages.frontend.home.index',compact('prize_categories','contact_info'));
    }

    public function readOfferDoc($offer_id)
    {
        $offer = Offer::where('id', $offer_id)
                        ->first();
        $contact_info = ContactInfo::find(1);
        return view('pages.frontend.home.readOfferDoc',compact('offer','contact_info'));
    }
}