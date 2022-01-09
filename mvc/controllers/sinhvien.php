<?php
require_once './mvc/common/validate.php';
class SinhVien extends Controller
{

    public $svModel;
    public $lopModel;
    public function __construct()
    {
        $this->svModel = $this->model("SinhVienModel");
        $this->lopModel = $this->model("LopModel");
        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYSINHVIEN");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function LayMaSV()
    {
        $maMax = $this->svModel->getMaMax();
        $maSV = (int)(substr($maMax, 2)) + 1; 
        $SV = "000". (string)$maSV; 
        return "SV" . substr($SV, -4); 
    }
    function Index()
    {
        $maSV = "";
        $tenSV = "";
        $gioiTinh = "";
        $maLop = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = trim($_POST['maSV']);
            $tenSV = trim($_POST['tenSV']);
            $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : "";
            $maLop = $_POST['maLop'];
        } //mà mặc định là get rồi '-', uawf thi tu get r ma
        
        $listSV = json_decode($this->svModel->TimKiem($maSV, $tenSV, $gioiTinh, $maLop), true);
        $listTenLop = json_decode($this->lopModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "sinhvien/indexSV",
                'listSV' => $listSV,
                'listTenLop' => $listTenLop
            ]
        );
    }

    function Details($id)
    {
        $sv = json_decode($this->svModel->getSinhVienById($id), true);
        $listTenLop = json_decode($this->lopModel->listAll(), true);
        //view edit
        if (count($sv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'sinhvien/detailsSV',
                'sv' => $sv[0],
                'listTenLop' => $listTenLop
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Create()
    {
        $listSV = json_decode($this->svModel->getSV(), true);
        $listTenLop = json_decode($this->lopModel->listAll(), true);

        //tạo mã tự động
        $masv = $this->LayMaSV();
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "sinhvien/createSV",
                "masv" => $masv,
                'listTenLop' => $listTenLop
            ]
        );
    }

    function Store()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $masv = $_POST['masv'];
            $tensv = $_POST['tensv'];
            $gioiTinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sdt = $_POST['sdt'];
            if ($_FILES["hinhanh"]['name'] != NULL) {
                $hinhanh = $_FILES["hinhanh"]['name'];
                move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "public/upload/nguoidung/" . $_FILES["hinhanh"]["name"]);
            }
            $lop = $_POST['lop'];

            validateTenSV($tensv);
            validateNgaySinh($ngaysinh);
            validateDiaChi($diachi);
            validateEmail($email);
            if(validateEmail($email) == null){
                $result = $this->svModel->checkEmail($email);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['email'] = "Email này đã tồn tại!";
                }
            }
            validateMatKhau($password);
            validateSoDienThoai($sdt);
            validateAnhSV($_FILES["hinhanh"]['name']);
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['sv'] = [
                    'tenSV' => $tensv,
                    'gioiTinh' => $gioiTinh,
                    'ngaySinh' => $ngaysinh,
                    'diaChi' => $diachi,
                    'email' => $email,
                    'matKhau' => $password,
                    'soDienThoai' => $sdt,
                    'lop' => $lop
                ];
                return $this->redirectTo("SinhVien", "Create");
            } else {
                $save = $this->model("SinhVienModel");
                $save->insert($masv, $tensv, $gioiTinh, $ngaysinh, $diachi, $email, md5($password), $sdt, $hinhanh, $lop);
                // $save->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $hinhAnh, $nhomNV);
                $_SESSION['thongbao'] = "Thêm mới sinh viên thành công";
            }
        }

        return $this->redirectTo("SinhVien", "Index");
    }

    function Edit($id)
    {
        $sv = json_decode($this->svModel->getSinhVienById($id), true);
        $listTenLop = json_decode($this->lopModel->listAll(), true);

        //view edit
        if (count($sv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'sinhvien/editSV',
                'sv' => $sv[0],
                'listTenLop' => $listTenLop
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $maSV = $_POST['maSV'];
            $tenSV = $_POST['tenSV'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioitinh'];
            $diaChi = $_POST['diaChi'];
            $sdt = $_POST['sdt'];
            $lop = $_POST['lop'];

            validateTenSV($tenSV);
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
                    'lop' => $lop
                ];
                return $this->redirectTo("SinhVien", "Edit", ['id' => $maSV]);
            }
            else if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['name'] != "") {
                $hinh = $_FILES['hinhAnh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/nguoidung/" . $tenAnh);
                $this->nvModel->update($maSV, $tenSV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $tenAnh, $lop);
            } else {
                $this->nvModel->update($maSV, $tenSV, $gioiTinh, $ngaySinh, $diaChi, $sdt, null, $lop);
            }

            // if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
                if ($_SESSION['userClient']['maSV'] == $maSV) {
                    if ($tenAnh != "") {
                        $_SESSION['userClient']['hinhAnh'] = $tenAnh;
                    }
                    $_SESSION['userClient']['tenSV'] = $tenSV;
                }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo("SinhVien", "Index");
            // }
        }
    }

    function Delete($id)
    {
        $sv = json_decode($this->svModel->getSinhVienById($id), true);
        $listTenLop = json_decode($this->lopModel->listAll(), true);
        //view edit
        if (count($sv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'sinhvien/deleteSV',
                'sv' => $sv[0],
                'listTenLop' => $listTenLop
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("SinhVienModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa sinh viên thành công";
        }
        return $this->redirectTo("SinhVien", "Index");
    }
}

