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
        <h3>THÊM MỚI CÂU HỎI</h3>
        <form action="CauHoi/Store" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="mach" class="control-label col-md-4"><b>Mã câu hỏi: </b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="mach" name="mach" readonly value="<?php echo $data['mach'] ?>">
                    </div>
                </div>

                <div class="form-group1">
                    <label for="noidung" class="control-label col-md-4"><b>Nội dung: </b></label>
                    <div class="col-md-8">
                        <textarea class="form-control text-box single-line" id="noidung" name="noidung">
                            <?php if (isset($_SESSION['ch']['noidung'])) echo $_SESSION['ch']['noidung'];
                            unset($_SESSION['ch']['noidung']); ?>
                        </textarea>
                        <span class="text-danger"><?php if (isset($_SESSION['error']['noiDung'])) {     
                                                        echo $_SESSION['error']['noiDung'];
                                                        unset($_SESSION['error']['noiDung']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="hinh" class="control-label col-md-4"><b>Ảnh câu hỏi: </b></label>
                    <div class="col-md-8">
                        <input type="FILE" id="hinh" name="hinh">
                        <br>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="monhoc" class="control-label col-md-4"><b>Môn học: </b></label>
                    <div class="col-md-8">
                        <select name="monhoc" class="form-control text-box single-line">
                            <?php
                            foreach ($data['listTenMH'] as $monhoc) {
                                if ($monhoc['MaMH'] == $_SESSION['ch']['mh']) {
                                    $s = "selected";
                                    unset($_SESSION['ch']['mh']);
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
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>

                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="CauHoi/Index">Quay lại</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
