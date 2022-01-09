<div class="min-h-screen bg-blue-200 py-5">
    <div class='overflow-x-auto w-full'>
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> STT </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Tên kỳ thi </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Thời gian làm bài </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Môn học </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Giảng viên ra đề </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Chức năng </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                $i = 1;
                foreach ($data['listKT'] as $item) {
                ?>
                    <tr>
                        <td class="px-6 py-4 text-center">
                            <p> <?php echo $i; ?> </p>
                        </td>
                        <td class="px-6 py-4 text-center"> <?php echo $item["TenKT"]; ?> </td>
                        <td class="px-6 py-4 text-center"> <?php echo $item["ThoiGian"] . "p" ?> </td>
                        <td class="px-6 py-4 text-center">
                            <?php
                            foreach ($data['listTenMH'] as $monHoc) {
                                if ($item["MaMH"] == $monHoc['MaMH']) {
                                    echo $monHoc['TenMH'];
                                }
                            }
                            ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php
                            foreach ($data['NV'] as $nhanvien) {
                                if ($item["maNV"] == $nhanvien['maNV']) {
                                    echo $nhanvien['tenNV'];
                                }
                            }
                            ?>
                        </td>
                        <?php
                        echo "<td class='px-6 py-4 text-center'><a href='TracNghiem/Index/" . $item["MaKT"] . "' class='text-purple-800 hover:underline'>Vào thi</a></td>";
                        ?>
                    </tr>
            </tbody>
        <?php
                    $i++;
                }
        ?>
        </table>
    </div>
</div>