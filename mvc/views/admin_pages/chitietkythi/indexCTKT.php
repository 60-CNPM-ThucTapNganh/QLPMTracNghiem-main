<style>
    table {
        margin-top: 25px;
        font-size: 1rem;
    }

    table th,
    table td {
        text-align: center;
    }

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
    h3{
        padding-top: 1rem;
        padding-bottom: 2rem;
        text-align: center;
    }
</style>
<?php
// echo "INDEX ĐỒ UỐNG";
?>
<section>
    <h3>CHI TIẾT KỲ THI</h3>
    <a href="ChiTietKyThi/Create">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm mới</button>
    </a>
    <?php
    if (isset($_SESSION['thongbao'])) {
        echo '<div class="alert alert-danger">';
        echo $_SESSION['thongbao'];
        echo '</div>';
        unset($_SESSION['thongbao']);
    }
    ?>
    <div class="form-group" style="width: 100%; display: none; margin-top: 60px;">
        <!-- Show Numbers Of Rows -->
        <div>
            <span style="line-height: 2.4rem; font-weight: 800; margin-right: 1.5rem;">Số dòng hiển thị: </span>
        </div>
        <div style="width: 12%;">
            <select class="form-control" name="state" id="maxRows">
                <option value="5000">Hiện tất cả</option>
                <option value="5">5</option>
                <!-- <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option> -->
            </select>
        </div>
    </div>
    <table class="table table-striped table-class" id="table-id">
        <tr>
            <th class="row_head">STT</th>
            <th class="row_head">Tên kỳ thi</th>
            <th class="row_head">Tên câu hỏi</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $i = 1;
        foreach ($data['listCTKT'] as $item) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item["TenKT"]; ?></td>
                <td><?php echo $item["NoiDung"]; ?></td>
                <td width="30">
                    <?php
                    echo "<a href='ChiTietKyThi/Delete/" . $item["MaKT"] . "/" . $item["MaCH"] . "'><img src='public/upload/button/delete.png' width='20' height='20'/></a>&nbsp; ";
                    ?>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>


    </table>
    <!-- Start Pagination -->
    <div class='pagination-container'>
        <nav style="text-align: center;">
            <ul class="pagination">
                <li data-page="prev" class="page-item">
                    <span>
                        &laquo; <span class="sr-only">(current)
                        </span></span>
                </li>
                <!--	Here the JS Function Will Add the Rows -->
                <li data-page="next" id="prev">
                    <span> &raquo; <span class="sr-only">(current)</span></span>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</section>

<script src="public/admin/Admin/js/phantrang.js"></script>