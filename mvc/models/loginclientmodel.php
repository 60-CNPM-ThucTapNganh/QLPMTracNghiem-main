<?php
    class loginclientmodel extends DataBase{
        public function login($email){
            $sql = "SELECT * FROM sinhvien WHERE email='$email'";
            return mysqli_query($this->con,$sql);
        }
    }
?>