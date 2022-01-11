<?php
class LichSuBaiLam extends Controller{

    public $lsblModel;
    public $daModel;
    public $ktModel;
    public $mhModel;

    public function __construct()
    {
        $this->lsblModel = $this->model("LichSuBaiLamModel");
        $this->daModel = $this->model("DapAnModel");
        $this->ktModel = $this->model("KyThiModel");
        $this->mhModel = $this->model("MonHocModel");
    }

    public function Index($id){
        $listLSBL = json_decode($this->lsblModel->listAll(), true);
        for($i = 0; $i < count($listLSBL); $i++) {
            $listLSBL[$i]['ListDA'] = json_decode($this->daModel->getDapAns($listLSBL[$i]['MaCH']), true);
        }
        $kt = json_decode($this->ktModel->getKyThiById($id), true);
        $listMH = json_decode($this->mhModel->listAll(), true);

        // echo '<pre>';
        // print_r($listLSBL);
        // echo '</pre>';
        // return;
        $this->view("layoutCustomer", [
            'page' => 'indexLichSuBaiLam',
            'listLSBL' => $listLSBL,
            'kt' => $kt,
            'listMH' => $listMH
        ]);
    }
}