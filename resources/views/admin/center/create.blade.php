@extends('admin.layouts.main')
 
@section('title')
		Add Center
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Centers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Centers</li>
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
                <h3 class="card-title">Centers</h3>
              </div>
              <div class="col-md-3">
                <!-- <a href="#" class="btn btn-primary">Create</a>
                <a href="#" class="btn btn-primary ml-3">Trash</a> -->
              </div>
            </div>
            
            
          </div> <!-- /.card-body -->
          <div class="card-body">
            <form action="{{route('center.store')}}" method="POST" enctype="multipart/form-data">@csrf
            
              <div class="form-group">
                <label for="namecenter">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="namecenter">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="citycenter">City</label>
                <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" id="citycenter">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="citycenter">Cost</label>
                <input name="cost" type="text" class="form-control @error('cost') is-invalid @enderror" id="citycenter">
                @error('cost')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="imgcenter">Image</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" id="imgcenter" name="image">
                  @error('cost')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
             
              <button type="submit" class="btn btn-primary">add</button>
            </form>
           
           
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  @endsection