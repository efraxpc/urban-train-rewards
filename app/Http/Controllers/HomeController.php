<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PrizeCategory;
use Auth;
use App\Offer;
use App\User;

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

    public function callback(Request $request){
        $username = $request->input('subid');
        $survey = $request->input('survey');
        $earn = $request->input('earn');
        $pdtshow = $request->input('pdtshow');

        $cpalead_password = $request->input('password');
        if($cpalead_password == 'Master*1!cpalead$#@'){
            $user = User::where('username', $username)
                                    ->first();
            if($user){
                $user->points = $pdtshow;
                $user->completed_surveys = $user->completed_surveys + 1;
                $user->save();
                return response()->json([
                    'success' => True
                ]);
            }
        }
        
        return response()->json([
            'success' => False
        ]);
    }
}

