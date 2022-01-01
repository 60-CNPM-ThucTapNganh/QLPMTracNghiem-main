<?php
require_once './mvc/common/validate.php';
class Lop extends Controller
{
    public $lopModel;

    public function __construct()
    {
        $this->lopModel = $this->model("LopModel");

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
        $listLop = json_decode($this->lopModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "lop/indexLop",
                'listLop' => $listLop
            ]
        );
    }

    function Create()
    {
        $this->view(
            "layoutAdmin",
            [
                "page" => "lop/createLop"
            ]
        );
    }

    function Edit($id)
    {
        $lop = json_decode($this->lopModel->getLopById($id), true);
        //view edit
        if (count($lop) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'lop/editLop',
                'lop' => $lop[0],
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["malop"])) {
                $malop = $_POST['malop'];
            }
            if (isset($_POST["tenlop"])) {
                $tenlop = $_POST['tenlop'];
            }
            validateMaLop($malop);
            if(!isset($_SESSION['error']['maLop'])) {
                $result = $this->lopModel->checkPK($malop);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error']['maLop'] = "Mã lớp đã tồn tại";
                }
            }
            validateTenLop($tenlop);
            if(isset($_SESSION['error']) && count($_SESSION['error']) > 0){
                // Lấy lại giá trị trước khi redirect về
                $_SESSION['lop'] = ['maLop' => $malop, 'tenLop' => $tenlop];
                return $this->redirectTo("Lop", "Create");
            }
            
            else{
                $save = $this->model("LopModel");
                $save->insert($malop, $tenlop);
                $_SESSION['thongbao'] = "Thêm mới lớp thành công";
            }
            
        }

        return $this->redirectTo("Lop", "Index");
    }


    function Save($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $malop = $_POST['malop'];
            $tenlop = $_POST['tenlop'];
            validateTenLop($tenlop);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['lop'] = [
                    'tenLop' => $tenlop,
                ];
                return $this->redirectTo("Lop", "Edit", ['id' => $malop]);
            }else{
                $this->lopModel->update($malop, $tenlop);
            }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo("Lop", "Index");

        }
    }

    function Delete($id)
    {
        $lop = json_decode($this->lopModel->getLopById($id), true);
        //view edit
        if (count($lop) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'lop/deleteLop',
                'lop' => $lop[0],
            ]);
        } else
            echo "Không tìm thấy";
    }
    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("LopModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa lớp thành công";
        }
        return $this->redirectTo("Lop", "Index");
    }
}
