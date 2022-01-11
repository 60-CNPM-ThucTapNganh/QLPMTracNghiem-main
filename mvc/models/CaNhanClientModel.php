<?php
class CaNhanClientModel extends DataBase {
    public function getSV()
    {
        $qr = "SELECT * FROM sinhvien";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getCaNhanClientById($id)
    {
        $qr = "SELECT * FROM sinhvien, lop WHERE sinhvien.MaLop = lop.MaLop AND sinhvien.maSV = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function updateCaNhanClient($maSV, $tenSV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $hinhAnh, $maLop)
    {

        // Có update hình ảnh
        if($hinhAnh != null){
            $qr = "UPDATE sinhvien SET tenSV = '$tenSV',
            ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', diaChi = '$diaChi',
            hinhAnh = '$hinhAnh', sdt ='$sdt', MaLop = '$maLop' WHERE maSV = '$maSV'";
        }
        else {
            $qr = "UPDATE sinhvien SET tenSV = '$tenSV',
            ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', diaChi = '$diaChi',
            sdt ='$sdt', MaLop = '$maLop' WHERE maSV = '$maSV'";
        }
        return mysqli_query($this->con, $qr);
    }

    public function checkEmail($email){
        $result = "SELECT * FROM sinhvien WHERE email = '$email'";
        return mysqli_query($this->con, $result);
    }

}
?>