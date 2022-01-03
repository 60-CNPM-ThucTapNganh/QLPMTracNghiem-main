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
if (isset($_SESSION['kt']['tenKT'])) {
    $tenKT = $_SESSION['kt']['tenKT'];
    unset($_SESSION['kt']['tenKT']);
} else {
    $tenKT = $data['kt']['TenKT'];
}

if (isset($_SESSION['kt']['thoiGian'])) {
    $thoiGian = $_SESSION['kt']['thoiGian'];
    unset($_SESSION['kt']['thoiGian']);
} else {
    $thoiGian = $data['kt']['ThoiGian'];
}

if (isset($_SESSION['kt']['thoiGianBD'])) {
    $thoiGianBD = $_SESSION['kt']['thoiGianBD'];
    unset($_SESSION['kt']['thoiGianBD']);
} else {
    $thoiGianBD = $data['kt']['ThoiGianBD'];
}

if (isset($_SESSION['kt']['thoiGianKT'])) {
    $thoiGianKT = $_SESSION['kt']['thoiGianKT'];
    unset($_SESSION['kt']['thoiGianKT']);
} else {
    $thoiGianKT = $data['kt']['ThoiGianKT'];
}

if (isset($_SESSION['kt']['tongSoCau'])) {
    $tongSoCau = $_SESSION['kt']['tongSoCau'];
    unset($_SESSION['kt']['tongSoCau']);
} else {
    $tongSoCau = $data['kt']['TongSoCau'];
}

if (isset($_SESSION['kt']['mh'])) {
    $maMH = $_SESSION['kt']['mh'];
    unset($_SESSION['kt']['mhd']);
} else {
    $maMH = $data['kt']['MaMH'];
}

if (isset($_SESSION['kt']['nv'])) {
    $maNV = $_SESSION['kt']['nv'];
    unset($_SESSION['kt']['nv']);
} else {
    $maNV = $data['kt']['maNV'];
}
?>
<div class="checkform">
    <div class="content">
        <h3>CẬP NHẬT THÔNG TIN KỲ THI</h3>
        <form action="KyThi/Save/<?php echo $data['kt']['MaKT'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="makt" class="control-label col-md-4"><b>Mã kỳ thi</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="makt" name="makt" readonly value="<?php echo $data['kt']['MaKT']; ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenkt" class="control-label col-md-4"><b>Tên kỳ thi</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenkt" name="tenkt" value="<?php echo $tenKT; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenKT'])) {
                                                        echo $_SESSION['error']['tenKT'];
                                                        unset($_SESSION['error']['tenKT']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="thoigian" class="control-label col-md-4"><b>Thời gian làm bài</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="thoigian" name="thoigian" value="<?php echo $thoiGian; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['thoiGian'])) {
                                                        echo $_SESSION['error']['thoiGian'];
                                                        unset($_SESSION['error']['thoiGian']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="thoigianBD" class="control-label col-md-4"><b>Thời gian mở đề: </b></label>
                    <div class="col-md-8">
                        <input type="datetime-local" class="form-control text-box single-line" id="thoigianBD" name="thoigianBD" value="<?php echo $thoiGianBD; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['thoiGianBD'])) {
                                                        echo $_SESSION['error']['thoiGianBD'];
                                                        unset($_SESSION['error']['thoiGianBD']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="thoigianKT" class="control-label col-md-4"><b>Thời gian đóng đề: </b></label>
                    <div class="col-md-8">
                        <input type="datetime-local" class="form-control text-box single-line" id="thoigianKT" name="thoigianKT" value="<?php echo $thoiGianKT; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['thoiGianKT'])) {
                                                        echo $_SESSION['error']['thoiGianKT'];
                                                        unset($_SESSION['error']['thoiGianKT']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tongsocau" class="control-label col-md-4"><b>Tổng số câu</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tongsocau" name="tongsocau" value="<?php echo $tongSoCau; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tongSoCau'])) {
                                                        echo $_SESSION['error']['tongSoCau'];
                                                        unset($_SESSION['error']['tongSoCau']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="monhoc" class="control-label col-md-4"><b>Môn học: </b></label>
                    <div class="col-md-8">
                        <select name="monhoc" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenMH'] as $monhoc) {
                                if ($monhoc['MaMH'] == $_SESSION['kt']['mh']) {
                                    $s = "selected";
                                    unset($_SESSION['kt']['mh']);
                                } else {
                                    $s = "";
                                }
                                echo '<option ' . $s . ' value="' . $monhoc['MaMH'] . '" class = "form-control">' . $monhoc['TenMH'] . '</option>';
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
                        <a class="comeback" href="KyThi/Index">Quay lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>