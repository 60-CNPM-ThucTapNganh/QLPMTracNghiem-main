<?php
class DapAnModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM dapan";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getMaMax()
    {
        $qr = "SELECT MaDA FROM dapan ORDER BY MaDA DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['MaDA'];
    }

    public function getDapAnById($id)
    {
        $qr = "SELECT * FROM dapan,cauhoi WHERE dapan.MaCH = cauhoi.MaCH AND MaDA = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($mada, $dapan, $dungsai, $cauhoi)
    {
        $qr = "INSERT INTO dapan VALUES ('" . $mada . "', '" . $dapan . "','" . $dungsai . "', '" . $cauhoi . "')";
        return mysqli_query($this->con, $qr);
    }

    public function update($mada, $dapan, $dungsai, $cauhoi)
    {

        $qr = "UPDATE dapan SET DapAn = '$dapan', DungSai ='$dungsai', 
        MaCH = '$cauhoi' WHERE MaDA = '$mada'";
        return mysqli_query($this->con, $qr);
    }

    public function delete($mada)
    {
        $qr = "DELETE FROM dapan WHERE MaDA = '$mada'";
        return mysqli_query($this->con, $qr);
    }
}