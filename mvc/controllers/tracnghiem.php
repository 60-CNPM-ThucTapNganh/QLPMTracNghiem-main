<?php
class TracNghiem extends Controller{

    public $ctktModel;
    public $daModel;

    public function __construct()
    {
        $this->ctktModel = $this->model("ChiTietKyThiModel");
        $this->daModel = $this->model("DapAnModel");
        $this->ktModel = $this->model("KyThiModel");
    }

    public function Index(){
        $listTN = json_decode($this->ctktModel->getCTKT(), true);
        for($i = 0; $i < count($listTN); $i++) {
            $listTN[$i]['ListDA'] = json_decode($this->daModel->getDapAns($listTN[$i]['MaCH']), true);
        }
    
        $this->view("layoutCustomer", [
            'page' => 'indexTracNghiem',
            'listTN' => $listTN,
        ]);
    }

    public function SaveResult() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
            $tongSoCau = 0;
            $soCauDung = 0;
            $soCauSai = 0;
            $soCauChuaChon = 0;
            $diemSo = 0;
            foreach($_POST as $maCH => $maDA) {
                if($maDA != '') {
                    if($this->daModel->getDapAnById($maDA)['DungSai'] == '1') {
                        $soCauDung++;
                    } else {
                        $soCauSai++;
                    }
                } else {
                    $soCauChuaChon++;
                }
            }
            $tongSoCau = $soCauDung + $soCauSai + $soCauChuaChon;
            $diemSo = round((10 / $tongSoCau * $soCauDung) * 100) / 100;

            $save = $this->model("KetQuaModel");
            $save->insert($soCauDung, $soCauSai, $soCauChuaChon, $diemSo);
            // var_dump($save->insert);
            // return;
            // echo 'Số câu đúng: ' . $soCauDung . '<br>';
            // echo 'Số câu sai: ' . $soCauSai . '<br>';
            // echo 'Số câu chưa chọn: ' . $soCauChuaChon . '<br>';
            
            

            // $listResults = []; 
            // if (isset($_POST['listDA']) && count($_POST['listDA']) > 0)
            // {
            //     foreach ($_POST['listDA'] as $maDA)
            //     {
            //         $DA = json_decode($this->daModel->getDapAnById($maDA), true);
            //         array_push($listResults, $DA[0]);
            //     }
            // }

            // $count = 0;
            // $numQuestions = 0;
            // foreach ($listResults as $key => $value)
            // {
            //     if(isset($value["MaCH"]))
            //     {
            //         $numQuestions++;
            //     }
            //     if ($value["DungSai"] == '1')
            //     {
            //         $count++;
            //     }
                
            // }
            // echo $numQuestions;
            // echo $count;
            // $point = 10 / $numQuestions * $count;
            // echo 'Tổng số câu đúng:     ' . $count . '/' . $numQuestions. ' Vậy số điểm đạt được là: ' . round($point * 100) / 100;
        
        }  
        return $this->redirectTo("KetQua", "Index");
    }
}
?>