<?php
require_once './mvc/common/validate.php';
class DapAn extends Controller
{
    public $daModel;
    public $chModel;

    public function __construct()
    {
        $this->daModel = $this->model("DapAnModel");
        $this->chModel = $this->model("CauHoiModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function LayMaDA()
    {
        $maMax = $this->daModel->getMaMax();
        $maDA = (int)(substr($maMax, 2)) + 1; 
        $DA = "000". (string)$maDA; 
        return "DA" . substr($DA, -4); 
    }

    function Index()
    {
        $listDA = json_decode($this->daModel->listAll(), true);
        $listTenCH = json_decode($this->chModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "dapan/indexDA",
                'listDA' => $listDA,
                'listTenCH' => $listTenCH,
            ]
        );
    }

    function Create()
    {
        $listDA = json_decode($this->daModel->listAll(), true);
        $listTenCH = json_decode($this->chModel->listAll(), true);

        //tạo mã tự động
        $mada = $this->LayMaDA();

        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "dapan/createDA",
                "mada" => $mada,
                'listTenCH' => $listTenCH
            ]
        );
    }

    function Store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mada = $_POST['mada'];
            $dapan = $_POST['dapan'];
            $dungsai = $_POST['dungsai'];

            $cauhoi = $_POST['cauhoi'];

            validateNoiDungDA($dapan);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['da'] = [
                    'dapAn' => $dapan,
                    'dungSai' => $dungsai,
                    'ch' => $cauhoi
                ];
                return $this->redirectTo("DapAn", "Create");
            } else {
                $save = $this->model("DapAnModel");
                $save->insert($mada, $dapan, $dungsai, $cauhoi);
                $_SESSION['thongbao'] = "Thêm mới đáp án thành công";
            }
        }

        return $this->redirectTo("DapAn", "Index");
    }
    
    function Edit($id)
    {
        $da = json_decode($this->daModel->getDapAnById($id), true);
        $listTenCH = json_decode($this->chModel->listAll(), true);

        //view edit
        if (count($da) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'dapan/editDA',
                'da' => $da[0],
                'listTenCH' => $listTenCH
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mada = $_POST['mada'];
            $dapan = $_POST['dapan'];
            $dungsai = $_POST['dungsai'];
            $cauhoi = $_POST['cauhoi'];

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['da'] = [
                    'dapAn' => $dapan,
                    'dungSai' => $dungsai,
                    'ch' => $cauhoi
                ];
                return $this->redirectTo("DapAn", "Edit", ['id' => $mada]);
            }
            else {
                $save = $this->model("DapAnModel");
                $save->update($mada, $dapan, $dungsai, $cauhoi);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            }
        } 
        return $this->redirectTo("DapAn", "Index");
    }
  
    function Delete($id)
    {
        $da = json_decode($this->daModel->getDapAnById($id), true);
        $listTenCH = json_decode($this->chModel->listAll(), true);
        //view edit
        if (count($da) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'dapan/deleteDA',
                'da' => $da[0],
                'listTenCH' => $listTenCH
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("DapAnModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = " Xóa đáp án thành công";
        }
        return $this->redirectTo("DapAn", "Index");
    }
}
