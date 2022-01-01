<main>
    <form action="" method="">
        <section class="mx-4 px-4 py-4 my-4 border-2 border-[#eee]">
            <div class="pl-10 pt-3">
                <p class="font-bold">Thông tin chung</p>
                <hr>
            </div>
            <table align="center">
                <tr class="block py-1 pt-3">
                    <td class="pr-16">
                        <label for="name">Tên người dùng</label>
                    </td>
                    <td>
                        <input class="border px-2 py-2" type="text" name="name" id="name" value="Hoàng Thanh Sơn" readonly size="30">
                    </td>
                </tr>
                <tr class="block py-1">
                    <td class="pr-28">Giới tính </td>
                    <td class="px-2 py-2">
                        <input type="radio" checked id="nam" disabled name="sex" value="Nam">
                        <label for="nam">Nam</label>
                        <input type="radio" id="css" name="sex" disabled value="Nữ">
                        <label for="nu">Nữ</label>
                    </td>
                </tr>
                <tr class="block py-1">
                    <td class="pr-24">
                        <label for="birthday">Ngày sinh &nbsp;</label>
                    </td>
                    <td>
                        <input class="border px-2 py-2" type="date" id="birthday" name="birthday" readonly value="2021-12-15">
                    </td>
                </tr>
                <tr class="block py-1">
                    <td class="pr-32">
                        <label for="address">Địa chỉ</label>
                    </td>
                    <td>
                        <input class="border px-2 py-2" type="text" name="address" id="address" readonly value="Cam Lâm, Khánh Hòa" size="30">
                    </td>
                </tr>
                <tr class="block py-1">
                    <td class="pr-10">
                        <label for="email">Địa chỉ thư điện tử</label>
                    </td>
                    <td>
                        <input class="border px-2 py-2" type="email" name="email" id="email" readonly value="sonhoang.070400@gmail.com" size="30">
                    </td>
                </tr>
                <tr class="block py-1">
                    <td class="pr-20">
                        <label for="phone">Số điện thoại</label>
                    </td>
                    <td>
                        <input class="border px-2 py-2" type="text" name="phone" id="phone" readonly value="0358405987" size="30">
                    </td>
                </tr>
            </table>
            <div class="py-2 pl-10">
                <p class="font-bold">Ảnh người dùng</p>
                <hr>
            </div>
            <table align="center">
                <tr>
                    <td></td>
                    <td>
                        <div class=" block h-40 w-40 rounded-full overflow-hidden border-2 border-gray-600 forcus:outline-none forcus:border-white">
                            <img class="w-full h-full object-cover" src="public/Client/assets/images/avatar.png" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br>
                        <a href="./setting.php" class="px-4 py-2 border rounded-lg font-bold text-white bg-yellow-500 hover:bg-yellow-400">Chỉnh sửa thông tin</a>
                    </td>
                </tr>
            </table>
        </section>
    </form>
</main>