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
  }
?>