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
            foreach ($data['listTN'] as $ltn) {
              if ($items["MaKT"] == $ltn["MaKT"]) {
                echo '<div class="ml-32 py-5">';
                echo '<p class="font-bold" name="' . $ltn["MaCH"] . '">' . 'Câu ' . $numQuestions . ': ' . $ltn['NoiDung'] . '</p>';
                echo '<div>';
                echo '<input type="radio" name="' . $ltn["MaCH"] . '" value="" checked hidden>';
                echo '</div>';
                foreach ($ltn['ListDA'] as $da) {
                  echo '<div>';
                  echo '<input type="radio" name="' . $ltn["MaCH"] . '" value="' . $da["MaDA"] . '">' . ' ' . chr($stt) . '. ' . $da["DapAn"];
                  $stt++;
                  echo '</div>';
                }
                $stt = 65;
                $numQuestions++;
                echo '</div>';
              }
            }
          }
          ?>

        </div>
        <div class="col w-1/3 py-5 ml-32 lg:ml-1">
          <h1>Thời gian làm bài</h1>

          <input type="submit" value="Nộp bài" class="font-bold text-white bg-blue-500 hover:bg-blue-400 px-3 py-1 rounded-md" />
        </div>
      </div>
    </form>
  </section>
</main>