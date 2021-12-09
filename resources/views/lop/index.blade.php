@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Lớp', 'key' => 'Danh sách'])
    <!-- /.content-header -->
    <div class="row">
        <div class="col-md-12">
          <a href="{{ route('lops.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>                    
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã Lớp</th>
                        <th scope="col">Tên Lớp</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lops as $lop)
                        <tr>
                            <th scope="row">{{ $lop->MaLop }}</th>
                            <td>{{ $lop->TenLop }}</td>
                            <td>
                                <a href="{{ route('lops.edit', ['MaLop' => $lop->MaLop]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('lops.delete', ['MaLop' => $lop->MaLop]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="col-md-12">
            {{ $categories ->links('pagination::bootstrap-4') }}
        </div> --}}

    </div>
    </div>
@endsection
