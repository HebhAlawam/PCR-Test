@extends('admin.layouts.main')


@section('title')
		All users
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

    <!-- Main user -->
    <section class="user">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="row">
              <div class="col-md-9">
                <h3 class="card-title">users</h3>
              </div>
              <div class="col-md-3">
                {{-- <a href="{{ route('user.create')}}" class="btn btn-success">Create</a> --}}

              </div>
            </div>


          </div> <!-- /.card-body -->
          <div class="card-body">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">name</th>
                  <th scope="col">Email</th>
                  <th scope="col">number_of_reservaation</th>

                  </tr>
              </thead>
              <tbody>
              @if (count($users) > 0)
              @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ ($users->currentPage()-1) * $users->perPage() + $loop->index + 1 }}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->reservations->count()}}</td>
                </tr>
              @endforeach

              @else
                <td>There is no user here yet!</td>
              @endif
              </tbody>
            </table>

          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.user -->
  </div>

  @endsection
