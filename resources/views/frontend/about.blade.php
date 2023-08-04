@extends('frontend.main')

@section('content')

    <!-- start header -->
    <main class="main-content">
      <section class="page_title  ">
         <div class="container">
            <div class="row ">
               <div class="col-lg-12 d-flex">
                  <div class="content_box">
                     <h1>About Us</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
  
    <!-- end header -->
     <!------main-content------>
     <section class="about type_one">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <div class="heading icon_dark tp_one">
                  <h6>about Corona</h6>
                  <h1>Coronavirus Disease 2019 (COVID-19)</h1>
                  <span class="flaticon-virus icon"></span>
               </div>
               <div class="about_content">
                  <p class="description">It is a long established fact that a reader will be distracted . The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look
                     like readable English.
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, ea impedit corrupti eum quia explicabo animi libero cumque voluptatum magnam, consequuntur perferendis voluptatem neque sunt. Accusantium dolor magnam inventore officia!
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magni eos ipsum id, nisi repudiandae maxime placeat facere! Possimus ab suscipit nostrum labore sed officia quis corrupti incidunt at necessitatibus?
                  </p>
                 </div>
            </div>
            <div class="col-lg-6">
              <img src="{{ asset('frontend/html/img/instructions.jpg')}}" alt="">
            </div>
         </div>
      </div>
     </section>
@endsection