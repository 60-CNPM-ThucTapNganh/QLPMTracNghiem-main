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
if (isset($_SESSION['thongbao'])) {
    echo "<div class='alert alert-success'>";
    echo $_SESSION['thongbao'];
    echo "</div>";
    unset($_SESSION['thongbao']);
}

?>
<table class="content" cellpadding="0" cellspacing="0" style="font-size:20px; margin-left: auto; margin-right: auto; margin-top: 80px;">
    <tr>
        <td>
            <table style="margin: 60px;" cellpadding="2" cellspacing="10">
                <tr>
                    <td colspan="3">
                        <h3><b>THÔNG TIN CHI TIẾT</b></h3>
                    </td>
                </tr>
                <tr>
                    <td rowspan="8"><img src="public/upload/nguoidung/<?php echo $data['sv']['hinhAnh'] ?>" width="300" height="300" /></td>
                    <td>Mã sinh viên:</td>
                    <td><?php echo $data['sv']['maSV'] ?></td>
                </tr>
                <tr>
                    <td>Tên sinh viên:</td>
                    <td><?php echo $data['sv']['tenSV'] ?></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <?php
                        if ($data['sv']['gioiTinh'] == 1)
                            echo "Nam";
                        else
                            echo "Nữ";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><?php
                        $date = str_replace('-', '/', $data["sv"]["ngaySinh"]);
                        echo date('d/m/Y', strtotime($date));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><?php echo $data['sv']['diaChi'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $data['sv']['email'] ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><?php echo $data['sv']['sdt'] ?></td>
                </tr>
                <tr>
                    <td>Lớp:</td>
                    <td><?php echo $data['sv']['TenLop'] ?></td>
                </tr>


            </table>
        </td>
    </tr>
</table>

<?php
echo "<div style='margin-top:60px; text-align: center; font-size: 1.6rem;'>";
echo "<a style='line-height: 2.2rem;' class='btn btn-primary' href='SinhVien/Edit/" . $data['sv']['maSV'] . "'>Cập nhật</a> | ";
echo "<a class='comeback' style='font-size: 1.4rem;' href='SinhVien/Index'>Quay lại</a>"; //javascript:window.history.back(-1);
echo "</div>";
?>