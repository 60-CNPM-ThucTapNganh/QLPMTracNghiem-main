<main>
  <section>
    <form action="TracNghiem/SaveResult" method="post">
      <div class="row flex">
        <div class="col w-2/3">

          <?php
          $stt = 65; // A
          $numQuestions = 1;
          foreach ($data['listTN'] as $ltn) {
            echo '<div class="ml-32 py-5">';
            echo '<p name="listTN[]">' . 'Câu ' . $numQuestions . ': ' . $ltn['NoiDung'] . '</p>';
            foreach ($data['listDA'] as $lda) {
              if ($ltn["MaCH"] == $lda["MaCH"]) {
                echo '<div>';
                echo '<input type="checkbox" name="listDA[]" value="'. $lda["MaDA"] .'">' . ' ' . chr($stt) . '. ' . $lda["DapAn"];
                $stt++;
                echo '</div>';
              }
            }
            $stt = 65;
            $numQuestions++;
            echo '</div>';
          }
          ?>

        </div>
        <div class="col w-1/3 py-5 ml-32 lg:ml-1">
          <h1>Thời gian làm bài</h1>

          <input type="submit" name="them" value="Nộp bài" class="font-bold text-white bg-blue-500 hover:bg-blue-400 px-3 py-1 rounded-md" />
        </div>
      </div>
    </form>
  </section>
</main>
