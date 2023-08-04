@extends('frontend.main')

@section('content')

  <!-- start header -->
  <main class="main-content">
    <section class="page_title">
       <div class="container">
          <div class="row">
             <div class="col-lg-12 d-flex">
                <div class="content_box">
                   <h1>Prevention</h1>
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
        <div class="col-lg-3 col-md-6 col-sm-6">
             <div class="icon_box type_two ">
                <h2><a href="prevention-single.html">Wash your hands often with soap</a></h2>
                <div class="icon_box">
                   <img src="{{ asset('frontend/html/img/spongewash.png')}}" class="img-fluid svg_icon" alt="img" />
                </div>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="icon_box type_two  " >
               <h2><a href="prevention-single.html">Avoid touching your eyes, nose, and mouth</a></h2>
               <div class="icon_box">
                  <img src="{{ asset('frontend/html/img/man-touch.png')}}" class="img-fluid svg_icon" alt="img" />
               </div>
            </div>
         </div>
      
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="icon_box type_two  " >
               <h2><a href="prevention-single.html">Avoid close contact with people who are sick</a></h2>
               <div class="icon_box">
                  <img src="{{ asset('frontend/html/img/socialspreading.png')}}" class="img-fluid svg_icon" alt="img" />
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="icon_box type_two  " >
             <h2><a href="prevention-single.html">Stay home if you are sick,  get medical care</a></h2>
             <div class="icon_box">
                <img src="{{ asset('frontend/html/img/sorethroat.png')}}" class="img-fluid svg_icon" alt="img" />
             </div>
          </div>
       </div>
       <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="icon_box type_two  " >
           <h2><a href="prevention-single.html">Cover your mouth and nose with a tissue</a></h2>
           <div class="icon_box">
              <img src="{{ asset('frontend/html/img/maskaick.png')}}" class="img-fluid svg_icon" alt="img" />
           </div>
        </div>
     </div>
     <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="icon_box type_two  " >
         <h2><a href="prevention-single.html">Immediately wash your hands with  water</a></h2>
         <div class="icon_box">
            <img src="{{ asset('frontend/html/img/handwashwashing.png')}}" class="img-fluid svg_icon" alt="img" />
         </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="icon_box type_two wow fadeIn " data-wow-delay="00ms" data-wow-duration="1500ms">
       <h2><a href="prevention-single.html">If you are sick: You should wear a facemask</a></h2>
       <div class="icon_box">
          <img src="{{ asset('frontend/html/img/maskmedical.png')}}" class="img-fluid svg_icon" alt="img" />
       </div>
    </div>
 </div>
 <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="icon_box type_two  " >  
     <h2><a href="prevention-single.html">If surfaces are dirty, clean them</a></h2>
     <div class="icon_box">
        <img src="{{ asset('frontend/html/img/object-hygiene.png')}}" class="img-fluid svg_icon" alt="img" />
     </div>
  </div>
</div>
        
       </div>
    </div>
 </section>
 <!--------Checkout-------->
 @endsection





