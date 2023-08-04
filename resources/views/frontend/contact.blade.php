@extends('frontend.main')

@section('content')
  <!-- start header -->
  <main class="main-content">
    <section class="page_title  ">
       <div class="container">
          <div class="row ">
             <div class="col-lg-12 d-flex">
                <div class="content_box">
                   <h1>Contact</h1>
                </div>
             </div>
          </div>
       </div>
    </section>

  <!-- end header -->

   <!--------Checkout-------->
   <section class="prevention_all ">
    <div class="container">
       <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
             <div class="icon_box type_two ">
                <div class="box">
                  <div class="icon-box pb-4">
                  <a href="https://www.google.com/maps/d/u/0/viewer?mid=1BSIfkU6WkY4xd0Nb8sUpYrZYyiI&hl=en&ll=36.72471377340382%2C28.167915&z=9" target="_blank">
                    <i class="fa-solid fa-location-dot fa-3x"></i></div>
                    <h4>Location</h4>
                  </a>
                    <span> Visit to explore the world</span>
                </div>
              
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="icon_box type_two ">
             <div class="box">
               <div class="icon-box pb-4">
                <i class="fa-solid fa-phone-volume fa-3x"></i>
                 
                </div>
                <h4><a href="tel:+963959869575" >Make a Call </a></h4>
               <span>or contact us by 
                <a href="https://api.whatsapp.com/send/?phone=963959869575" target="_blank">WhatsApp </a></span>
             </div>
           
       </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="icon_box type_two ">
          <div class="box">
            <div class="icon-box pb-4"><i class="fa-solid fa-envelope fa-3x"></i></div>
            <h4> <a href = "mailto: hebhalawam@gmail.com"> Send a Mail </a></h4>
            <span>Dont’s hesitate to mail</span>
          </div>
        
          </div>
        </div>

       </div>
    </div>
 </section>
 <!--------Checkout-------->
 

 <section class="prevention_all ">
  <div class="container">
    <div class="col-lg-10 col-md-10 m-auto ">
      <div class="funfacts_box ">
        <div class="image_box text-center">
            <img src="{{ asset('frontend/html/img/funfacts-home-4.png')}}" class="img-fluid" alt="img" />
        </div>
      </div>
    </div>
  </div>
  </section>

  @endsection





