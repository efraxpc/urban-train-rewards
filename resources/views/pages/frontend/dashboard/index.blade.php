@extends('layouts.frontend.default')
@section('content')
<main>
    <div id="results">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-2">
                    <h3 style="color:#fff">Hi {{$user->getCompleteName()}}!</h3>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="filters_listing sticky_horizontal">
        <div class="container">
            <h5>Offers completed</h5>
        </div>
        <!-- /container -->
    </div>
    <div>
        <div class="sticky_horizontal">
            <div class="container">           
                <div class="float-left pt-2">
                        <!-- Target -->
                        <input id="foo" value="{{$refferal_link}}">
                        <!-- Trigger -->
                        <button class="btn" data-clipboard-target="#foo">
                            <i class="far fa-copy"></i>
                        </button>
                    </div>
            </div>
            <!-- /container -->

        </div>
    </div>

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
            </b>!-- /row -->
        </div>
    </div>
    <!-- /Filters -->

    <div class="container margin_60_35">

        <div class="row" style="display:block">
            <div class="col-12">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Completed</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_rewards_obj as $user_reward)

                        <tr>
                        <td>{{$user_reward['reward_name']}}</td>
                        <td>{{ date('d/M/Y', strtotime($user_reward['created_at'])) }}</td>
                        <td>@if ($user_reward['avaible'] == 1) Yes @else No @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            
        </div>
        <!-- /row -->
        <span>Your refferal is <b>{{$refferal->getCompleteName()}}</b></span>
        
        {{-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> --}}
 
        <div class="row">
                <div class="col-2">
                    <button type="button" class="btn btn-primary mt-2" @if ($show_claim_buttom == false ) disabled @endif>Claim Prize</button>
                </div>
            </div>
    </div>
    <!-- /container -->
</main>

<!--/main-->

@stop

