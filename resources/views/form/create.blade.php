@extends('auth.main')

@section('title')
		Reservition Form
@endsection

@section('content')
    <div class="row ">
        <div class="col-lg-7 col-md-12 m-auto form ">
           <div class="form_box type_one ">
            <h2>Testing Appointment Form</h2>
            <h3>COVID-19 Initial Survey</h3>
            <form id="test-form" action="{{route('form.store')}}" method="POST" enctype="multipart/form-data" role="form" >@csrf
                <input type= "hidden" name="center_id" value="{{$center_id}}">
                <!-- start symptoms -->
                    <div class="form-group">
                        <h4>Are you currently experiencing any symptoms?</h4>
                        @error('symptoms')
                            <span class="text-danger">
                              <strong>{{ 'Choose at least one' }}</strong>
                            </span>
                        @enderror
                        <div class="row">
                            @foreach($symptoms as $symptom)
                                <div class="col-md-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="{{ $symptom->id }}" id="{{ $symptom->name }}" name="symptoms[]" 
                        {{ (is_array(old("symptoms")) and in_array($symptom->id, old("symptoms"))) ? 'checked' : '' }}
                                        >

                                        <label class="form-check-label" for="{{ $symptom->name }}">{{ $symptom->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                <!-- end symptoms -->

                <!-- start diseases -->
                    <div class="form-group">
                        <h4>Please check all that apply</h4>
                        @error('diseases')
                          <span class="text-danger">
                              <strong>{{ 'Choose at least one' }}</strong>
                          </span>
                        @enderror
                        <div class="row">
                            @foreach ($diseases as $disease)
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$disease->id}}" id="{{$disease->name}}" name="diseases[]" 
                        {{ (is_array(old("diseases")) and in_array($disease->id, old("diseases"))) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="{{$disease->name}}">{{$disease->name}}</labe>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                <!-- end  -->
                
                  <hr>
                  <!-- start  person-->
                  <section class="person">
                    <div class="form-group ">
                         <h4>Your Personal Information</h4>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <label for="Firstname">First name</label>
                              <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" id="Firstname"  value="{{old('first_name')}}" >
                                @error('first_name')
                                    <span class="text-danger" role="alert"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                              <label for="Lastname">Last name</label>
                              <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" id="Lastname" value="{{old('last_name')}}"  >
                                @error('last_name')
                                    <span class="text-danger" role="alert"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="user_id">ID</label>
                                <input name="id_num" type="text" class="form-control @error('id_num') is-invalid @enderror" id="user_id" value="{{old('id_num')}}" >
                                @error('id_num')
                                    <span class="text-danger" role="alert"> {{ 'The ID is requierd and must be number ' }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="Datebirth">Date of Birth</label>
                                <input name="birth_day" type="date" class="form-control @error('birth_day') is-invalid @enderror" id="Datebirth" value="{{old('birth_day')}}" max="{{ now()->format('Y-m-d') }}">  
                                @error('birth_day')
                                    <span class="text-danger" role="alert"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                      <!--start Gender  -->
                    <div class="form-group">
                        <label for="Lastname">Gender</label>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="0" {{ (old('gender') == '0') ? 'checked' : ''}}>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Male 
                                    </label>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios7" value="1" {{ (old('gender') == '1') ? 'checked' : ''}}>
                                    <label class="form-check-label" for="exampleRadios7">
                                        Female 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--end Gender  -->

                      <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}" >
                          <small id="emailHelp" class="form-text text-muted">example@example.com</small>
                      </div>
    
                        <div class="form-group">
                         <label for="exampleInputAddress">Address</label>
                         @error('address')
                            <div class="text-danger">{{ $message }}</div>
                         @enderror
                          <div class="row">                   
                              <div class="col-md-6">
                                <input name="address[]" type="text" class="form-control" id="exampleInputAddress" aria-describedby="addressHelp" value="{{old('address.0')}}"  

                                >
                                <small id=" addressHelp" class="form-text text-muted">Street Address</small>
                              </div>
    
                              <div class="col-md-6">
                                  <input name="address[]" type="text" class="form-control" id="CityInput" aria-describedby="CityHelp" value="{{old('address.1')}}"> 
                                  <small id="CityHelp" class="form-text text-muted">City</small>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputPhone">Phone Number</label>
                          @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                          <div class="row">
                              <div class="col-md-4">  
                                  <input type="text" class="form-control" id="exampleInputPhone" aria-describedby="PhoneHelp" maxlength="4" value="+905" >
                                  <small id="PhoneHelp" class="form-text text-muted">Area Code</small>
                              </div>
                              <div class="col-md-8">  
                                  <input name="phone" type="text" class="form-control" id="exampleInputNumber" aria-describedby="NumberHelp" maxlength="10" value="{{old('phone')}}"  >
                                  <small id="NumberHelp" class="form-text text-muted">Phone Number</small>
                              </div>
                          </div>
                        </div>
                  </section>   
                   <!-- end person -->

                    <hr>
                   <!-- start datetime -->
                    <div class="form-group">
                        <h4>Get Your Appointment</h4>
                        @error('appointment')
                            <div class="text-danger">{{ $message }}</div>
                         @enderror
                        <div class="row">
                            <div class='col-lg-12'>
                                <input type='datetime-local' class="form-control" id="datetimepicker" name="appointment"value="{{old('appointment')}}" >
                            </div>
                        </div>
                    </div>
                 <!-- end  datetime -->

                <!-- start  -->
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                    </div>
                <!-- end  -->

                <!-- start -->
                    <p>
                        By submitting I hereby confirm that the information I have given above is true, and that I will comply with the terms and conditions outlined above.
                    </p>
                    <div class="col-lg-12 col-md-12 ">
                        <div class="form-group mg_top apbtn">
                           <button class="theme_btn tp_one" type="submit">Submit</button>
                        </div>
                     </div>
                <!-- end -->
            </form>
        </div>
        </div>
    </div>

@endsection


@section('script')

<script type="text/javascript">
    (function () {
  'use strict';
console.log('hii');
  })();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(document).ready(function() {
        var today = "<?php echo date('Y-m-d'); ?>";
        var blockedDatesAndTimes = {!! json_encode($bookedDates) !!};

       flatpickr("#datetimepicker", {
            enableTime: true,
            minDate: 'today',
            minTime: "08:00", // Minimum selectable time
            maxTime: "20:00", // Maximum selectable time
            minuteIncrement: 60,
            disable: blockedDatesAndTimes,
            // Additional configuration options
        });
    });
    </script>
@endsection
