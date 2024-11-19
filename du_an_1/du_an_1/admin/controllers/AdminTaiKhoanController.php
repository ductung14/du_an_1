<?
class AdminTaiKhoanController
{
  public $modelTaiKhoan;
  public $modelDonHang;
  public $modelSanPham;


  public function __construct()
  {
    $this->modelTaiKhoan = new AdminTaiKhoan();
    $this->modelDonHang = new AdminDonHang();
    $this->modelSanPham = new AdminProduct();
  }
  public function danhSachQuanTri()
  {
    $listquantri = $this->modelTaiKhoan->getAllTaiKhoan(1);
    require_once "./views/taikhoan/quantri/listQuanTri.php";
  }
  public function formAddQuanTri()
  {
    require_once "./views/taikhoan/quantri/addQuanTri.php";
  }
  public function postQuanTri()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $ho_ten = $_POST["ho_ten"];
      $email = $_POST["email"];
      $error = [];
      if (empty($ho_ten)) {
        $error["ho_ten"] = "Tên không được để trống";
      }
      if (empty($email)) {
        $error["email"] = "Email không được để trống";
      }

      if (empty($error)) {
        $password = password_hash("123456", PASSWORD_BCRYPT);
        $chuc_vu_id = 1;
        $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
        header("Location: " . BASE_URL_ADMIN . "?act=tai-khoan-quan-tri");
        exit();
      } else {
        require_once "./views/taikhoan/quantri/addQuanTri.php";
      }
    }
  }

  public function formEditQuanTri()
  {
    $id = $_GET["id_quan_tri"];
    $quan_tri = $this->modelTaiKhoan->getDetailTaiKhoan($id);
    require_once "./views/taikhoan/quantri/editQuanTri.php";
  }

  public function postEditQuanTri()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $id = $_POST["id"];

      $ho_ten = $_POST["ho_ten"];
      $email = $_POST["email"];
      $so_dien_thoai = $_POST["so_dien_thoai"];
      $trang_thai = $_POST["trang_thai"];

      $error = [];
      if (empty($ho_ten)) {
        $error["ho_ten"] = "Tên không được để trống";
      }
      if (empty($email)) {
        $error["email"] = "Email không được để trống";
      }
      if (empty($so_dien_thoai)) {
        $error["so_dien_thoai"] = "Số điện thoại không được để trống";
      }
      if (empty($trang_thai)) {
        $error["trang_thai"] = "Trạng thái phải chọn";
      }

      if (empty($error)) {
        $this->modelTaiKhoan->updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
        header(header: "Location: " . BASE_URL_ADMIN . "?act=tai-khoan-quan-tri");
        exit();
      } else {
        require_once "./views/taikhoan/quantri/editQuanTri.php&id_quan_tri" . $id;
      }
    }
  }

  public function resetPassWord()
  {
    $id = $_GET["id_tai_khoan"];
    $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
    $password = password_hash("123456", PASSWORD_BCRYPT);

    $status = $this->modelTaiKhoan->resetPassWord($id, $password);
    if ($status && $tai_khoan["chuc_vu_id"] == 1) {
      header(header: "Location: " . BASE_URL_ADMIN . "?act=tai-khoan-quan-tri");
      exit();
    } elseif ($status && $tai_khoan["chuc_vu_id"] == 2) {
      header(header: "Location: " . BASE_URL_ADMIN . "?act=tai-khoan-khach-hang");
      exit();
    } else {
      var_dump("Lỗi khi reset password");
    }
  }

  public function danhSachKhachHang()
  {
    $listkhachhang = $this->modelTaiKhoan->getAllTaiKhoan(2);
    require_once "./views/taikhoan/khachhang/listKhachHang.php";
  }

  public function formEditKhachHang()
  {
    $id = $_GET["id_khach_hang"];
    $khach_hang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
    require_once "./views/taikhoan/khachhang/editKhachHang.php";
  }
  public function postEditKhachHang()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $id = $_POST["id"];

      $ho_ten = $_POST["ho_ten"];
      $email = $_POST["email"];
      $ngay_sinh = $_POST["ngay_sinh"];
      $dia_chi = $_POST["dia_chi"];
      $gioi_tinh = $_POST["gioi_tinh"];
      $so_dien_thoai = $_POST["so_dien_thoai"];
      $trang_thai = $_POST["trang_thai"];

      $error = [];
      if (empty($ho_ten)) {
        $error["ho_ten"] = "Tên không được để trống";
      }
      if (empty($email)) {
        $error["email"] = "Email không được để trống";
      }
      if (empty($ngay_sinh)) {
        $error["ngay_sinh"] = "Ngày sinh không được để trống";
      }
      if (empty($gioi_tinh)) {
        $error["giơi_tinh"] = "Giới không được để trống";
      }
      if (empty($so_dien_thoai)) {
        $error["so_dien_thoai"] = "Số điện thoại không được để trống";
      }
      if (empty($trang_thai)) {
        $error["trang_thai"] = "Trạng thái phải chọn";
      }

      if (empty($error)) {
        $this->modelTaiKhoan->updateKhachHang($id, $ho_ten, $email, $ngay_sinh, $giơi_tinh,  $so_dien_thoai, $trang_thai);
        header(header: "Location: " . BASE_URL_ADMIN . "?act=tai-khoan-khach-hang");
        exit();
      } else {
        require_once "./views/taikhoan/khachhang/editKhachHang.php&id_khach_hang=" . $id;
      }
    }
  }

  public function detailKhachHang()
  {
    $id = $_GET["id_khach_hang"];
    $khachhang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
    $listdonhang = $this->modelDonHang->getDonHangFromKhachHang($id);
    $listbinhluan = $this->modelSanPham->getBinhLuanFromKhachHang($id);
    require_once "./views/taikhoan/khachhang/detailKhachHang.php";
  }

  public function formLogin()
  {
    require_once "./views/auth/formLogin.php";
  }

  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $email = $_POST["email"];
      $password = $_POST["password"];

      $user = $this->modelTaiKhoan->checkLogin($email, $password);
      if (is_array($user)) {
        $_SESSION["user_admin"] = $user;
        header("Location: " . BASE_URL_ADMIN);
        exit();
      } else {
        $_SESSION["error"] = $user;
        header("Location: " . BASE_URL_ADMIN . "?act=login-admin");
        exit();
      }
    }
  }

  public function logout()
  {
    header("Location: " . BASE_URL_ADMIN . "?act=login-admin");
    if (isset($_SESSION["user_admin"])) {
      unset($_SESSION["user_admin"]);
      unset($_SESSION["error"]);
      unset($_SESSION["success"]);
    }
  }

  public function formEditCaNhanQuanTri()
  {
    $email = $_SESSION["user_admin"]["email"];
    $thongtin = $this->modelTaiKhoan->getTaiKhoanForEmail($email);
    require_once "./views/taikhoan/canhan/editCaNhan.php";
    exit();
  }

  public function postEditMatKhauCaNhan()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $old_pass = $_POST["old_pass"];
      $new_pass = $_POST["new_pass"];
      $confirm_pass = $_POST["confirm_pass"];

      $user = $this->modelTaiKhoan->getTaiKhoanForEmail($_SESSION["user_admin"]["email"]);


      $checkPass = password_verify($old_pass, $user["mat_khau"]);

      // var_dump($checkPass);die();
      $error = [];

      if (!$checkPass) {
        $error["old_pass"] = "Mật khẩu người dùng không đúng";
      }
      if ($new_pass !== $confirm_pass) {
        $error["confirm_pass"] = "Mật khẩu nhập lại không đúng";
      }

      if (empty($old_pass)) {
        $error["old_pass"] = "Vui lòng nhập dữ liệu";
      }
      if (empty($new_pass)) {
        $error["new_pass"] = "Vui lòng nhập dữ liệu";
      }
      if (empty($confirm_pass)) {
        $error["confirm_pass"] = "Vui lòng nhập dữ liệu";
      }

      $_SESSION["error"] = $error;

      // var_dump($error);die();

      if (empty($error)) {
        $hash_pasword = password_hash($new_pass, PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassWord($user["id"], $hash_pasword);
        if ($status) {
          $_SESSION["success"] = "Đổi thông tin mật khẩu thành công";
          $_SESSION["flash"] = true;
          header("Location: " . BASE_URL_ADMIN . "?act=form-sua-thong-tin-ca-nhan-quan-tri");
        }
      } else {
        // var_dump("abc");die();
        $_SESSION["flash"] = true;
        unset($_SESSION["success"]);
        header("Location: " . BASE_URL_ADMIN . "?act=form-sua-thong-tin-ca-nhan-quan-tri");
        exit();
      }
    }
  }
}
