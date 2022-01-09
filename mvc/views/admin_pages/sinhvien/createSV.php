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
<div class="checkform">
    <div class="content">
        <h3>THÊM MỚI SINH VIÊN</h3>
        <form action="SinhVien/Store" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="masv" class="control-label col-md-4"><b>Mã sinh viên</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="masv" name="masv" readonly value="<?php echo $data['masv'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tensv" class="control-label col-md-4"><b>Tên sinh viên</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tensv" name="tensv" value="<?php if (isset($_SESSION['sv']['tenSV'])) echo $_SESSION['sv']['tenSV'];
                                                                                                                    unset($_SESSION['sv']['tenSV']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenSV'])) {
                                                        echo $_SESSION['error']['tenSV'];
                                                        unset($_SESSION['error']['tenSV']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label style="padding-top:10px;" for="gioitinh" class="control-label col-md-4"><b>Giới tính</b></label>
                    <div class="col-md-8">
                        <input type="radio" name="gioitinh" value="1" <?php if (!isset($_SESSION['sv']['gioiTinh']) || (isset($_SESSION['sv']['gioiTinh']) && $_SESSION['sv']['gioiTinh'] == '1')) echo "checked"; ?>> Nam
                        <input style="margin-left: 10px;" type="radio" name="gioitinh" value="0" <?php if (isset($_SESSION['sv']['gioiTinh']) && $_SESSION['sv']['gioiTinh'] == '0') echo "checked";
                                                                                                    unset($_SESSION['sv']['gioiTinh']); ?>> Nữ
                    </div>
                </div>

                <div class="form-group1">
                    <label for="ngaysinh" class="control-label col-md-4"><b>Ngày sinh</b></label>
                    <div class="col-md-8">
                        <input type="date" class="form-control text-box single-line" id="ngaysinh" name="ngaysinh" value="<?php if (isset($_SESSION['sv']['ngaySinh'])) echo $_SESSION['sv']['ngaySinh'];
                                                                                                                            unset($_SESSION['sv']['ngaySinh']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['ngaySinh'])) {
                                                        echo $_SESSION['error']['ngaySinh'];
                                                        unset($_SESSION['error']['ngaySinh']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="diachi" class="control-label col-md-4"><b>Địa chỉ</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="diachi" name="diachi" value="<?php if (isset($_SESSION['sv']['diaChi'])) echo $_SESSION['sv']['diaChi'];
                                                                                                                        unset($_SESSION['sv']['diaChi']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['diaChi'])) {
                                                        echo $_SESSION['error']['diaChi'];
                                                        unset($_SESSION['error']['diaChi']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="email" class="control-label col-md-4"><b>Email</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="email" name="email" value="<?php if (isset($_SESSION['sv']['email'])) echo $_SESSION['sv']['email'];
                                                                                                                    unset($_SESSION['sv']['email']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['email'])) {
                                                        echo $_SESSION['error']['email'];
                                                        unset($_SESSION['error']['email']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="password" class="control-label col-md-4"><b>Mật khẩu</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="password" name="password" value="<?php if (isset($_SESSION['sv']['matKhau'])) echo $_SESSION['sv']['matKhau'];
                                                                                                                            unset($_SESSION['sv']['matKhau']); ?>">
                        <i style="font-size: small;">(*)Mật khẩu phải chứa ít nhất 8 ký tự, ít nhất 1 số, ít nhất 1 chữ cái viết hoa và ít nhất 1 chữ cái thường</i>
                        <br>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['matKhau'])) {
                                                        echo $_SESSION['error']['matKhau'];
                                                        unset($_SESSION['error']['matKhau']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="sdt" class="control-label col-md-4"><b>Số điện thoại</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="sdt" name="sdt" value="<?php if (isset($_SESSION['sv']['soDienThoai'])) echo $_SESSION['sv']['soDienThoai'];
                                                                                                                unset($_SESSION['sv']['soDienThoai']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['soDienThoai'])) {
                                                        echo $_SESSION['error']['soDienThoai'];
                                                        unset($_SESSION['error']['soDienThoai']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="hinhanh" class="control-label col-md-4"><b>Ảnh sinh viên</b></label>
                    <div class="col-md-8">
                        <input type="FILE" id="hinhanh" name="hinhanh">
                        <br>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['anhSV'])) {
                                                        echo $_SESSION['error']['anhSV'];
                                                        unset($_SESSION['error']['anhSV']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="lop" class="control-label col-md-4"><b>Lớp</b></label>
                    <div class="col-md-8">
                        <select name="lop" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenLop'] as $lop) {
                                if ($lop['MaLop'] == $_SESSION['sv']['lop']) {
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
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="sinhvien/index">Quay lại</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
