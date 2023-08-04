@extends('admin.layouts.main')
 
@section('title')
		trashed Symptoms
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Symptoms</li>
            </ol>
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
                <h3 class="card-title">Trashed Symptoms</h3>
              </div>
              <div class="col-md-3">
                <!-- <a href="#" class="btn btn-primary">Create</a>
                <a href="#" class="btn btn-primary ml-3">Trash</a> -->
              </div>
            </div>
            
            
          </div> <!-- /.card-body -->
          <div class="card-body">
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
              @foreach ($symptoms as $key =>  $symptom)
                <tr>
                <th scope="row">{{ ($symptoms->currentPage()-1) * $symptoms->perPage() + $loop->index + 1 }}</th>
                <td>{{$symptom->name}}</td>
                  <td>
                    
                    <a href="{{ route('symptom.back',$symptom->id) }}" class="btn btn-danger mr-2">recovery </a>
                  </td>
                </tr>
                @endforeach

                @else
                <td>No symptom Deleted yet!</td>
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
  <!-- /.content-wrapper -->

  @endsection