@extends('frontend.main')

@section('content')
<div ></div>
<!-- start laboratorys -->
<section class="laboratorys mt-12">
  <div class="container lab">
    <div class="text text-center  ">
      <h2 >Chose The Laboratory</h2>
    </div>

    <!-- end laboratorys -->

    <div class="companies">
      <div class="row">
       
        @foreach ($centers as $center)
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="single-box">
            <div class="box-image">
              <img src="{{ asset('uploads/images/centers/'.$center->image)}}" alt="Cmpany Name">
            </div>
            <div class="box-info">
              <h3>
                <a href="#">{{$center->name}}</a>
              </h3>
              <p class="location">
                <span class="value">
                  <i class="fas fa-map-marker-alt"></i>
                  {{$center->city}}
                <br>
                </span>

              </p>
              <div class="box-footer">
                <h5 class="price">{{$center->cost}}TL</h5>
                <a href="{{route('form.byCenter.create', $center->id)}}" class=" theme_btn tp_two">Book Now</a>
              </div>
            </div>
  
          </div>
        </div>
        @endforeach
       
    
      </div>
    </div>
    
</section>

<!-- start explore -->
<section class="explore_more two">
  <div class="container">
     <div class="row">
        <div class="col-lg-12">
           <div class="content_box text-center">
              <h1> Basic protective measures against<br class="disp_none_md" />the <span>new coronavirus</span> </h1>
              <a href="{{route ('Prevention')}}" class=" theme_btn tp_two">see the instructions</a>
           </div>
        </div>
        
     </div>
  </div>
</section>
<!-- end explore -->

@endsection