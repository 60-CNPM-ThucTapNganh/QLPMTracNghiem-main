<style>
    .checkform {
        display: flex;
        justify-content: center;
        margin-top: 8rem;

    }

    .content {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        border-radius: 8px;
        /* display: ; */
    }

    .title {
        padding-bottom: 1.5rem;
        text-align: center;
    }

    .form-group {
        display: flex;
        margin-bottom: 0.2rem;
        /* justify-content: center; */
        text-align: center;
        margin-top: 1.5rem;
    }

    .form-group1 {
        display: flex;
        /* justify-content: ; */
        align-items: baseline;
        margin-bottom: 0.2rem;
    }

    h3 {
        text-align: center;
    }

    .comeback {
        border: none;
        outline: none;
        background-color: #eaecf4;
        border-radius: 6px;
        padding: 5px;

    }

    .comeback>a {
        text-decoration: none;
    }
</style>
<?php
if (isset($_SESSION['sv']['tenSV'])) {
    $tenSV = $_SESSION['sv']['tenSV'];
    unset($_SESSION['sv']['tenSV']);
} else {
    $tenSV = $data['sv']['tenSV'];
}

if (isset($_SESSION['sv']['gioiTinh'])) {
    $gioiTinh = $_SESSION['sv']['gioiTinh'];
    unset($_SESSION['sv']['gioiTinh']);
} else {
    $gioiTinh = $data['sv']['gioiTinh'];
}

if (isset($_SESSION['sv']['ngaySinh'])) {
    $ngaySinh = $_SESSION['sv']['ngaySinh'];
    unset($_SESSION['sv']['ngaySinh']);
} else {
    $ngaySinh = $data['sv']['ngaySinh'];
}

if (isset($_SESSION['sv']['diaChi'])) {
    $diaChi = $_SESSION['sv']['diaChi'];
    unset($_SESSION['sv']['diaChi']);
} else {
    $diaChi = $data['sv']['diaChi'];
}

if (isset($_SESSION['sv']['soDienThoai'])) {
    $sdt = $_SESSION['sv']['soDienThoai'];
    unset($_SESSION['sv']['soDienThoai']);
} else {
    $sdt = $data['sv']['sdt'];
}
if (isset($_SESSION['sv']['lop'])) {
    $maLop = $_SESSION['sv']['lop'];
    unset($_SESSION['sv']['lop']);
} else {
    $maLop = $data['sv']['MaLop'];
}
?>
<div class="checkform">
    <div class="content">
        <h3>CẬP NHẬT THÔNG TIN SINH VIÊN</h3>
        <form action="SinhVien/Save/<?php echo $data['sv']['maSV'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="maSV" class="control-label col-md-4"><b>Mã sinh viên</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="maSV" name="maSV" readonly value="<?php echo $data['sv']['maSV']; ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenSV" class="control-label col-md-4"><b>Tên sinh viên</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenSV" name="tenSV" value="<?php echo $tenSV; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenSV'])) {
                                                        echo $_SESSION['error']['tenSV'];
                                                        unset($_SESSION['error']['tenSV']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label style="margin-left: 10px;padding-top:10px;" for="gioitinh" class="control-label col-md-4"><b>Giới tính</b></label>
                    <div class="col-md-8">
                        <input style="margin-left: 15px;" type="radio" name="gioitinh" value="1" <?php if ($gioiTinh == '1') echo "checked"; ?>> Nam
                        <input style="margin-left: 10px;" type="radio" name="gioitinh" value="0" <?php if ($gioiTinh == '0') echo "checked"; ?>> Nữ
                    </div>
                </div>

                <div class="form-group1">
                    <label for="ngaySinh" class="control-label col-md-4"><b>Ngày sinh</b></label>
                    <div class="col-md-8">
                        <input type="date" class="form-control text-box single-line" id="ngaySinh" name="ngaySinh" value="<?php echo $ngaySinh; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['ngaySinh'])) {
                                                        echo $_SESSION['error']['ngaySinh'];
                                                        unset($_SESSION['error']['ngaySinh']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="diaChi" class="control-label col-md-4"><b>Địa chỉ</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="diaChi" name="diaChi" value="<?php echo $diaChi; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['diaChi'])) {
                                                        echo $_SESSION['error']['diaChi'];
                                                        unset($_SESSION['error']['diaChi']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="email" class="control-label col-md-4"><b>Email</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="email" name="email" value="<?php echo $data['sv']['email']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="sdt" class="control-label col-md-4"><b>Số điện thoại</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="sdt" name="sdt" value="<?php echo $sdt; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['soDienThoai'])) {
                                                        echo $_SESSION['error']['soDienThoai'];
                                                        unset($_SESSION['error']['soDienThoai']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="hinhAnh" class="control-label col-md-4"><b>Ảnh sinh viên</b></label>
                    <div class="col-md-8">
                        <input type="FILE" accept="image/*" id="hinhAnh" name="hinhAnh">
                    </div>
                </div>
                <div class="form-group1">
                    <label for="lop" class="control-label col-md-4"><b>Lớp</b></label>
                    <div class="col-md-8">
                        <select name="lop" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenLop'] as $lop) {
                                if ($lop['MaLop'] == $maLop) {
                                    $s = "selected";
                                    unset($_SESSION['sv']['lop']);
                                } else {
                                    $s = "";
                                }
                                echo '<option ' . $s . ' value="' . $lop['MaLop'] . '" class = "form-control">' . $lop['TenLop'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="SinhVien/Index">Quay lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>