<?php
class ChiTietKyThi extends Controller
{

    public $ktModel;
    public $chModel;
    public $ctktModel;
    public function __construct()
    {
        $this->ktModel = $this->model("KyThiModel");
        $this->chModel = $this->model("CauHoiModel");
        $this->ctktModel = $this->model("ChiTietKyThiModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index()
    {
        $listCTKT = json_decode($this->ctktModel->getCTKT(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "chitietkythi/indexCTKT",
                'listCTKT' => $listCTKT
            ]
        );
    }

    function Create()
    {
        $listKT = json_decode($this->ktModel->listAll(), true);
        $listCH = json_decode($this->chModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "chitietkythi/createCTKT",
                "kt" => $listKT,
                "ch" => $listCH
            ]
        );
    }

    function Store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maKT = $_POST['maKT'];
            $maCH = $_POST['maCH'];
            $result = $this->ctktModel->checkPK($maKT, $maCH);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['error']['ctkt'] = "Câu hỏi này đã tồn tại trong kỳ thi";
                $_SESSION['ctkt'] = ['maKT' => $maKT, 'maCH' => $maCH];
                return $this->redirectTo('ChiTietKyThi', 'Create');
            }

            $this->ctktModel->insert($maKT, $maCH);
            $_SESSION['thongbao'] = "Thêm mới thành công";
        }
        return $this->redirectTo("ChiTietKyThi", "Index");
    }


    function Delete($maKT, $maCH)
    {
        $ctkt = json_decode($this->ctktModel->getChiTietKyThiById($maKT, $maCH), true);

        //view edit
        if (count($ctkt) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'chitietkythi/deleteCTKT',
                'ctkt' => $ctkt[0],
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($maKT, $maCH)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->ctktModel->delete($maKT, $maCH);
        }
        $_SESSION['thongbao'] = "Xóa thành công";
        return $this->redirectTo("ChiTietKyThi", "Index");
    }
}
