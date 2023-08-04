@extends('frontend.main')

@section('content')

@section('title')
        show reservation 
@endsection

@section('content')

<div class="col-lg-7 col-md-12 form_box type_one  ">

      <h2>show reservation</h2>
      <div class="row">
        @if($reservation->appointment < Carbon\Carbon::now())
        <div class="col-md-12 mb-3">
           The resulte:
                @if ($reservation->result === 1)  <p class=" btn-danger"> Positive </p>
                @elseif ($reservation->result === 0) <p class=" btn-success"> Negative </p>
                @else <p class=" btn-info"> under processing </p>
                @endif
        </div>
        @endif
        <div class="col-md-6 mb-3">
            <p>id_num : {{ $reservation->id_num }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <p>first_name : {{ $reservation->first_name }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <p>last_name : {{ $reservation->last_name }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <p>email : {{ $reservation->email }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <p>birth_day : {{ $reservation->birth_day }}</p>
        </div>

        <div class="col-md-6 mb-3">
            <p>phone : {{ $reservation->phone }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <p>address : {{ $reservation->address }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <p>gender :
                @if ($reservation->gender == 1) Female
                @else male
                @endif
            </p>
        </div>

        <div class="col-md-6 mb-3">
            <p>appointment : {{ $reservation->appointment }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <p>center : {{ $reservation->center->name }}</p>
        </div>
        <div class="col-md-6 mb-3">
            <p> diseases :
                @foreach($reservation->diseases as $disease)
                    <p>{{$disease->name}}</p>
                @endforeach
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <p> symptoms :
                @foreach($reservation->symptoms as $symptom)
                    <p>{{$symptom->name}}</p>
                @endforeach
            </p>
        </div>
      </div>

      @if($reservation->appointment > Carbon\Carbon::now())
       <div class="col-lg-12 col-md-12 ">
        <form method="POST" action="{{route('form.destroy', $reservation->id)}}">
             @csrf @method('DELETE')
            <div class="form-group mg_top apbtn">
               <button class="theme_btn tp_one" type="submit">Cancel</button>
            </div>
        </form>
     </div>
     @endif

  </div>


@endsection
