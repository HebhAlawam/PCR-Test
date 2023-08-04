@extends('frontend.main')

@section('content')
<!-- start carousel -->
 <section class="header"> 
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="50000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('frontend/html/img/2.png')}}" >
          <div class="info">
            <h1>Lorem, ipsum dolor.</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed consequatur esse vel placeat reprehenderit doloremque. Dicta quas ratione porro modi fuga maiores doloribus autem voluptatibus? Enim quam sint rerum odit!</p>
            <a href="{{ route('centers')}}" class=" theme_btn tp_two">Book Now</a>
          </div>
      </div>
        
      
      <div class="carousel-item ">
        <img src="{{ asset('frontend/html/img/3.png')}}" >
        <div class="info">
          <h1>Lorem, ipsum dolor. </h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae possimus itaque voluptate fugit nisi nesciunt quae consequuntur cupiditate quos quidem quo quia obcaecati praesentium fuga, aliquid voluptates quod libero sit?</p>
            <button class="theme_btn ">Lorem, ipsum.<i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>
     
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
      <span class="sr-only">Next</span>
    </button>
  </div>
</section>
<!-- end carousel -->

<!-- start laboratorys -->
<section class="laboratorys">
  <div class="container">
    <div class="text text-center  ">
      <h2>laboratorys</h2>
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