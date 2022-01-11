<?php
class KetQuaModel extends DataBase
{
    public function listAll(){
        $qr = "SELECT * FROM ketqua";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($soCauDung, $soCauSai, $soCauChuaChon, $diemSo, $sinhvien, $maKT)
    {
        $qr = "INSERT INTO `ketqua` (`SoCauDung`, `SoCauSai`, `SoCauChuaChon`, `DiemSo`, `maSV`, `MaKT`)  VALUES ('" . $soCauDung . "', '" . $soCauSai . "','" . $soCauChuaChon . "','" . $diemSo . "','" . $sinhvien . "','" . $maKT . "')";
        return mysqli_query($this->con, $qr);
    }
}