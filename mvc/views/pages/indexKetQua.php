<div class="min-h-screen bg-blue-200 py-5">
    <div class='overflow-x-auto w-full'>
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> STT </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Tên Sinh Viên </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Số câu đúng </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Số câu sai </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Số câu chưa chọn </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Điểm số </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Chức năng </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                $i = 1;
                foreach ($data['listKQ'] as $item) {
                ?>
                    <tr>
                        <td class="px-6 py-4 text-center">
                            <p> <?php echo $i; ?> </p>
                        </td>
                        <td class="px-6 py-4 text-center">
                        <?php
                            foreach ($data['SV'] as $sinhvien) {
                                if ($item["maSV"] == $sinhvien['maSV']) {
                                    echo $sinhvien['tenSV'];
                                }
                            }
                        ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <p> <?php echo $item["SoCauDung"]; ?> </p>
                        </td>
                        <td class="px-6 py-4 text-center"> <?php echo $item["SoCauSai"]; ?> </td>
                        <td class="px-6 py-4 text-center"> <?php echo $item["SoCauChuaChon"]; ?> </td>
                        <td class="px-6 py-4 text-center"> <?php echo $item["DiemSo"]; ?> </td>
                        <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Xem lại</a> </td>
                    </tr>
            </tbody>
        <?php
                    $i++;
                }
        ?>
        </table>
        <!-- <div class="flex items-center space-x-1 mx-auto">
    <a href="#" class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md">
        Previous
    </a>

    <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
        1
    </a>
    <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
        2
    </a>
    <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
        3
    </a>
    <a href="#" class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white">
        Next
    </a>
</div> -->
    </div>
</div>