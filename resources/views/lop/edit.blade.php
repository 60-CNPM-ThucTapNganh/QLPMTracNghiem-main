
@extends('layouts.admin')

@section('title')
<title>Chỉnh sửa</title>
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Lớp', 'key' => 'Chỉnh sửa'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('lops.update', ['MaLop' => $lop->MaLop]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mã lớp</label>
                            <input type="text"
                                   class="form-control"
                                   name="MaLop"
                                   value="{{ $lop->MaLop }}"
                                   placeholder="Nhập mã lớp"
                            >
                        </div>

                        <div class="form-group">
                            <label>Tên lớp</label>
                            <input type="text"
                                   class="form-control"
                                   name="TenLop"
                                   value="{{ $lop->TenLop }}"
                                   placeholder="Nhập tên lớp"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

