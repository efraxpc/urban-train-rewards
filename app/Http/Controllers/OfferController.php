<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Offer;
use App\Country;
use App\PrizeCategory;
use App\ContactInfo;
use DB;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex($prize_category_id = 0)
    {
        if(request()->ajax()) {
            $offers = Offer::select([
                'offer.id',
                'offer.offer_name',
                'offer.offer_short_description',
                'offer.offer_long_description',
                'offer.offer_link',
                'offer.offer_worth',
                'offer.offer_image',
                'offer.country_id',
                'offer.offer_network',
                'country.country_name as country',
                'offer.created_at',
            ]);
            if($prize_category_id !== 0){
                $offers->where('offer.prize_category_id', $prize_category_id);
            }
            $offers->join('country','country.id','=','offer.country_id')
            ->orderBy('id')
            ->get();

            return Datatables::of($offers)
            ->addColumn('action', function ($offer) {
                return '<a href="/backend/edit/offer/'.$offer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/backend/delete/offer/'.$offer->id.'" class="btn btn-xs btn-danger m-2"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
        }
        return view('pages.backend.offers.index');
    }

    public function getIndexFrontend($prize_category_id){
        $user = auth()->user();
        $contact_info = ContactInfo::find(1);
        $offers_query = DB::table('rewards')
            ->join('offer', 'rewards.offer_id', '=', 'offer.id')
            ->join('prize_category', 'prize_category.id', '=', 'offer.prize_category_id')
            ->join('rewards_user', 'rewards_user.user_id', '=', 'rewards.id')
            ->join('users', 'rewards_user.user_id', '=', 'users.id')
            ->where('users.id','=',$user->id)
            ->select('offer.*')
            ->get();
        $collection = collect($offers_query);
        $offers = $collection->unique()->values()->all();
        $user_has_offers = true;
        if(is_null($user) || count($offers) == 0){
            $offers = Offer::where('offer.prize_category_id', $prize_category_id)
                ->get();
            $user_has_offers = false;
        }
        return view('pages.frontend.offers.index', compact('offers','contact_info','user_has_offers'));
    }
    public function create()
    {
        $countries = Country::all();
        $prize_categories = PrizeCategory::All();
        return view('pages.backend.offers.create', compact('countries','prize_categories'));
    }
    public function store(Request $request)
    {
        $offer = new Offer();
        $data = $this->validate($request, [
            'offer_name'=>'required',
            'offer_short_description'=> 'required',
            'offer_long_description'=> 'required',
            'offer_link'=> 'required',
            'offer_worth'=> 'required',
            'country_id'=> 'required',
            'offer_network'=>'required',
            'offer_image'=>'required',
            'refferals'=> 'required|integer',
            'prize_category'=>'required'
        ]);
        $file_name = $request->offer_image->hashName();
        $file = $request->offer_image;
       
        $offer->saveOffer($data, $file_name);
        
        Storage::disk('public')->put('images', $file);
        return redirect('backend/offers')->with('success', 'Offer has been created!');
    }
    public function edit($id)
    {
        $offer = Offer::where('id', $id)
                        ->first();
        $countries = Country::all();
        $prize_categories = PrizeCategory::all();
        return view('pages.backend.offers.edit', compact('offer', 'countries', 'prize_categories', 'id'));
    }
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'offer_name'=>'required',
            'offer_short_description'=> 'required',
            'offer_long_description'=> 'required',
            'offer_link'=> 'required',
            'offer_worth'=> 'required',
            'refferals'=> 'required|integer',
            'country_id'=> 'required',
            'offer_network'=>'required',
            'prize_category'=>'required'
        ]);

        $reward = new Offer();
  
        if(isset($request->offer_image)){
            $file_name = $request->offer_image->hashName();
            $file = $request->offer_image;
            Storage::disk('public')->put('images', $file);
            $data['offer_image'] = $file_name;
        }

        $data['id'] = $id;
        $reward->updateOffer($data);        
        return redirect('/backend/offers')->with('success', 'Offer has been updated!!');
    }
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();

        return redirect('/backend/offers')->with('success', 'Offer has been deleted!!');
    }
}
