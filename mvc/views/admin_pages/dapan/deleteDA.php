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
        <h3 class="text-center" style="color:red;">Bạn chắc chắn muốn xóa đáp án này ?</h3>
        <form action="DapAn/Confirm/<?php echo $data['da']['MaDA'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-horizontal" style="display:flex; justify-content:center">
                <div style=" margin-left: 10px; width: 350px;">
                    <label class="form-control">Mã đáp án: <?php echo $data['da']['MaDA'] ?> </label>
                    <label class="form-control" for="">Câu hỏi: <?php
                                                                        foreach ($data['listTenCH'] as $cauhoi) {
                                                                            if ($data['da']["MaCH"] == $cauhoi['MaCH']) {
                                                                                echo $cauhoi['NoiDung'];
                                                                            }
                                                                        }
                                                                        ?></label>
                    <label class="form-control">Đáp án: <?php echo $data['da']['DapAn'] ?> </label>
                </div>
            </div>
            <div class="form-group" style="align-items: baseline;">
                <div class="col-md-offset-2 col-md-6">
                    <input type="submit" value="Xóa" class="btn btn-primary" />

                </div>
                <div class="col-md-offset-2 col-md-6 comback_div">
                    <a class="comeback" href="DapAn/Index">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</div>