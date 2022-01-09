<?php
class SinhVienModel extends DataBase {
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

    public function getMaMax()
    {
        $qr = "SELECT maSV FROM sinhvien ORDER BY maSV DESC LIMIT 0,1";
        $row = mysqli_query($this->con, $qr);
        $result = mysqli_fetch_array($row);
        return $result['maSV'];
    }

    public function getSinhVienById($id)
    {
        $qr = "SELECT * FROM sinhvien, lop WHERE sinhvien.MaLop = lop.MaLop AND sinhvien.maSV = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($masv, $tensv, $gioitinh, $ngaysinh, $diachi, $email, $password, $sdt, $hinhanh, $lop)
    {
        $qr = "INSERT INTO sinhvien VALUES ('" . $masv . "', '" . $tensv . "','" . $gioitinh . "', '" . $ngaysinh . "', '" . $diachi . "','" . $email . "','" . $password . "', '" . $sdt . "', '" . $hinhanh .  "', '" . $lop . "')";
        return mysqli_query($this->con, $qr);
    }

    public function delete($masv) {
        $qr = "DELETE FROM sinhvien WHERE maSV = '$masv'";
        return mysqli_query($this->con, $qr);
    }

    public function update($maSV, $tenSV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $hinhAnh, $lop)
    {
        // Có update hình ảnh
        if($hinhAnh != null){
            $qr = "UPDATE nhanvien SET tenSV = '$tenSV',
            ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', diaChi = '$diaChi',
            hinhAnh = '$hinhAnh', sdt ='$sdt', MaLop = '$lop' WHERE maSV = '$maSV'";
        }
        else {
            $qr = "UPDATE nhanvien SET tenSV = '$tenSV',
            ngaySinh = '$ngaySinh', gioiTinh = '$gioiTinh', diaChi = '$diaChi',
            sdt ='$sdt', MaLop = '$lop' WHERE maSV = '$maSV'";
        }
        return mysqli_query($this->con, $qr);
    }

    public function doiMK($maSV, $matKhauMoi) {
        $qr = "UPDATE sinhvien SET password = '$matKhauMoi' WHERE maSV = '$maSV'";
        return mysqli_query($this->con, $qr);
    }

    public function TimKiem($maSV, $tenSV, $gioiTinh, $maLop)
    {
        // Query mặc định khi chưa truyền tham số tìm kiếm nào
        $qr = "select sv.*, lp.TenLop from sinhvien sv, lop lp
				where sv.MaLop = lp.MaLop";
        
        // Có tìm mã
        if($maSV != "") {
            $qr .= " and sv.maSV LIKE '%$maSV%'";
        }
        if($tenSV != "") {
            $qr .= " and sv.tenSV LIKE '%$tenSV%'";
        }
        if($gioiTinh != "") {
            $qr .= " and sv.gioiTinh = '$gioiTinh'";
        }
        if($maLop != "") {
            $qr .= " and sv.MaLop = '$maLop'";
        }
        $qr .= " ORDER BY sv.maSV ";

        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function checkEmail($email){
        $result = "SELECT * FROM sinhvien WHERE email = '$email'";
        return mysqli_query($this->con, $result);
    }

}
?>