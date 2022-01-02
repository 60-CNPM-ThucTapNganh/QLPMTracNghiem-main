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
        <h3>THÊM MỚI ĐÁP ÁN</h3>
        <form action="DapAn/Store" method="post" enctype="multipart/form-data">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="mada" class="control-label col-md-4"><b>Mã đáp án: </b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="mada" name="mada" readonly value="<?php echo $data['mada'] ?>">
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
                    <label for="dapan" class="control-label col-md-4"><b>Đáp án: </b></label>
                    <div class="col-md-8">
                        <textarea class="form-control text-box single-line" id="dapan" name="dapan">
                            <?php if (isset($_SESSION['da']['dapan'])) echo $_SESSION['da']['dapan'];
                            unset($_SESSION['da']['dapan']); ?>
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
                        <input style="margin-left: 15px;" type="radio" name="dungsai" value="1" <?php if (!isset($_SESSION['da']['dungSai']) || (isset($_SESSION['da']['dungSai']) && $_SESSION['da']['dungSai'] == '1')) echo "checked"; ?>> Đúng
                        <input style="margin-left: 10px;" type="radio" name="dungsai" value="0" <?php if (isset($_SESSION['da']['dungSai']) && $_SESSION['da']['dungSai'] == '0') echo "checked";
                                                                                                    unset($_SESSION['da']['dungSai']); ?>> Sai
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>

                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="DapAn/Index">Quay lại</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
