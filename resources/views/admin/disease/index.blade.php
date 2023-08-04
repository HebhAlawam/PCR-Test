@extends('admin.layouts.main')

 
@section('title')
		All Diseases
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
                <h3 class="card-title">Diseases</h3>
              </div>
              <div class="col-md-3">
                <a href="{{ route('disease.create')}}" class="btn btn-success">Create</a>
                <a href="{{ route('disease.trash')}}" class="btn btn-warning ml-3">Trash</a>
              </div>
            </div>
            
          </div> <!-- /.card-body -->
          <div class="card-body"> 
            @if ($msg = Session::get('success'))
                <div class="alert alert-info">
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
                  <th scope="col">name</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @if (count($diseases) > 0)
              @foreach ($diseases as $disease)
                <tr>
                  <th scope="row">{{ ($diseases->currentPage()-1) * $diseases->perPage() + $loop->index + 1 }}</th>
                  <td>{{$disease->name}}</td>

                  <td>
                    <a href="{{ route('disease.softdelete',$disease->id)}}" class="btn btn-danger mr-2">Delete</a>
                  </td>
                </tr>
              @endforeach  

              @else
                <td>No disease created yet!</td>
              @endif
              </tbody>
            </table>
                {!! $diseases->links() !!}
           
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  @endsection
