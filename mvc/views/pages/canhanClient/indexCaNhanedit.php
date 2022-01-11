<?php
if (isset($_SESSION['sv']['tenSV'])) {
    $tenSV = $_SESSION['sv']['tenSV'];
    unset($_SESSION['sv']['tenSV']);
} else {
    $tenSV = $data['sv']['tenSV'];
}

if (isset($_SESSION['sv']['gioiTinh'])) {
    $gioiTinh = $_SESSION['sv']['gioiTinh'];
    unset($_SESSION['sv']['gioiTinh']);
} else {
    $gioiTinh = $data['sv']['gioiTinh'];
}

if (isset($_SESSION['sv']['ngaySinh'])) {
    $ngaySinh = $_SESSION['sv']['ngaySinh'];
    unset($_SESSION['sv']['ngaySinh']);
} else {
    $ngaySinh = $data['sv']['ngaySinh'];
}

if (isset($_SESSION['sv']['diaChi'])) {
    $diaChi = $_SESSION['sv']['diaChi'];
    unset($_SESSION['sv']['diaChi']);
} else {
    $diaChi = $data['sv']['diaChi'];
}

if (isset($_SESSION['sv']['soDienThoai'])) {
    $sdt = $_SESSION['sv']['soDienThoai'];
    unset($_SESSION['sv']['soDienThoai']);
} else {
    $sdt = $data['sv']['sdt'];
}

?>

<style>
td {
    padding: 12px 8px 12px 8px;
    border: 1px solid #F5F5F5;
    font-weight: bold;
}

.content {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        border-radius: 8px;
    }
</style>

<main>
    <form action="CaNhanClient/save/<?php echo $data['sv']['maSV'] ?>" method="POST" enctype="multipart/form-data">
        <section class="h-min-screen bg-blue-200">
            <div class="flex flex-col items-center pt-10 pl-10">
                <table
                    class="content mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">

                    <tr>
                        <th colspan="2" class="bg-gray-900 ">
                            <h2 class="text-2xl	font-bold text-center py-4 text-white">CHỈNH SỬA CÁ NHÂN</h2>
                        </th>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="maSV">Mã sinh viên</label>
                        </td>
                        <td>
                            <input type="text" class="border px-2 py-2" id="maSV" name="maSV" readonly
                                disabled=true value="<?php echo $data['sv']['maSV']; ?>">
                        </td>
                    </tr>

                    <tr class="form-group1">
                        <td class="">
                            <label for="name">Tên người dùng</label>
                        </td>
                        <td>
                            <input type="text" class="border px-2 py-2" id="tenSV" name="tenSV"
                                value="<?php echo $tenSV; ?>">
                            <span class="text-danger"><?php if (isset($_SESSION['error']['tenSV'])) {
                                        echo $_SESSION['error']['tenSV'];
                                        unset($_SESSION['error']['tenSV']);
                                    } ?></span>
                        </td>
                    </tr>

                    <tr class="">
                        <td class="">Giới tính </td>
                        <td>
                            <input style="margin-left: 15px;" type="radio" name="gioiTinh" value="1"
                                <?php if ($gioiTinh == '1') echo "checked"; ?>> Nam
                            <input style="margin-left: 10px;" type="radio" name="gioiTinh" value="0"
                                <?php if ($gioiTinh == '0') echo "checked"; ?>> Nữ
                        </td>
                    </tr>

                    <tr class="">
                        <td class="">
                            <label for="birthday">Ngày sinh &nbsp;</label>
                        </td>
                        <td>
                            <input type="date" class="border px-2 py-2" id="ngaySinh" name="ngaySinh"
                                value="<?php echo $ngaySinh; ?>">
                            <span class="text-danger"><?php if (isset($_SESSION['error']['ngaySinh'])) {
                                        echo $_SESSION['error']['ngaySinh'];
                                        unset($_SESSION['error']['ngaySinh']);
                                    } ?></span>
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="address">Địa chỉ</label>
                        </td>
                        <td>
                            <input type="text" class="border px-2 py-2" id="diaChi" name="diaChi"
                                value="<?php echo $diaChi; ?>">
                            <span class="text-danger"><?php if (isset($_SESSION['error']['diaChi'])) {
                                        echo $_SESSION['error']['diaChi'];
                                        unset($_SESSION['error']['diaChi']);
                                    } ?></span>
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="email">Địa chỉ thư điện tử</label>
                        </td>
                        <td>
                            <input type="text" class="border px-2 py-2" id="email" name="email"
                                value="<?php echo $data['sv']['email']; ?>" readonly>

                        </td>
                    </tr>

                    <tr class="">
                        <td class="">
                            <label for="phone">Số điện thoại</label>
                        </td>
                        <td>
                            <input type="text" class="border px-2 py-2" id="sdt" name="sdt"
                                value="<?php echo $sdt; ?>">
                            <span class="text-danger"><?php if (isset($_SESSION['error']['soDienThoai'])) {
                                        echo $_SESSION['error']['soDienThoai'];
                                        unset($_SESSION['error']['soDienThoai']);
                                    } ?></span>
                        </td>
                    </tr>
                    <tr class="">
                        <td>
                            <label for="hinhAnh" class="control-label col-md-4"><b>Chọn ảnh đại diện</b></label>
                        </td>
                        <td class="col-md-8">
                            <input type="FILE" accept="image/*" id="hinhAnh" name="hinhAnh">
                        </td>
                    </tr>
                </table>
                <div class="py-4">
                    <input type="submit"
                        class="px-4 py-2 border rounded-lg font-bold text-white bg-green-500 hover:bg-green-600"
                        value="Lưu Lại" />
                    <a class="px-4 py-2 border rounded-lg font-bold text-white bg-red-400 hover:bg-red-500"
                        href="canhanClient/indexCaNhan">Quay lại</a>
                </div>
            </div>

        </section>
    </form>

</main>