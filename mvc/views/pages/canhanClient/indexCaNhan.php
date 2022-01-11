<?php
if (isset($_SESSION['thongbao'])) {
    echo "<div class='alert alert-success'>";
    echo $_SESSION['thongbao'];
    echo "</div>";
    unset($_SESSION['thongbao']);
}
?>

<style>
    .col-2 td {
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
    <form action="" method="">

        <section class="h-min-screen bg-blue-200 px-4 py-8 ">
            <div class="">
                <h3 class="text-2xl	font-bold text-center py-4 text-gray-900">THÔNG TIN CÁ NHÂN</h3>
            </div>
            <div
                class="content row flex justify-center mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white ">

                <table class="col-1 w-1/5 mr-20" style="">
                    <tr>
                        <td>
                            <div
                                class="mx-auto block h-40 w-40 rounded-full overflow-hidden border-2 border-gray-600 forcus:outline-none forcus:border-white">
                                <img class="w-full h-full object-cover"
                                    src="public/upload/nguoidung/<?php echo $data['sv']['hinhAnh'] ?>" width="300"
                                    height="300" alt="">
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <br>
                            <a href="CaNhanClient/indexCaNhanedit"
                                class="px-4 py-2 border rounded-lg font-bold text-white bg-yellow-500 hover:bg-gray-800">Chỉnh
                                sửa thông tin</a>
                        </td>
                    </tr>
                </table>

                <table class="col-2 w-3/5">
                    <tr class="">
                        <td class="">
                            <label for="name">Tên người dùng:</label>
                        </td>
                        <td>
                            <input class="border px-2 py-2" type="text" id="" name="" disabled=true
                                value="<?php echo $data['sv']['tenSV'] ?>">
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">Giới tính:</td>
                        <td>
                            <?php
                        if ($data['sv']['gioiTinh'] == 1)
                            echo "Nam";
                        else
                            echo "Nữ";
                        ?>
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="birthday">Ngày sinh: &nbsp;</label>
                        </td>
                        <td>
                            <input class="border px-2 py-2" type="date" id="birthday" name="birthday" disabled=true
                                value="<?php echo $data['sv']['ngaySinh'] ?>">
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="address">Địa chỉ:</label>
                        </td>
                        <td>
                            <input class="border px-2 py-2" type="text" name="address" id="address" disabled=true
                                readonly value="<?php echo $data['sv']['diaChi'] ?>" size="30">
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="email">Địa chỉ thư điện tử:</label>
                        </td>
                        <td>
                            <input class="border px-2 py-2" type="email" name="email" id="email" disabled=true readonly
                                value="<?php echo $data['sv']['email'] ?>" size="30">
                        </td>
                    </tr>
                    <tr class="">
                        <td class="">
                            <label for="phone">Số điện thoại:</label>
                        </td>
                        <td>
                            <input class="border px-2 py-2" type="text" name="phone" id="phone" disabled=true readonly
                                value="<?php echo $data['sv']['sdt'] ?>" size="30">
                        </td>
                    </tr>
                </table>
            </div>

        </section>
    </form>
</main>