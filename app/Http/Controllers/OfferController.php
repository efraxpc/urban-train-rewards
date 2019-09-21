<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Offer;
use App\Country;

class OfferController extends Controller
{
    public function getIndex()
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
            ])->join('country','country.id','=','offer.country_id')
            ->orderBy('id')
            
            ->get();
            return Datatables::of($offers)
            ->addColumn('action', function ($offer) {
                return '<a href="/edit/offer/'.$offer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/delete/reward/'.$offer->id.'" class="btn btn-xs btn-danger m-2"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->make(true);
        }
        return view('pages.backend.offers.index');
    }
    public function create()
    {
        $countries = Country::all();
        return view('pages.backend.offers.create', compact('countries'));
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
            'offer_network'=>'required'
        ]);
        $file_name = $request->offer_image->hashName();
        $file = $request->offer_image;
       
        $offer->saveOffer($data, $file_name);
        
        Storage::disk('public')->put('images', $file);
        return redirect('offers')->with('success', 'Offer has been created!');
    }
}
