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

    .shipper {
        border: none;
        outline: none;
        background-color: #eaecf4;
        border-radius: 6px;
        padding: 5px;
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
        padding-bottom: 20px;
    }
</style>
<?php
if (isset($_SESSION['da']['dapAn'])) {
    $dapAn = $_SESSION['da']['dapAn'];
    unset($_SESSION['da']['dapAn']);
} else {
    $dapAn = $data['da']['DapAn'];
}

if (isset($_SESSION['da']['dungSai'])) {
    $dungSai = $_SESSION['da']['dungSai'];
    unset($_SESSION['da']['dungSai']);
} else {
    $dungSai = $data['da']['DungSai'];
}

if (isset($_SESSION['da']['ch'])) {
    $maCH = $_SESSION['da']['ch'];
    unset($_SESSION['da']['ch']);
} else {
    $maCH = $data['da']['MaCH'];
}

?>
<div class="checkform">
    <div class="content">
        <h3>CẬP NHẬT THÔNG TIN ĐÁP ÁN</h3>
        <form action="DapAn/Save/<?php echo $data['da']['MaDA'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="mach" class="control-label col-md-4"><b>Mã đáp án</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="mada" name="mada" readonly value="<?php echo $data['da']['MaDA']; ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="cauhoi" class="control-label col-md-4"><b>Câu hỏi: </b></label>
                    <div class="col-md-8">
                        <select name="cauhoi" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenCH'] as $cauhoi) {
                                if ($cauhoi['MaCH'] == $_SESSION['da']['ch']) {
                                    $s = "selected";
                                    unset($_SESSION['da']['ch']);
                                } else {
                                    $s = "";
                                }
                                echo '<option ' . $s . ' value="' . $cauhoi['MaCH'] . '" class = "form-control">' . $cauhoi['NoiDung'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="dapan" class="control-label col-md-4"><b>Đáp án</b></label>
                    <div class="col-md-8">
                        <textarea class="form-control text-box single-line" id="dapan" name="dapan" >
                        <?php echo $dapAn; ?>
                        </textarea>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['dapAn'])) {
                                                        echo $_SESSION['error']['dapAn'];
                                                        unset($_SESSION['error']['dapAn']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label style="padding-top:10px;" for="dungsai" class="control-label col-md-4"><b>Đúng/sai</b></label>
                    <div class="col-md-8">
                        <input style="margin-left: 15px;" type="radio" name="dungsai" value="1" <?php if ($dungSai == '1') echo "checked"; ?>> Đúng
                        <input style="margin-left: 10px;" type="radio" name="dungsai" value="0" <?php if ($dungSai == '0') echo "checked"; ?>> Sai
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="DapAn/Index">Quay lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>