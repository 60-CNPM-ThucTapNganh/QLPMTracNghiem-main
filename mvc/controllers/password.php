<?php 
require './phpmailer/includes/PHPMailer.php';
require './phpmailer/includes/SMTP.php';
require './phpmailer/includes/Exception.php';
                     
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once './mvc/common/validate.php';
    class Password extends controller{

        public $loginpasswordmodel;
        public function __construct()
        {
            $this->loginmodel = $this->model("loginpasswordmodel");

        }
        
        function redirect($url) {
            header("location: " . $url);
        }

        public function index(){
            $this->view("indexpassword", [

            ]);
        }

        public function loginPassword(){
            $result_mess = false;
            if(isset($_POST["submit"])){
      
                $email = $_POST["email"];
                $email_input = $_POST["email"];
                // email và password để trống thì in ra lỗi
                validateUser($email);

                if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                    $_SESSION['Password'] = ['Email' => $email];
                    return $this->redirectTo("Password", "index");
                }
                else{
                $result = $this->loginmodel->passwordmodel($email);
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
                        if(($email_input == $email)){

                                $mess="";
                                $mailLayMK = $_POST['email'];
                        
                                $mail = new PHPMailer(true);
                        
                                $mail->isSMTP();                                          
                                $mail->Host       = 'smtp.gmail.com';                   
                                $mail->SMTPAuth   = true;                                 
                                $mail->Username   = 'killerbee0088@gmail.com';   //Mail admin           
                                $mail->Password   = '011235813aA';                             
                                $mail->SMTPSecure = 'tls';           
                                $mail->Port       = '587';   
                        
                                $mail->setFrom('killerbee0088@gmail.com');
                                $mail->addAddress($mailLayMK); //Mail nguoi nhan
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Return Password QuanLiTracNghiem';
                                $mail->Body    = 'Your password is:'.$password;

                                if( $mail->send())
                                   echo 'Message has been sent';
                                else{
                                    echo "Error";
                                }
                             
                            $this->redirectTo('Password', 'index');
                        }
                        else{
                            $this->view("indexpassword",
                            [
                                "result"=>$result_mess,
                            ]);
                        }
                    } 
                }
                else{
                    $this->view("indexpassword",
                    [
                        "result"=>$result_mess,
                    ]);
                }
                }
            }
        }
    }
?>