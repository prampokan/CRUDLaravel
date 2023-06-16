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
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Back to home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @if (session('success'))
        <p class="alert alert-primary">{{ session('success') }}</p>
      @endif
      <div class="card card-info card-outline">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('createUser') }}" class="btn btn-success"><i class="fas fa-plus-square"></i></a>
            </div>
        </div>
      
      <div class="card-body"> 
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach ($dataUser as $du)
                <tr>
                    <td>{{ $du->name }}</td>
                    <td>{{ $du->username }}</td>
                    <td>{{ $du->email }}</td>
                    <td>
                      <a href="{{ url('editUser', $du->user_id) }}"><i class="fa-solid fa-pen-to-square"></i></a> |
                      <a href="{{ url('destroy', $du->user_id) }}"><i class="fa-solid fa-trash" style="color: red"></i></a>
                    </td>
                </tr>
            @endforeach 
        </table>
      </div>
      <div class="card-footer">
        {{ $dataUser->links('pagination::bootstrap-4') }}
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