<?php
    class loginpasswordmodel extends DataBase{
        public function passwordmodel($email){
            $sql = "SELECT * FROM sinhvien WHERE email='$email'";
            return mysqli_query($this->con,$sql);
        }
    }
?>