<?php
class KyThiModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM kythi";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getMaMax()
    {
        $qr = "SELECT MaKT FROM kythi ORDER BY MaKT DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['MaKT'];
    }

    public function getKyThiById($id)
    {
        $qr = "SELECT * 
                FROM kythi kt
                INNER JOIN monhoc mh ON kt.MaMH = mh.MaMH
                INNER JOIN nhanvien nv ON kt.maNV = nv.maNV
                WHERE kt.MaKT = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($makt, $tenkt, $thoigian, $thoigianBD, $thoigianKT, $tongsocau, $nhanvien, $monhoc)
    {
        $qr = "INSERT INTO kythi VALUES ('" . $makt . "', '" . $tenkt . "','" . $thoigian . "', '" . $thoigianBD . "', '" . $thoigianKT . "','" . $tongsocau . "', '" . $nhanvien . "', '" . $monhoc . "')";
        return mysqli_query($this->con, $qr);
    }
    
    public function update($makt, $tenkt, $thoigian, $thoigianBD, $thoigianKT, $tongsocau, $nhanvien, $monhoc) {
        $qr = "UPDATE kythi SET TenKT = '$tenkt', ThoiGian = '$thoigian', ThoiGianBD = '$thoigianBD', ThoiGianKT = '$thoigianKT', TongSoCau = '$tongsocau', maNV = '$nhanvien', MaMH = '$monhoc' WHERE MaKT = '$makt'";   
        return mysqli_query($this->con, $qr);
    }

}