@extends('admin.layouts.main')


@section('title')
		All reservations
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Dashboard</h1>
          </div>
          
          <!--
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        filter
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">by center</a>
                      <a class="dropdown-item" href="#">by date</a>
                    </div>
                  </li>
            </ol>
          </div>
          -->

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main reservation -->
    <section class="reservation">
      <div class="container-fluid">
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


          </div> <!-- /.card-body -->
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
                  <th scope="col">appointments</th>
                  <th scope="col">result</th>
                  <th scope="col">change result</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @if (count($reservations) > 0)
              @foreach ($reservations as $reservation)
                <tr>
                   <form method="POST" action="{{ route('reservation.update', [$reservation->id, $reservation->result])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                  <th scope="row">{{ ($reservations->currentPage()-1) * $reservations->perPage() + $loop->index + 1 }}</th>
                  <td>{{$reservation->center->name}}</td>
                  <td>{{$reservation->first_name}}</td>
                  <td>{{$reservation->last_name}}</td>
                  <td>{{$reservation->appointment}}</td>
                @if($reservation->appointment > Carbon\Carbon::now()->toDateTimeString())
                    <td>-</td>
                    <td>-</td>
                @else
                  <td id="result">
                      @if($reservation->result === 0) <p class="text-success">negative</p>
                     @elseif($reservation->result === 1) <p class="text-danger">positive</p>
                     @else <p class="text-primary"> under processing </p>
                     @endif
                  </td>

                 
                  <td>
                    <select class="form-select selectResulte"  name="result">
                      <option @if($reservation->result === null) {{ "selected" }} @endif value="NULL">Processing</option>
                      <option @if($reservation->result === 1) {{ "selected" }} @endif  value="1">Positive</option>
                      <option @if($reservation->result === 0) {{ "selected" }} @endif  value="0">Negative</option>
                    </select>
                  </td>
                @endif
                  <input type="hidden" value = "{{$reservation->id}}"  name= "id">
                  <td>
                  <button type="submit" class="btn btn-info mr-2">update</button>
                  </form>
                    <a href="{{ route('reservation.show',$reservation->id)}}" class="btn btn-info mr-2">show</a>
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



@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Script jquery-->
    <script src="{{ asset('frontend/html/js/jquery-3.6.0.min.js') }}" ></script>
<!-- change result -->
    <script type="text/javascript">

        $(document).ready(function () {
            $('.selectResulte').on('change',function(e) {
                var result = e.target.value;

                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $.ajax({
                    url:"{{route('reservation.result.update')}}",
                    type:"GET",
                    data: {
                        result: result
                    },
                    success:function (data) {
                        console.log('data');
                    },
                    error: function(data){
                      var errors = data.responseJSON;
       console.log(errors);
                    }
            });
        });
      });

    </script>
@endsection
