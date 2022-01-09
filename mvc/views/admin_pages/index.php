<style>
    a.card {
        text-decoration: none;
    }

    a.card:hover {
        background-color: aliceblue;
    }

    .notification {
        position: relative;
    }

    .txt {
        color: white;
        background-color: red;
        font-size: small;
        position: absolute;
        padding: 2px;
        top: 5px;
        right: 5px;
        border-radius: 100%;
    }
</style>
<p>DANH MỤC</p>
<hr>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-primary shadow h-100 py-2 stretched-link" href="Lop/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">Lớp</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-success shadow h-100 py-2 stretched-link" href="MonHoc/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-success text-uppercase">Môn học</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-info shadow h-100 py-2 stretched-link" href="CauHoi/index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-info text-uppercase">Câu hỏi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-question fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-danger shadow h-100 py-2 stretched-link" href="DapAn/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-danger text-uppercase">Đáp án</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-lock-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-dark shadow h-100 py-2 stretched-link" href="KyThi/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-dark text-uppercase">Kỳ Thi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-warning shadow h-100 py-2 stretched-link" href="ChiTietKyThi/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-dark text-uppercase">CT kỳ thi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<br />
<p>KHÁCH HÀNG</p>
<hr>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-info shadow h-100 py-2 stretched-link notification" href="QuanLyPH/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-info text-uppercase">Phản hồi</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div>
                <!-- @if (@ViewBag.PhanHoi != "")
                {
                    <div class="txt">@ViewBag.PhanHoi</div>
                } -->
            </div>
        </a>
    </div>
</div>
<br />

<p>NGƯỜI DÙNG</p>
<hr>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-primary shadow h-100 py-2 stretched-link" href="Sinhvien/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-primary text-uppercase">Sinh viên</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-secondary shadow h-100 py-2 stretched-link" href="NhanVien/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-secondary text-uppercase">Nhân viên</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-dark shadow h-100 py-2 stretched-link" href="NhomNhanVien/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="mb-0 font-weight-bold text-dark text-uppercase">Nhóm nhân viên</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="card border-left-warning shadow h-100 py-2 stretched-link" href="Phanquyen/Index">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-warning text-uppercase">Phân quyền</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-puzzle-piece fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>