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
        <h3>THÊM MỚI CHI TIẾT KỲ THI</h3>
        <?php
        if (isset($_SESSION['error']['ctkt'])) {
            echo '<div class="alert alert-danger">';
            echo $_SESSION['error']['ctkt'];
            echo '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form action="ChiTietKyThi/Store" method="post">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="maKT" class="control-label col-md-5"><b>Tên kỳ thi</b></label>
                    <div class="col-md-7">
                        <select name="maKT" id="maKT" class="form-control">

                            <?php
                            foreach ($data['kt'] as $item) {
                                if ($item['MaKT'] == $_SESSION['ctkt']['maKT']) {
                                    echo "<option value='" . $item['MaKT'] . "' selected>" . $item['TenKT'] . "</option>";
                                    unset($_SESSION['ctkt']['maKT']);
                                } else {
                                    echo "<option value='" . $item['MaKT'] . "'>" . $item['TenKT'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-group1">
                    <label for="maCH" class="control-label col-md-5"><b>Tên câu hỏi</b></label>
                    <div class="col-md-7">
                        <select name="maCH" id="maCH" class="form-control">
                            <?php
                            foreach ($data['ch'] as $item) {
                                if ($item['MaCH'] == $_SESSION['ctkt']['maCH']) {
                                    echo "<option value='" . $item['MaCH'] . "' selected>" . $item['NoiDung'] . "</option>";
                                    unset($_SESSION['ctkt']['maCH']);
                                } else {
                                    echo "<option value='" . $item['MaCH'] . "'>" . $item['NoiDung'] . "</option>";
                                }
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
                        <a class="comeback" href="ChiTietKyThi/index">Quay lại</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>