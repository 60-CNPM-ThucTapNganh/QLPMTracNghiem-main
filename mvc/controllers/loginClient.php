<?php 
require_once './mvc/common/validate.php';
    class loginClient extends controller{

        public $loginclientmodel;
        public function __construct()
        {
            $this->loginmodel = $this->model("loginclientmodel");

        }
        
        function redirect($url) {
            header("location: " . $url);
        }

        public function index(){
            $this->view("loginClient", [

            ]);
        }

        public function loginClient(){
            $result_mess = false;
            if(isset($_POST["submit"])){
                // echo '<pre>';
                // print_r($_POST);
                // echo '</pre>';
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password_input = $_POST["password"];
                // email và password để trống thì in ra lỗi
                validateUser($email);
                validatePassword($password);
                if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                    $_SESSION['loginClient'] = ['Email' => $email];
                    return $this->redirectTo("loginClient", "Index");
                }
                else{
                // mớ này email đúng mk đúng thì vào trang HomeAdmin index
                // email đúng mk sai thì in ra lỗi
                $result = $this->loginmodel->login($email);
                if(mysqli_num_rows($result) > 0){
                    if(mysqli_num_rows($result)){
                        while($row = mysqli_fetch_array($result)){
                            $maSV = $row["maSV"];
                            $tenSV = $row["tenSV"];
                            $email = $row["email"];
                            $password = $row["password"];
                            $hinhanh = $row["hinhAnh"];
                            $MaLop = $row["MaLop"];
                        }
                        if((md5($password_input) == $password)){
                            $_SESSION["userClient"]= [
                                "maSV" => $maSV,
                                "tenSV" => $tenSV,
                                "hinhAnh" => $hinhanh,
                                "MaLop" => $MaLop
                            ];
                            $this->redirectTo('HomeClient', 'Index');
                        }
                        else{
                            $this->view("loginClient",
                            [
                                "result"=>$result_mess,
                            ]);
                        }
                    } 
                }
                else{
                    $this->view("loginClient",
                    [
                        "result"=>$result_mess,
                    ]);
                }
                }
            }
        }
        
        public function logout(){
            unset($_SESSION["userClient"]);
            session_destroy();
            $this->view("loginClient",
            [
            ]);
        }
    }
?>  