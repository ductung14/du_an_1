<?
  class AdminProduct{
    public $conn;
    public function __construct(){
      $this->conn = connectDB();
    }
    public function getAllSanPham() {
      try {
        $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $hinh_anh, $so_luong, $mo_ta, $danh_muc_id, $trang_thai) {
      try {
        $sql = "INSERT INTO san_phams(ten_san_pham, gia_san_pham, gia_khuyen_mai, hinh_anh, so_luong, mo_ta, danh_muc_id, trang_thai) VALUES (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :hinh_anh, :so_luong, :mo_ta, :danh_muc_id, :trang_thai)";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
          ":ten_san_pham" => $ten_san_pham,
          ":gia_san_pham" => $gia_san_pham,
          ":gia_khuyen_mai" => $gia_khuyen_mai,
          ":hinh_anh" => $hinh_anh, 
          ":so_luong" =>$so_luong,
          ":mo_ta" => $mo_ta, 
          ":danh_muc_id" => $danh_muc_id, 
          ":trang_thai" => $trang_thai
        ]);
        return true;
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function getOneSanPham($id) {
      try {
        $sql = "SELECT * FROM san_phams WHERE id= :id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
          ":id" => $id
        ]);
        return $stmt->fetch();
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function updateSanPham($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $new_file, $so_luong, $mo_ta, $danh_muc_id, $trang_thai) {
      try {
        $sql = "UPDATE san_phams SET ten_san_pham = :ten_san_pham, gia_san_pham = :gia_san_pham, gia_khuyen_mai = :gia_khuyen_mai, hinh_anh = :hinh_anh, so_luong = :so_luong, mo_ta = :mo_ta, danh_muc_id = :danh_muc_id, trang_thai = :trang_thai WHERE id = :id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
          ":ten_san_pham" => $ten_san_pham,
          ":gia_san_pham" => $gia_san_pham,
          ":gia_khuyen_mai" => $gia_khuyen_mai,
          ":hinh_anh" => $new_file, 
          ":so_luong" =>$so_luong,
          ":mo_ta" => $mo_ta, 
          ":danh_muc_id" =>$danh_muc_id, 
          ":trang_thai" => $trang_thai,
          ":id" => $id
        ]);
        return true;
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function deleteSanPham($id) {
      try {
        $sql = "DELETE FROM san_phams WHERE id = :id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
          ":id" => $id
        ]);
        return true;
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function getBinhLuanFromKhachHang($id){
      try {
        $sql = "SELECT binh_luans.*, san_phams.ten_san_pham FROM binh_luans INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
        WHERE binh_luans.tai_khoan_id = :id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([":id" => $id]);
        return $stmt->fetchAll();
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function getDetailBinhLuan($id) {
      try {
        $sql = "SELECT * FROM binh_luans WHERE id= :id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
          ":id" => $id
        ]);
        return $stmt->fetch();
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }

    public function updateTrangThaiBinhLuan($id, $trang_thai_update){
      try {
        $sql = "UPDATE binh_luans SET trang_thai = :trang_thai WHERE id = :id";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
          ":trang_thai" => $trang_thai_update,
          ":id" => $id
        ]);
        return true;
      } catch (\Throwable $e) {
        echo "Lỗi" . $e->getMessage();
      }
    }
  }
?>