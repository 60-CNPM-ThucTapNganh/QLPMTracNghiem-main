<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i style="font-size: 32px;" class="fas fa-pencil-ruler"></i>
        </div>
        <div class="sidebar-brand-text mx-3">QLTN</div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="tabA" href="#">
            <span class="nav-link">
                <i class="fas fa-home" aria-hidden="true"></i>
                <span>Trang chủ</span>
            </span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cửa hàng
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="tabA collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <span class="nav-link">
                <i class="fas fa-folder-open"></i>
                <span>Danh mục</span>
            </span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('lops.index')}}">Lớp</a>
                <a class="collapse-item" href="LoaiDoUong/Index">Loại đồ uống</a>
                <a class="collapse-item" href="Topping/Index">Topping</a>
                <a class="collapse-item" href="LoaiTopping/Index">Loại topping</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="tabA" href="DonHang/Index">
            <span class="nav-link">
                <i class="fas fa-edit"></i>
                <span>Kỳ thi</span>
            </span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Khách hàng
    </div>
    <!-- Nav Item -  Phản hồi-->
    <li class="nav-item">
        <a class="tabA" href="QuanLyPH/Index">
            <span class="nav-link">
                <i class="fa fa-comments"></i>
                <span>Phản hồi</span>
            </span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Người dùng
    </div>
    <!-- Nav Item - Thông tin nhân viên -->
    <li class="nav-item">
        <a class="tabA" href="nhanvien/index">
            <span class="nav-link">
                <i class="fa fa-users"></i>
                <span>Tài khoản người dùng</span>
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="tabA" href="nhanvien/index">
            <span class="nav-link">
                <i class="fa fa-users"></i>
                <span>Thông tin nhân viên</span>
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="tabA" href="nhanvien/index">
            <span class="nav-link">
                <i class="fa fa-users"></i>
                <span>Thông tin sinh viên</span>
            </span>
        </a>
    </li>

    <!-- Nav Item - Nhóm nhân viên -->
    <li class="nav-item">
        <a class="tabA" href="nhomnhanvien/index">
            <span class="nav-link">
                <i class="fa fa-ruler"></i>
                <span>Vai trò</span>
            </span>
        </a>
    </li>
    <!-- Nav Item - Phân quyền -->
    <li class="nav-item">
        <a class="tabA" href="phanquyen/index">
            <span class="nav-link">
                <i class="fa fa-puzzle-piece"></i>
                <span>Phân quyền</span>
            </span>
        </a>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
