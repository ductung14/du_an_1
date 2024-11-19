<?
class AdminTaiKhoan
{
  public $conn;
  public function __construct()
  {
    $this->conn = connectDB();
  }
  public function getAllTaiKhoan($chuc_vu_id)
  {
    try {
      $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(
        [
          ":chuc_vu_id" => $chuc_vu_id
        ]
      );
      return $stmt->fetchAll();
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
  {
    try {
      $sql = "INSERT INTO tai_khoans(ho_ten, email, mat_khau, chuc_vu_id) VALUES (:ho_ten, :email, :password, :chuc_vu_id)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ":ho_ten" => $ho_ten,
        ":email" => $email,
        ":password" => $password,
        "chuc_vu_id" => $chuc_vu_id
      ]);
      return true;
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function getDetailTaiKhoan($id)
  {
    try {
      $sql = "SELECT * FROM tai_khoans WHERE id= :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ":id" => $id
      ]);
      return $stmt->fetch();
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai)
  {
    try {
      $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten, email = :email, so_dien_thoai = :so_dien_thoai, trang_thai = :trang_thai WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ":ho_ten" => $ho_ten,
        ":email" => $email,
        ":so_dien_thoai" => $so_dien_thoai,
        ":trang_thai" => $trang_thai,
        ":id" => $id
      ]);
      return true;
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function resetPassWord($id, $password)
  {
    try {
      $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ":mat_khau" => $password,
        ":id" => $id
      ]);
      return true;
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function updateKhachHang($id, $ho_ten, $email, $ngay_sinh, $giơi_tinh, $so_dien_thoai, $trang_thai)
  {
    try {
      $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten, email = :email, ngay_sinh = :ngay_sinh, giơi_tinh = :giơi_tinh, so_dien_thoai = :so_dien_thoai, trang_thai = :trang_thai WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ":ho_ten" => $ho_ten,
        ":email" => $email,
        ":ngay_sinh" => $ngay_sinh,
        ":giơi_tinh" => $giơi_tinh,
        ":so_dien_thoai" => $so_dien_thoai,
        ":trang_thai" => $trang_thai,
        ":id" => $id
      ]);
      return true;
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function checkLogin($email, $password)
  {
    try {
      $sql = "SELECT * FROM tai_khoans WHERE email=:email";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["email" => $email]);
      $user = $stmt->fetch();

      if ($user && password_verify($password, $user["mat_khau"])) {
        if ($user["chuc_vu_id"] == 1) {
          if ($user["trang_thai"] == 1) {
            return $user;
          } else {
            return "Tài khoản bị cấm";
          }
        } else {
          return "Không đủ quyền đăng nhập";
        }
      } else {
        return " Sai email hoặc mật khẩu";
      }
    } catch (\Throwable $th) {
      //throw $th;
      return false;
    }
  }

  public function getTaiKhoanForEmail($email)
  {
    try {
      $sql = "SELECT * FROM tai_khoans WHERE email= :email";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ":email" => $email
      ]);
      return $stmt->fetch();
    } catch (\Throwable $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
}
