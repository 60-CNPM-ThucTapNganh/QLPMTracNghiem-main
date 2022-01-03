<?php
require_once './mvc/common/validate.php';
class KyThi extends Controller
{
    public $ktModel;
    public $nvModel;
    public $mhModel;

    public function __construct()
    {
        $this->ktModel = $this->model("KyThiModel");
        $this->nvModel = $this->model("NhanVienModel");
        $this->mhModel = $this->model("MonHocModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        }
        else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function LayMaKT()
    {
        $maMax = $this->ktModel->getMaMax();
        $maKT = (int)(substr($maMax, 2)) + 1; 
        $KT = "000". (string)$maKT; 
        return "KT" . substr($KT, -4); 
    }

    function Index()
    {
        $listKT = json_decode($this->ktModel->listAll(), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        $NV = json_decode($this->nvModel->getNV(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "kythi/indexKT",
                'listKT' => $listKT,
                'listTenMH' => $listTenMH,
                'NV' => $NV
            ]
        );
    }

    function Create()
    {
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        $NV = json_decode($this->nvModel->getNV(), true);

        //tạo mã tự động
        $makt = $this->LayMaKT();

        $this->view(
            "layoutAdmin",
            [
                "page" => "kythi/createKT",
                "makt" => $makt,
                'listTenMH' => $listTenMH,
                'NV' => $NV
            ]
        );
    }

    function Store()
    {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $makt = $_POST['makt'];
            $tenkt = $_POST['tenkt'];
            $thoigian = $_POST['thoigian'];
            $thoigianBD = $_POST['thoigianBD'];
            $thoigianKT = $_POST['thoigianKT'];
            $tongsocau = $_POST['tongsocau'];
            $nhanvien = json_decode($this->nvModel->getNhanVienById($_SESSION["user"]["maNV"]), true);
            $monhoc = $_POST['monhoc'];

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['kt'] = [
                    'tenKT' => $tenkt,
                    'thoiGian' => $thoigian,
                    'thoiGianBD' => $thoigianBD,
                    'thoiGianKT' => $thoigianKT,
                    'tongSoCau' => $tongsocau,
                    'nv' => $nhanvien,
                    'mh' => $monhoc
                ];
                return $this->redirectTo("KyThi", "Create");
            } else {
                $save = $this->model("KyThiModel");
                $save->insert($makt, $tenkt, $thoigian, $thoigianBD, $thoigianKT, $tongsocau, $_SESSION["user"]["maNV"], $monhoc);
                $_SESSION['thongbao'] = "Thêm mới kỳ thi thành công";
            }
        }

        return $this->redirectTo("KyThi", "Index");
    }

    function Edit($id)
    {
        $kt = json_decode($this->ktModel->listAll(), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        $NV = json_decode($this->nvModel->getNV(), true);

        //view edit
        if (count($kt) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'kythi/editKT',
                'kt' => $kt[0],
                'listTenMH' => $listTenMH,
                'NV' => $NV
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $makt = $_POST['makt'];
            $tenkt = $_POST['tenkt'];
            $thoigian = $_POST['thoigian'];
            $thoigianBD = $_POST['thoigianBD'];
            $thoigianKT = $_POST['thoigianKT'];
            $tongsocau = $_POST['tongsocau'];
            $nhanvien = json_decode($this->nvModel->getNhanVienById($_SESSION["user"]["maNV"]), true);
            $monhoc = $_POST['monhoc'];
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['kt'] = [
                    'tenKT' => $tenkt,
                    'thoiGian' => $thoigian,
                    'thoiGianBD' => $thoigianBD,
                    'thoiGianKT' => $thoigianKT,
                    'tongSoCau' => $tongsocau,
                    'nv' => $nhanvien,
                    'mh' => $monhoc
                ];
                return $this->redirectTo("KyThi", "Edit", ['id' => $makt]);
            }
            else {
                $save = $this->model("KyThiModel");
                $save->update($makt, $tenkt, $thoigian, $thoigianBD, $thoigianKT, $tongsocau, $_SESSION["user"]["maNV"], $monhoc);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            }
        } 
        return $this->redirectTo("KyThi", "Index");
    }
    
}