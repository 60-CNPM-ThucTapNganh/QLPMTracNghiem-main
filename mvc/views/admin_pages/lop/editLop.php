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

    h3 {
        text-align: center;
    }
</style>

<?php
if (isset($_SESSION['lop']['tenLop'])) {
    $tenLop = $_SESSION['lop']['tenLop'];
    unset($_SESSION['lop']['tenLop']);
} else {
    $tenLop = $data['lop']['TenLop'];
}
?>

<div class="checkform">
    <div class="content">
        <h3>CẬP NHẬT THÔNG TIN LỚP</h3>
        <form action="Lop/Save/<?php echo $data['lop']['MaLop'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="malop" class="control-label col-md-4"><b>Mã lớp</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="malop" name="malop" readonly value="<?php echo $data['lop']['MaLop']; ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenlop" class="control-label col-md-4"><b>Tên lớp</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenlop" name="tenlop" value="<?php echo $tenLop; ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenLop'])) {
                                                        echo $_SESSION['error']['tenLop'];
                                                        unset($_SESSION['error']['tenLop']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="Lop/Index">Quay lại</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>