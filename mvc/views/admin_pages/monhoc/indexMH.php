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

    h3 {
        padding-top: 1rem;
        padding-bottom: 2rem;
    }
</style>

<h3 class="text-center">DANH SÁCH MÔN HỌC</h3>
<a href="MonHoc/Create">
    <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Môn Học</button>
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
        <th class="row_head">Mã môn học</th>
        <th class="row_head">Tên môn học</th>
        <th class="row_head">Chức năng</th>
    </tr>
    <?php
    $i = 1;
    foreach ($data['listMH'] as $item) {
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $item["MaMH"]; ?></td>
            <td><?php echo $item["TenMH"]; ?></td>
            <td>
                <?php
                echo "<a href='MonHoc/Edit/" . $item["MaMH"] . "'><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;";
                echo "<a href='MonHoc/Delete/" . $item["MaMH"] . "'><i class='fa fa-trash'></i></a>&nbsp; ";
                ?>
            </td>
        </tr>
    <?php
        $i++;
    }

    ?>

</table>