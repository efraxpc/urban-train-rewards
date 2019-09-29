<?php

namespace App\Http\Controllers;
use App\PrizeCategory;
use App\Offer;
use DB;
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
        $user = auth()->user();

        if(!is_null($user)){
            $prize_categories_query = DB::table('rewards')
                ->join('offer', 'rewards.offer_id', '=', 'offer.id')
                ->join('prize_category', 'prize_category.id', '=', 'offer.prize_category_id')
                ->join('rewards_user', 'rewards_user.user_id', '=', 'rewards.id')
                ->join('users', 'rewards_user.user_id', '=', 'users.id')
                ->where('users.id','=',$user->id)
                ->select('prize_category.*')
                ->get();
            $collection = collect($prize_categories_query);
            $prize_categories = $collection->unique()->values()->all();
        }else {
            $prize_categories = PrizeCategory::all();

        }


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