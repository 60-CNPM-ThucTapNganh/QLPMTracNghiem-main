<?php
class CauHoiModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM cauhoi";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getMaMax()
    {
        $qr = "SELECT MaCH FROM cauhoi ORDER BY MaCH DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['MaCH'];
    }

    public function getCauHoiById($id)
    {
        $qr = "SELECT * FROM cauhoi,monhoc WHERE cauhoi.MaMH = monhoc.MaMH AND MaCH = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($mach, $noidung, $anhch, $monhoc)
    {
        $qr = "INSERT INTO cauhoi VALUES ('" . $mach . "', '" . $noidung . "','" . $anhch . "', '" . $monhoc . "')";
        return mysqli_query($this->con, $qr);
    }

    public function update($mach, $noidung, $anhch, $monhoc)
    {
        if($anhch != null){
            $qr = "UPDATE cauhoi SET NoiDung = '$noidung', HinhAnh ='$anhch', 
            MaMH = '$monhoc' WHERE MaCH = '$mach'";
        } else {
            $qr = "UPDATE cauhoi SET NoiDung = '$noidung',
            MaMH = '$monhoc' WHERE MaCH = '$mach'";
        }
        return mysqli_query($this->con, $qr);
    }

    public function delete($mach) {
        $qr = "DELETE FROM cauhoi WHERE MaCH = '$mach'";
        return mysqli_query($this->con, $qr);
    }
}