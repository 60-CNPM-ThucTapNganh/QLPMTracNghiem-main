<?php
class KyThiClient extends Controller
{
    public $ktModel;
    public $nvModel;
    public $mhModel;

    public function __construct()
    {
        $this->ktModel = $this->model("KyThiModel");
        $this->nvModel = $this->model("NhanVienModel");
        $this->mhModel = $this->model("MonHocModel");
    }

    // Client
    function Index()
    {
        $listKT = json_decode($this->ktModel->listAll(), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        $NV = json_decode($this->nvModel->getNV(), true);
        $this->view(
            "layoutCustomer",
            [
                "page" => "indexKyThi",
                'listKT' => $listKT,
                'listTenMH' => $listTenMH,
                'NV' => $NV
            ]
        );
    }
}