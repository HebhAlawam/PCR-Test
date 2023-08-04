@extends('admin.layouts.main')
 
@section('title')
		All Symptoms
@endsection
 
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Symptoms</h1>
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
                <h3 class="card-title">Symptoms</h3>
              </div>
              <div class="col-md-3">
                <a href="{{ route('symptom.create')}}" class="btn btn-success">Create</a>
                <a href="{{ route('symptom.trash')}}" class="btn btn-warning ml-3">Trash</a>
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
                  <th scope="col">name</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @if (count($symptoms) > 0)
              @foreach ($symptoms as $symptom)
                <tr>
                  <th scope="row">{{ ($symptoms->currentPage()-1) * $symptoms->perPage() + $loop->index + 1 }}</th>
                  <td>{{$symptom->name}}</td>

                  <td>
                    <a href="{{ route('symptom.softdelete',$symptom->id)}}" class="btn btn-danger mr-2">Delete</a>
                  </td>
                </tr>
              @endforeach  

              @else
                <td>No symptom created yet!</td>
              @endif
              </tbody>
            </table>
                {!! $symptoms->links() !!}
           
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  @endsection
