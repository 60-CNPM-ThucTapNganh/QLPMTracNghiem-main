<main>
  <section>
    <form action="TracNghiem/SaveResult" method="post">
      <div class="row flex">
        <div class="col w-2/3">

          <?php
          $stt = 65; // A
          $numQuestions = 1;
          foreach ($data["kt"] as $items) {
            echo '<h2 class="ml-32 pt-5 font-bold">' . 'Tên kỳ thi: ' . $items["TenKT"] . '</h2>';
            foreach ($data['listMH'] as $monHoc) {
              if ($items["MaMH"] == $monHoc['MaMH']) {
                echo '<p class="ml-32 font-bold">' . 'Môn học: ' . $monHoc['TenMH'] . '</p>';
              }
            }
            echo '<p class="ml-32 font-bold">' . 'Thời gian làm bài: ' . $items["ThoiGian"] . 'p' . '</p>';
            foreach ($data['listLSBL'] as $ltn) {
              if ($items["MaKT"] == $ltn["MaKT"]) {
                echo '<div class="ml-32 py-5">';
                echo '<p class="font-bold" name="' . $ltn["MaCH"] . '">' . 'Câu ' . $numQuestions . ': ' . $ltn['NoiDung'] . '</p>';
                foreach ($ltn['ListDA'] as $da) {
                  echo '<div>';
                  ?>
                  <input type="radio" <?php echo $da["MaDA"] == $ltn["MaDA"] ? 'checked' : '' ?> disabled> <?php echo chr($stt) . '. ' . $da["DapAn"];
                  if($ltn["MaCH"] == $da["MaCH"])
                  {
                    if($da["DungSai"] == '1')
                        echo '<span class="font-bold text-green-500">' . '&check; Đây là đáp án đúng' . '</span>';
                  }
                  $stt++;
                  echo '</div>';
                }
                $stt = 65;
                $numQuestions++;
                echo '<div>';
                echo '</div>';
                echo '</div>';
              }
            }
          }
          ?>

        </div>
        <div class="col w-1/3 py-5 ml-32 lg:ml-1">  
            <a class="font-bold text-white bg-blue-500 hover:bg-blue-400 px-3 py-1 rounded-md" href='KetQua/Index'>Quay lại</a>
        </div>
      </div>
    </form>
  </section>
</main>
