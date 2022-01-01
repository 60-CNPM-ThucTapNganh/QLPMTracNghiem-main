<?php
class LopModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM lop";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getLopById($id) {
        $qr = "SELECT * FROM lop WHERE MaLop = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($malop, $tenlop) {
        $qr = "INSERT INTO lop (MaLop, TenLop) VALUES ('".$malop."', '".$tenlop."')";
        return mysqli_query($this->con, $qr);
    }

    public function checkPK($malop){
        $result = "SELECT * FROM lop WHERE MaLop = '$malop'";
        return mysqli_query($this->con, $result);
    }

    public function update($malop, $tenlop) {
        $qr = "UPDATE lop SET TenLop = '$tenlop'  WHERE MaLop = '$malop'";   
        return mysqli_query($this->con, $qr);
    }

    public function delete($malop)
    {
        $qr = "DELETE FROM lop WHERE MaLop = '$malop'";
        return mysqli_query($this->con, $qr);
    }
}
?>