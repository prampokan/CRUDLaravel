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
            <h1 class="m-0">Home</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="text-center">
          <h1 class="mt-5">Welcome! <b>{{ Auth::user()->name }}</h1> 
          <h3>Continue see the <a href="{{ route('dataUser') }}">Data User</a></h3>
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