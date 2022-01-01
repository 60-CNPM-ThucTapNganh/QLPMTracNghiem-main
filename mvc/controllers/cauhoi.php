<?php
require_once './mvc/common/validate.php';
class CauHoi extends Controller
{
    public $chModel;
    public $mhModel;

    public function __construct()
    {
        $this->chModel = $this->model("CauHoiModel");
        $this->mhModel = $this->model("MonHocModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function LayMaCH()
    {
        $maMax = $this->chModel->getMaMax();
        $maCH = (int)(substr($maMax, 2)) + 1; 
        $CH = "000". (string)$maCH; 
        return "CH" . substr($CH, -4); 
    }

    function Index()
    {
        $listCH = json_decode($this->chModel->listAll(), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "cauhoi/indexCH",
                'listCH' => $listCH,
                'listTenMH' => $listTenMH,
            ]
        );
    }

    function Create()
    {
        $listCH = json_decode($this->chModel->listAll(), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);

        //tạo mã tự động
        $mach = $this->LayMaCH();

        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "cauhoi/createCH",
                "mach" => $mach,
                'listTenMH' => $listTenMH
            ]
        );
    }

    function Store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mach = $_POST['mach'];
            $noidung = $_POST['noidung'];
            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/douong/" . $_FILES["hinh"]["name"]);
            }

            $monhoc = $_POST['monhoc'];

            validateNoiDung($noidung);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['ch'] = [
                    'noiDung' => $noidung,
                    'mh' => $monhoc
                ];
                return $this->redirectTo("CauHoi", "Create");
            } else {
                $save = $this->model("CauHoiModel");
                $save->insert($mach, $noidung, $hinh, $monhoc);
                $_SESSION['thongbao'] = "Thêm mới câu hỏi thành công";
            }
        }

        return $this->redirectTo("CauHoi", "Index");
    }
    
    function Edit($id)
    {
        $ch = json_decode($this->chModel->getCauHoiById($id), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);

        //view edit
        if (count($ch) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'cauhoi/editCH',
                'ch' => $ch[0],
                'listTenMH' => $listTenMH
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $mach = $_POST['mach'];
            $noidung = $_POST['noidung'];
            $monhoc = $_POST['monhoc'];


            validateNoiDung($noidung);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['ch'] = [
                    'noiDung' => $noidung,
                    'mh' => $monhoc
                ];
                return $this->redirectTo("CauHoi", "Edit", ['id' => $mach]);
            }
            else if (isset($_FILES['hinh']) && $_FILES['hinh']['name'] != "") {
                $hinh = $_FILES['hinh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/cauhoi/" . $tenAnh);
                $save = $this->model("CauHoiModel");
                $save->update($mach, $noidung, $tenAnh, $monhoc);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            } else {
                $save = $this->model("CauHoiModel");
                $save->update($mach, $noidung, null, $monhoc);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            }
        } 
        return $this->redirectTo("CauHoi", "Index");
    }

    function Details($id)
    {
        $ch = json_decode($this->chModel->getCauHoiById($id), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        //view edit
        if (count($ch) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'cauhoi/detailsCH',
                'ch' => $ch[0],
                'listTenMH' => $listTenMH
            ]);
        } else
            echo "Không tìm thấy";
    }
    
    function Delete($id)
    {
        $ch = json_decode($this->chModel->getCauHoiById($id), true);
        $listTenMH = json_decode($this->mhModel->listAll(), true);
        //view edit
        if (count($ch) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'cauhoi/deleteCH',
                'ch' => $ch[0],
                'listTenMH' => $listTenMH
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("CauHoiModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = " Xóa câu hỏi thành công";
        }
        return $this->redirectTo("CauHoi", "Index");
    }
}
