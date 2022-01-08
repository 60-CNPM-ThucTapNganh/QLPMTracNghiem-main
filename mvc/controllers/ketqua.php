<?php
class KetQua extends Controller{

    public $kqModel;

    public function __construct()
    {
        $this->kqModel = $this->model("KetQuaModel");
    }


    function Index()
    {
        $listKQ = json_decode($this->kqModel->listAll(), true);

        // trả về list kết quả
        $this->view("layoutCustomer", [
            'page' => 'indexKetQua',
            'listKQ' => $listKQ,
        ]);
    }
}