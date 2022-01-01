<?php
require_once './mvc/common/validate.php';
class MonHoc extends Controller
{
    public $mhModel;

    public function __construct()
    {
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


    function Index()
    {
        $listMH = json_decode($this->mhModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "monhoc/indexMH",
                'listMH' => $listMH
            ]
        );
    }

    function Create()
    {
        $this->view(
            "layoutAdmin",
            [
                "page" => "monhoc/createMH"
            ]
        );
    }

    function Edit($id)
    {
        $mh = json_decode($this->mhModel->getMonHocById($id), true);
        //view edit
        if (count($mh) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'monhoc/editMH',
                'mh' => $mh[0],
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["mamh"])) {
                $mamh = $_POST['mamh'];
            }
            if (isset($_POST["tenmh"])) {
                $tenmh = $_POST['tenmh'];
            }
            validateMaMH($mamh);
            if(!isset($_SESSION['error']['maMH'])) {
                $result = $this->mhModel->checkPK($mamh);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['maMH'] = "Mã môn học đã tồn tại";
                }
            }
            validateTenMH($tenmh);
            if(isset($_SESSION['error']) && count($_SESSION['error']) > 0){
                // Lấy lại giá trị trước khi redirect về
                $_SESSION['mh'] = ['maMH' => $mamh, 'tenMH' => $tenmh];
                return $this->redirectTo("MonHoc", "Create");
            }
            
            else{
                $save = $this->model("MonHocModel");
                $save->insert($mamh, $tenmh);
                $_SESSION['thongbao'] = "Thêm mới môn học thành công";
            }
            
        }

        return $this->redirectTo("MonHoc", "Index");
    }


    function Save($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mamh = $_POST['mamh'];
            $tenmh = $_POST['tenmh'];
            validateTenMH($tenmh);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['mh'] = [
                    'tenMH' => $tenmh,
                ];
                return $this->redirectTo("MonHoc", "Edit", ['id' => $mamh]);
            }else{
                $this->mhModel->update($mamh, $tenmh);
            }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo("MonHoc", "Index");

        }
    }

    function Delete($id)
    {
        $mh = json_decode($this->mhModel->getMonHocById($id), true);
        //view edit
        if (count($mh) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'monhoc/deleteMH',
                'mh' => $mh[0],
            ]);
        } else
            echo "Không tìm thấy";
    }
    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("MonHocModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa môn học thành công";
        }
        return $this->redirectTo("MonHoc", "Index");
    }
}
