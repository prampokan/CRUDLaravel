@extends('app')

@section('content')

<div class="wrapper">

  <!-- Navbar -->
    @include('template.navbar')
  <!-- /.navbar -->

  <!-- Sidebar -->
    @include('template.sidebar')
  <!-- Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dataUser') }}">Back</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
        @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
      @endif
      <div class="card-body"> 
        <form action="{{ url('update', $user->user_id) }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama User" value="{{ $user->name }}"> 
          </div>
          <div class="form-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username User" value="{{ $user->username }}">
          </div>
          <div class="form-group">
            <input type="text" id="email" name="email" class="form-control" placeholder="Email User" value="{{ $user->email }}">
          </div>
          <div class="form-group">
           <button type="submit" class="btn btn-success">Edit Data</button>
          </div>
        </form>
      </div>
    </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    @include('template.footer')
</div>


</html>

@endsection