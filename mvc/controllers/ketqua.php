<?php
class KetQua extends Controller{

    public $kqModel;
    public $svModel;
    public $ktModel;

    public function __construct()
    {
        $this->kqModel = $this->model("KetQuaModel");
        $this->svModel = $this->model("SinhVienModel");
        $this->ktModel = $this->model("KyThiModel");
    }

    function Index()
    {
        $listKQ = json_decode($this->kqModel->listAll(), true);
        $SV = json_decode($this->svModel->getSV(), true);
        $listKT = json_decode($this->ktModel->listAll(), true);

        // trả về list kết quả
        $this->view("layoutCustomer", [
            'page' => 'indexKetQua',
            'listKQ' => $listKQ,
            'SV' => $SV,
            'listKT' => $listKT
        ]);
    }
}