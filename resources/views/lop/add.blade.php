@extends('layouts.admin')

@section('title')
    <title>Thêm mới</title>
@endsection

@section('content')
    
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Lớp', 'key' => 'Thêm mới'])
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('lops.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Mã lớp</label>
                        <input type="text" name="MaLop" class="form-control" placeholder="Nhập Mã lớp">
                      </div>
                    <div class="form-group">
                      <label>Tên lớp</label>
                      <input type="text" name="TenLop" class="form-control" placeholder="Nhập tên lớp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
