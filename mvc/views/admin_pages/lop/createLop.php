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

<div class="checkform">
    <div class="content">
        <h3>THÊM MỚI LỚP</h3>

        <form action="Lop/Store" method="post">
            <div class="form-horizontal">
                <hr />
                <div class="form-group1">
                    <label for="malop" class="control-label col-md-4"><b>Mã lớp</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="malop" name="malop" value="<?php if (isset($_SESSION['lop']['maLop'])) echo $_SESSION['lop']['maLop'];
                                                                                                                    unset($_SESSION['lop']['maLop']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['maLop'])) {
                                                        echo $_SESSION['error']['maLop'];
                                                        unset($_SESSION['error']['maLop']);
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group1">
                    <label for="tenlop" class="control-label col-md-4"><b>Tên lớp</b></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control text-box single-line" id="tenlop" name="tenlop" value="<?php if (isset($_SESSION['lop']['tenLop'])) echo $_SESSION['lop']['tenLop'];
                                                                                                                        unset($_SESSION['lop']['tenLop']); ?>">
                        <span class="text-danger"><?php if (isset($_SESSION['error']['tenLop'])) {
                                                        echo $_SESSION['error']['tenLop'];
                                                        unset($_SESSION['error']['tenLop']); // tạm tạm rồi, làm vài phát nữa :v, làm
                                                    } ?></span>
                    </div>
                </div>

                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>
                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <!-- <button class="comeback"> -->
                            <a class="comeback" href="Lop/Index">Quay lại</a>
                        <!-- </button> -->

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>