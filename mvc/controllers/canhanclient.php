<?php
require_once './mvc/common/validate.php';

class CaNhanClient extends Controller{
    public $caNhanModel;

    public function __construct()
    {
        if (!isset($_SESSION["userClient"])) {
            $this->redirectTo("loginClient", "Index");
        }
        $this->caNhanModel = $this->model("CaNhanClientModel");
    }
    
    function Index()
    {
        $sv = json_decode($this->caNhanModel->getCaNhanClientById($_SESSION["userClient"]["maSV"]), true);
        $this->view(
            "layoutCustomer",
            [
                "page" => "canhanClient/indexCaNhan",
                'sv' => $sv[0]
            ]
        );
    }


    function indexCaNhanedit()
    {
        $sv = json_decode($this->caNhanModel->getCaNhanClientById($_SESSION["userClient"]["maSV"]), true);
        $this->view(
            "layoutCustomer",
            [
                "page" => "canhanClient/indexCaNhanedit",
                'sv' => $sv[0]
            ]
        );
    }

    function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $maSV = $_POST['maSV'];
            $tenSV = $_POST['tenSV'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioiTinh'];
            $diaChi = $_POST['diaChi'];
            $sdt = $_POST['sdt'];


            validatetenSV($tenSV);
            validateNgaySinh($ngaySinh);
            validateDiaChi($diaChi);
            validateSoDienThoai($sdt);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['sv'] = [
                    'tenSV' => $tenSV,
                    'gioiTinh' => $gioiTinh,
                    'ngaySinh' => $ngaySinh,
                    'diaChi' => $diaChi,
                    'soDienThoai' => $sdt,
                ];
                return $this->redirectTo("canhanClient", "indexCaNhanedit", ['id' => $maSV]);
            } else if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['name'] != "") {
                $hinh = $_FILES['hinhAnh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/nguoidung/" . $tenAnh);
                $this->caNhanModel->updateCaNhanClient($maSV, $tenSV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $tenAnh, $_SESSION['userClient']['MaLop']);
            } else {
                $this->caNhanModel->updateCaNhanClient($maSV, $tenSV, $gioiTinh, $ngaySinh, $diaChi, $sdt, null, $_SESSION['userClient']['MaLop']);
            }

            // if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
                if ($_SESSION['userClient']['maSV'] == $maSV) {
                    if ($tenAnh != "") {
                        $_SESSION['userClient']['hinhAnh'] = $tenAnh;
                    }
                    $_SESSION['userClient']['tenSV'] = $tenSV;
                }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo('canhanClient', 'indexCaNhan');
            // }
        }
    }

}
?>