<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offer';
    protected $fillable = [
        'offer_name', 'offer_short_description', 'offer_long_description', 'offer_link', 
        'offer_worth', 'country_id', 'offer_network', 'prize_category_id', 'refferals'
    ];

    public function saveOffer($data,$file_name)
    {
        $this->offer_name = $data['offer_name'];
        $this->offer_short_description = $data['offer_short_description'];
        $this->offer_long_description = $data['offer_long_description'];
        $this->offer_image = $file_name;
        $this->offer_link = $data['offer_link'];
        $this->offer_worth = $data['offer_worth'];
        $this->offer_network = $data['offer_network'];
        $this->refferals = $data['refferals'];
        
        $this->country_id = $data['country_id'];
        $this->save();

        return 1;
    }
    public function updateOffer($data)
    {
        $offer = $this->find($data['id']);
        $offer->offer_name = $data['offer_name'];
        $offer->offer_short_description = $data['offer_short_description'];
        $offer->offer_long_description = $data['offer_long_description'];
        $offer->offer_link = $data['offer_link'];
        $offer->offer_worth = $data['offer_worth'];
        $offer->country_id = $data['country_id'];
        $offer->refferals = $data['refferals'];
        $offer->offer_network = $data['offer_network'];
        if(isset($data['offer_image'])){
            $offer->offer_image = $data['reward_image'];
        }
        $offer->save();
        return 1;
    }
}