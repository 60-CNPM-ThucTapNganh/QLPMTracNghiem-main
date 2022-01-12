<style>
    html,
    body {
        height: 100%;
    }

    @media (min-width: 640px) {
        table {
            display: inline-table !important;
        }

        thead tr:not(:first-child) {
            display: none;
        }
    }

    td:not(:last-child) {
        border-bottom: 0;
    }

    th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
</style>

<section class="mod mod-index-Ket-Qua">
    <div class="flex items-center justify-center">
        <div class="container px-4">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-black">
                    <?php
                        foreach ($data['listKQ'] as $item) {
                    ?>
                        <tr class="bg-blue-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left">STT</th>
                            <th class="p-3 text-left">Tên kỳ thi</th>
                            <th class="p-3 text-left">Tên Sinh Viên</th>
                            <th class="p-3 text-left">Số câu đúng</th>
                            <th class="p-3 text-left">Điểm số</th>
                            <th class="p-3 text-left" width="110px">Chức năng</th>
                        </tr>
                    <?php
                    }
                    ?>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <?php
                    $i = 1;
                    foreach ($data['listKQ'] as $item) {
                    ?>
                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                <p> <?php echo $i; ?> </p>
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                <?php
                                    foreach ($data['listKT'] as $kythi) {
                                        if ($item["MaKT"] == $kythi['MaKT']) {
                                            echo $kythi['TenKT'];
                                        }
                                    }
                                ?>
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                <?php
                                    foreach ($data['SV'] as $sinhvien) {
                                        if ($item["maSV"] == $sinhvien['maSV']) {
                                            echo $sinhvien['tenSV'];
                                        }
                                    }
                                ?>
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $item["SoCauDung"]; ?></td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3"> <?php echo $item["DiemSo"]; ?> </td>
                            <?php
                            echo "<td class='border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer'><a href='LichSuBaiLam/Index/" . $item["MaKT"] . "' class='text-purple-800 hover:underline'>Xem lại</a></td>";
                            ?>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>