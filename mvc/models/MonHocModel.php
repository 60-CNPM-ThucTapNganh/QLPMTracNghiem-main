<?php
class MonHocModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM monhoc";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getMonHocById($id) {
        $qr = "SELECT * FROM monhoc WHERE MaMH = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($mamh, $tenmh) {
        $qr = "INSERT INTO monhoc (MaMH, TenMH) VALUES ('".$mamh."', '".$tenmh."')";
        return mysqli_query($this->con, $qr);
    }

    public function checkPK($mamh){
        $result = "SELECT * FROM monhoc WHERE MaMH = '$mamh'";
        return mysqli_query($this->con, $result);
    }

    public function update($mamh, $tenmh) {
        $qr = "UPDATE monhoc SET TenMH = '$tenmh' WHERE MaMH = '$mamh'";   
        return mysqli_query($this->con, $qr);
    }

    public function delete($mamh)
    {
        $qr = "DELETE FROM monhoc WHERE MaMH = '$mamh'";
        return mysqli_query($this->con, $qr);
    }
}
?>