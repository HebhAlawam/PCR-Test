@extends('frontend.main')

@section('content')

@section('title')
		your reservations
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        
    <!-- Content Header (Page header) -->
    

    <!-- Main reservation -->
    <section class="reservation">
      <div class="container-fluid ">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="row">
              <div class="col-md-9">
                <h3 class="card-title">reservations</h3>
              </div>
              <div class="col-md-3">
                {{-- <a href="{{ route('reservation.create')}}" class="btn btn-success">Create</a> --}}

              </div>
            </div>


          </div> 
          <!-- /.card-body -->
          <div class="card-body">
            @if ($msg = Session::get('success'))
                <div class="alert alert-success">
                  {{$msg}}
                </div>  
              @endif
              @if ($msg = Session::get('warning'))
                <div class="alert alert-warning">
                  {{$msg}}
                </div>  
              @endif
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">center</th>
                    <th scope="col">first_name</th>
                    <th scope="col">last_name</th>
                    <th scope="col">email</th>
                    <th scope="col">gender</th>
                    <th scope="col">appointments/resulte</th>
                    <th scope="col"></th>

                  </tr>
              </thead>
              <tbody>
              @if (count($reservations) > 0)
              @foreach ($reservations as $reservation)
                <tr>
                  <th scope="row">{{ ($reservations->currentPage()-1) * $reservations->perPage() + $loop->index + 1 }}</th>
                  <td>{{$reservation->center->name}}</td>
                  <td>{{$reservation->first_name}}</td>
                  <td>{{$reservation->last_name}}</td>
                  <td>{{$reservation->email}}</td>
                  <td>
                    @if($reservation->gender == 0) Male @else Female @endif
                  </td>
                  @if($reservation->appointment > Carbon\Carbon::now())
                  <td>{{$reservation->appointment}}</td>
                  @else
                  <td>
                     @if($reservation->result === 0) <p class="text-success">negative</p>
                     @elseif($reservation->result === 1) <p class="text-danger">positive</p>
                     @else <p class="text-primary"> under processing </p>
                     @endif
                </td>
                     @endif

                  <td>
                    <a href="{{ route('form.show',$reservation->id)}}" class="btn btn-danger mr-2">show</a>
                  </td>
                </tr>
              @endforeach

              @else
                <td>No reservation created yet!</td>
              @endif
              </tbody>
            </table>
                {!! $reservations->links() !!}

          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.reservation -->
  </div>

  @endsection
