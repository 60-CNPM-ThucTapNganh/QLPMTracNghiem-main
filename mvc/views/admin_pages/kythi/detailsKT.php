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
                    <td>Mã kỳ thi:</td>
                    <td><?php echo $data['kt']['MaKT'] ?></td>
                </tr>
                <tr>
                    <td>Tên kỳ thi:</td>
                    <td><?php echo $data['kt']['TenKT'] ?></td>
                </tr>
                <tr>
                    <td>Thời gian làm bài:</td>
                    <td><?php echo $data['kt']['ThoiGian'] ?></td>
                </tr>
                <tr>
                    <td>Thời gian mở đề:</td>
                    <td><?php echo $data['kt']['ThoiGianBD'] ?></td>
                </tr>
                <tr>
                    <td>Thời gian đóng đề:</td>
                    <td><?php echo $data['kt']['ThoiGianKT'] ?></td>
                </tr>

                <tr>
                    <td>Môn học:</td>
                    <td><?php echo $data['kt']['TenMH'] ?></td>
                </tr>

                <tr>
                    <td>Giảng viên ra đề:</td>
                    <td><?php echo $data['kt']['tenNV'] ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<?php
echo "<div style='margin-top:60px; text-align: center; font-size: 1.6rem;'>";
echo "<a style='line-height: 2.2rem;' class='btn btn-primary' href='KyThi/Edit/" . $data['kt']['MaKT'] . "'>Cập nhật</a> | ";
echo "<a class='comeback' style='font-size: 1.4rem;' href='KyThi/Index'>Quay lại</a>"; //javascript:window.history.back(-1);
echo "</div>";
?>