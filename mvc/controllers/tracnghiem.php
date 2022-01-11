<?php
class TracNghiem extends Controller{

    public $ctktModel;
    public $daModel;
    public $ktModel;
    public $mhModel;

    public function __construct()
    {
        $this->ctktModel = $this->model("ChiTietKyThiModel");
        $this->daModel = $this->model("DapAnModel");
        $this->ktModel = $this->model("KyThiModel");
        $this->mhModel = $this->model("MonHocModel");
    }

    public function Index($id){
        $listTN = json_decode($this->ctktModel->getCTKT(), true);
        for($i = 0; $i < count($listTN); $i++) {
            $listTN[$i]['ListDA'] = json_decode($this->daModel->getDapAns($listTN[$i]['MaCH']), true);
        }
        
        $kt = json_decode($this->ktModel->getKyThiById($id), true);
        $listMH = json_decode($this->mhModel->listAll(), true);
        // echo '<pre>';
        // print_r($kt);
        // echo '</pre>';
        $this->view("layoutCustomer", [
            'page' => 'indexTracNghiem',
            'listTN' => $listTN,
            'kt' => $kt,
            'listMH' => $listMH
        ]);
    }

    public function SaveResult() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
            $save->insert($soCauDung, $soCauSai, $soCauChuaChon, $diemSo, $_SESSION["userClient"]["maSV"]);
        }  
        return $this->redirectTo("KetQua", "Index");
    }
}
?>