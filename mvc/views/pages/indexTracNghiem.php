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
            echo '<input type="hidden" name="MaKT" value="' . $items["MaKT"] . '" >';
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
            echo '<div id="dom-target" style="display: none;">';
            $output = $items["ThoiGian"];
            echo htmlspecialchars($output);
            echo '</div>';
          }
          ?>

        </div>
        <div class="col w-1/3 py-5 ml-32 lg:ml-1">
          <p>Thời gian làm bài: <span class="timer">a</span></p>
          <input type="submit" id="clickButton" value="Nộp bài" class="font-bold text-white bg-blue-500 hover:bg-blue-400 px-3 py-1 rounded-md" />
        </div>
      </div>
    </form>
  </section>
</main>

<script type="text/javascript">
  class Timer {
    constructor(root) {
      root.innerHTML = Timer.getHTML();
      var div = document.getElementById("dom-target");
      var myData = div.textContent;
      console.log(myData);
      this.el = {
        minutes: root.querySelector(".timer__part--minutes"),
        seconds: root.querySelector(".timer__part--seconds"),
        control: root.querySelector(".timer__btn--control"),
        reset: root.querySelector(".timer__btn--reset")
      };

      this.interval = null;
      this.remainingSeconds = myData * 60;
      var timeClickButton = (myData * 60)*1000;
      window.onload = function () {
            var button = document.getElementById('clickButton');
            setInterval(function () {
                button.click();
            }, timeClickButton); 
        };

      if (this.interval === null) {
        this.start();
      } else {
        this.stop();
      }

      this.el.reset.addEventListener("click", () => {
        const inputMinutes = prompt("Enter number of minutes:");

        if (inputMinutes < 60) {
          this.stop();
          this.remainingSeconds = inputMinutes * 60;
          this.updateInterfaceTime();
        }
      });
    }

    updateInterfaceTime() {
      const minutes = Math.floor(this.remainingSeconds / 60);
      const seconds = this.remainingSeconds % 60;

      this.el.minutes.textContent = minutes.toString().padStart(2, "0");
      this.el.seconds.textContent = seconds.toString().padStart(2, "0");
    }

    updateInterfaceControls() {
      if (this.interval === null) {
        this.el.control.innerHTML = `<span class="material-icons">play_arrow</span>`;
        this.el.control.classList.add("timer__btn--start");
        this.el.control.classList.remove("timer__btn--stop");
      } else {
        this.el.control.innerHTML = `<span class="material-icons">pause</span>`;
        this.el.control.classList.add("timer__btn--stop");
        this.el.control.classList.remove("timer__btn--start");
      }
    }

    start() {
      if (this.remainingSeconds === 0) return;

      this.interval = setInterval(() => {
        this.remainingSeconds--;
        this.updateInterfaceTime();

        if (this.remainingSeconds === 0) {
          this.stop();
        }
      }, 1000);

      this.updateInterfaceControls();
    }

    stop() {
      clearInterval(this.interval);

      this.interval = null;

      this.updateInterfaceControls();
    }

    static getHTML() {
      return `
              <span class="timer__part timer__part--minutes">00</span>
              <span class="timer__part">:</span>
              <span class="timer__part timer__part--seconds">00</span>
          `;

    }
  }

  new Timer(
    document.querySelector(".timer")
  );
</script>