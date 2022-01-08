<?php
class ChiTietKyThiModel extends DataBase {

    public function getCTKT()
    {
        $qr = "SELECT * FROM kythi_cauhoi ctkt, kythi kt, cauhoi ch 
        WHERE ctkt.MaKT = kt.MaKT AND ctkt.MaCH = ch.MaCH
        ORDER BY RAND()";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getChiTietKyThiById($maKT, $maCH) {
        $qr = "SELECT * FROM kythi_cauhoi ctkt, kythi kt, cauhoi ch 
        WHERE ctkt.MaKT = kt.MaKT AND ctkt.MaCH = ch.MaCH
        AND ctkt.MaKT = '$maKT' AND ctkt.MaCH = '$maCH'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    } 

    public function checkPK($maKT, $maCH) {
        $qr = "SELECT * FROM kythi_cauhoi
        WHERE MaKT = '$maKT' AND MaCH = '$maCH'";
        return mysqli_query($this->con, $qr);
    }
    
    public function insert($maKT, $maCH) {
        $qr = "INSERT INTO kythi_cauhoi (MaKT, MaCH) VALUES ('".$maKT."', '".$maCH."')";
        return mysqli_query($this->con, $qr);
    }

    public function delete($maKT, $maCH)
    {
        $qr = "DELETE FROM kythi_cauhoi WHERE MaKT = '$maKT' AND MaCH = '$maCH'";
        return mysqli_query($this->con, $qr);
    }
}
?>