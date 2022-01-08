<?php
class TracNghiem extends Controller{

    public $ctktModel;
    public $daModel;

    public function __construct()
    {
        $this->ctktModel = $this->model("ChiTietKyThiModel");
        $this->daModel = $this->model("DapAnModel");
        
    }

    public function Index(){
        $listTN = json_decode($this->ctktModel->getCTKT(), true);
        $listDA = json_decode($this->daModel->listAll(), true);

        $this->view("layoutCustomer", [
            'page' => 'indexTracNghiem',
            'listTN' => $listTN,
            'listDA' => $listDA
        ]);
    }

    public function SaveResult() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $listQuestions = [];
            $listResults = []; 
            if (isset($_POST['listDA']) && count($_POST['listDA']) > 0)
            {
                foreach ($_POST['listDA'] as $maDA)
                {
                    $DA = json_decode($this->daModel->getDapAnById($maDA), true);
                    array_push($listResults, $DA[0]);
                }
            }
            if (isset($_POST['listTN']) && count($_POST['listTN']) > 0)
            {
                foreach ($_POST['listTN'] as $maCH)
                {
                    $CH = json_decode($this->ctktModel->getChiTietKyThiById($maCH), true);
                    array_push($listQuestions, $CH[0]);
                }
            }
            // var_dump($listQuestions);
            // var_dump($listResults);

            // var_dump($_POST['listDA']);
            // var_dump(count($_POST['listDA']));
            $count = 0;
            $numQuestions = 0;
            foreach ($listResults as $key => $value)
            {
                if(isset($value["MaCH"]))
                {
                    $numQuestions++;
                }
                if ($value["DungSai"] == '1')
                {
                    $count++;
                }
                
            }
            echo $numQuestions;
            echo $count;
            $point = 10 / $numQuestions * $count;
            echo 'Tổng số câu đúng:     ' . $count . '/' . $numQuestions. ' Vậy số điểm đạt được là: ' . round($point * 100) / 100;
            
            return;
            // $this->redirectTo("Menu", "Index");
        }
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $a = $_POST['ltn'];
        //     var_dump($a);
        //     return;
        // }
        
    }
}
?>