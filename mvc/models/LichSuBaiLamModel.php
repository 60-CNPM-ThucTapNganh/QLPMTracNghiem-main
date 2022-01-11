<?php
class LichSuBaiLamModel extends DataBase {
    public function listAll()
    {
        $qr = "SELECT * FROM lichsubailam lsbl, kythi kt, cauhoi ch 
        WHERE lsbl.MaKT = kt.MaKT AND lsbl.MaCH = ch.MaCH";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($maKT, $sinhvien, $maCH, $maDA)
    {
        $qr = "INSERT INTO `lichsubailam` (`MaKT`, `maSV`, `MaCH`, `MaDA`)  
        VALUES ('$maKT', '$sinhvien','$maCH', '$maDA') ON DUPLICATE KEY UPDATE MaDA = '$maDA'";
        return mysqli_query($this->con, $qr);
    }
}
?>