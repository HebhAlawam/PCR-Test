@extends('admin.layouts.main')

 
@section('title')
		All Centers
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="row">
              <div class="col-md-9">
                <h3 class="card-title">Centers</h3>
              </div>
              <div class="col-md-3">
                <a href="{{ route('center.create')}}" class="btn btn-success">Create</a>
                <a href="{{ route('center.trash')}}" class="btn btn-warning ml-3">Trash</a>
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
                  <th scope="col">image</th>
                  <th scope="col">name</th>
                  <th scope="col">cost<span> (TL)</span> </th>
                  <th scope="col">city</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @if (count($centers) > 0)
              @foreach ($centers as $center)
                <tr>
                  <th scope="row">{{ ($centers->currentPage()-1) * $centers->perPage() + $loop->index + 1 }}</th>
                  <td><img src="{{asset('uploads/images/centers/'.$center->image)}}"  width="80" > </td>
                  <td>{{$center->name}}</td>
                  <td>{{$center->cost}}</td>
                  <td>{{$center->city}}</td>

                  <td>
                    <a href="{{ route('center.reservations',$center->id) }}" class="btn btn-primary mr-2">reservations</a>
                    <a href="{{ route('center.edit',$center->id) }}" class="btn btn-primary mr-2">Edit</a>
                    <a href="{{ route('center.softdelete',$center->id)}}" class="btn btn-danger mr-2">Delete</a>
                  </td>
                </tr>
              @endforeach  

              @else
                <td>No center created yet!</td>
              @endif
              </tbody>
            </table>
                {!! $centers->links() !!}
           
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  @endsection
