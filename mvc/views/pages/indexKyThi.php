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
<section class="mod mod-index-Ky-Thi">
    <div class="flex items-center justify-center">
        <div class="container px-4">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-black">
                    
                     <?php
                    foreach ($data['listKT'] as $item) {
                    ?>
                        <tr class="bg-blue-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left">STT</th>
                            <th class="p-3 text-left">Tên kỳ thi</th>
                            <th class="p-3 text-left">Thời gian làm bài</th>
                            <th class="p-3 text-left">Môn học</th>
                            <th class="p-3 text-left">Giảng viên ra đề</th>
                            <th class="p-3 text-left" width="110px">Chức năng</th>
                        </tr>
                    <?php
                        }
                    ?>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                <?php
                    $i = 1;
                    foreach ($data['listKT'] as $item) {
                    ?>
                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                <p> <?php echo $i; ?> </p>
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $item["TenKT"]; ?></td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $item["ThoiGian"] . "p" ?> </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3">
                                <?php
                                foreach ($data['listTenMH'] as $monHoc) {
                                    if ($item["MaMH"] == $monHoc['MaMH']) {
                                        echo $monHoc['TenMH'];
                                    }
                                }
                                ?></td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3"> 
                                <?php
                                foreach ($data['NV'] as $nhanvien) {
                                    if ($item["maNV"] == $nhanvien['maNV']) {
                                        echo $nhanvien['tenNV'];
                                    }
                                }
                                ?></td>
                            <?php
                                // foreach ($data['listLSBL'] as $lsbl) {
                                //     echo '<prev>';
                                //     print_r($lsbl["MaKT"]);
                                //     echo '</prev>';
                                //     if (isset($_SESSION["userClient"]))
                                //     {
                                //         if($_SESSION["userClient"]["maSV"] == $lsbl["maSV"] && $item["MaKT"] == $lsbl["MaKT"])
                                //             echo "Đã làm bài";
                                //         else
                                //             echo "Vào thi";
                                //     }
                                // }
                            echo "<td class='border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer'><a href='TracNghiem/Index/" . $item["MaKT"] . "' class='text-purple-800 hover:underline'>Vào thi</a></td>";
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
