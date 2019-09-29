@extends('layouts.frontend.default')
@section('content')
<main>
    <div id="results">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-2">
                    <h3 style="color:#fff">My section</h3>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /results -->
    <div class="filters_listing sticky_horizontal">
        <div class="container">
            <h5>Rule of the offer</h5>
        </div>
        <!-- /container -->
    </div>
    <!-- /filters -->

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- /Map -->

    <div class="collapse" id="filters">
        <div class="container margin_30_5">
            <div class="row">
                <div class="col-md-4">
                    <h6>Rating</h6>
                    <ul>
                        <li>
                            <label class="container_check">Superb 9+ <small>25</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Very Good 8+ <small>133</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Good 7+ <small>32</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Pleasant 6+ <small>12</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Tags</h6>
                    <ul>
                        <li>
                            <label class="container_check">Wireless Internet <small>12</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Smoking Allowed <small>11</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Wheelchair Accesible <small>23</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_check">Parking <small>56</small>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="add_bottom_30">
                        <h6>Distance</h6>
                        <div class="distance"> Radius around selected destination <span></span> km</div>
                        <input type="range" min="10" max="100" step="10" value="30" data-orientation="horizontal">
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /Filters -->
    <div class="container margin_60_35">
        <div class="card">
            <div class="card-header">
                <h2>{{$offer->offer_name}}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">{!!$offer->offer_long_description!!}</p>
                <a href="{{route('assing-offer-to-user', $offer->id)}}" class="btn btn-primary">Continue with this offer</a>


            </div>
        </div>
        
        <!-- /row -->

        {{-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">I agree</a></p> --}}

    </div>
    <!-- /container -->

</main>
<!--/main-->

@stop