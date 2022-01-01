<style>
    .row_head,
    .row_body {
        vertical-align: middle !important;
    }

    .pagination-container {
        margin-top: 40px;
    }

    .pagination li:hover {
        cursor: pointer;
    }

    .pagination {
        display: inline-block;
    }

    .pagination li.active {
        background-color: darkseagreen;
        color: white;
        border-radius: 5px;
    }

    .pagination li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination li:hover:not(.active) {
        background-color: #ddd;
        border-radius: 5px;
    }

    h3 {
        padding-top: 1rem;
        padding-bottom: 2rem;
        text-align: center;
    }
</style>
<?php
// echo "INDEX ĐỒ UỐNG";
?>
<section>
    <h3>DANH SÁCH CÂU HỎI</h3>
    <a href="Cauhoi/Create">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm mới</button>
    </a>
    <?php
    if (isset($_SESSION['thongbao'])) {
        echo "<div class='alert alert-success'>";
        echo $_SESSION['thongbao'];
        echo "</div>";
        unset($_SESSION['thongbao']);
    }
    ?>

    <table class="table table-striped table-class" id="table-id">
        <tr>
            <th class="row_head">STT</th>
            <th class="row_head">Mã câu hỏi</th>
            <th class="row_head">Nội dung</th>
            <th class="row_head">Môn học</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $i = 1;
        foreach ($data['listCH'] as $item) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item["MaCH"]; ?></td>
                <td><?php echo $item["NoiDung"]; ?></td>
                <td><?php

                    foreach ($data['listTenMH'] as $monHoc) {
                        if ($item["MaMH"] == $monHoc['MaMH']) {
                            echo $monHoc['TenMH'];
                        }
                    }

                    ?></td>
                <td width="30">
                    <?php
                    echo "<a href='Cauhoi/Edit/" . $item["MaCH"] . "'><img src='public/upload/button/edit.png' width='20' height='20'/></a>&nbsp; ";
                    echo "<a href='Cauhoi/Details/" . $item["MaCH"] . "'><img src='public/upload/button/details.png' width='20' height='20'/></a>&nbsp; ";
                    echo "<a href='Cauhoi/Delete/" . $item["MaCH"] . "'><img src='public/upload/button/delete.png' width='20' height='20'/></a>&nbsp; ";
                    ?>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>


    </table>
</section>

