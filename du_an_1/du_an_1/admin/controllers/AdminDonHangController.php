<?
class AdminDonHangController
{
  public $modelDonHang;
  public function __construct()
  {
    $this->modelDonHang = new AdminDonHang();

  }
  public function danhsachDonHang()
  {
    $listdonhang = $this->modelDonHang->getAllDonHang();
    require_once "./views/donhang/listDonHang.php";
    die();
  }
  public function formAddDonHang()
  {
    $listdanhmuc = $this->modelDanhMuc->getAllDanhMuc();
    require_once "./views/donhang/addDonHang.php";
  }
  public function postDonHang()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $ten_san_pham = $_POST["ten_san_pham"];
      $gia_san_pham = $_POST["gia_san_pham"];
      $gia_khuyen_mai = $_POST["gia_khuyen_mai"];
      $so_luong = $_POST["so_luong"];
      $trang_thai = $_POST["trang_thai"] ?? "";
      $danh_muc_id = $_POST["danh_muc_id"] ?? "";
      $mo_ta = $_POST["mo_ta"];
      $hinh_anh = $_FILES["hinh_anh"];

      $file_thumb = uploadFile($hinh_anh, "./uploads/");
      $error = [];
      if (empty($ten_san_pham)) {
        $error["ten_san_pham"] = "Tên sản phẩm không được để trống";
      }
      if (empty($gia_san_pham)) {
        $error["gia_san_pham"] = "Giá sản phẩm không được để trống";
      }
      if (empty($gia_khuyen_mai)) {
        $error["gia_khuyen_mai"] = "Giá khuyến mại không được để trống";
      }
      if (empty($so_luong)) {
        $error["so_luong"] = "Số lượng sản phẩm không được để trống";
      }
      if (empty($trang_thai)) {
        $error["trang_thai"] = "Trạng thái phải chọn";
      }
      if (empty($danh_muc_id)) {
        $error["danh_muc_id"] = "Danh mục phải chọn";
      }

      if (empty($error)) {
        $this->modelDonHang->insertDonHang($ten_san_pham, $gia_san_pham, $gia_khuyen_mai,$file_thumb, $so_luong,$mo_ta,$danh_muc_id, $trang_thai );
        header("Location: " . BASE_URL_ADMIN . "?act=san-pham");
        exit();
      } else {
        require_once "./views/DonHang/addDonHang.php";
      }
    }
  }

  public function formEditDonHang()
  {
    $id = $_GET["id_don_hang"];
    $donhang = $this->modelDonHang->getDetailDonHang($id);
    $listtrangthaidonhang = $this->modelDonHang->getAllTrangThaiDonHang();
    if ($donhang) {
      require_once "./views/donhang/editDonHang.php";
    } else {
      header("Location: " . BASE_URL_ADMIN . "?act=don-hang");
    }
  }
  public function editDonHang()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $id = $_POST["id"];

      $ten_nguoi_nhan = $_POST["ten_nguoi_nhan"];
      $email_nguoi_nhan = $_POST["email_nguoi_nhan"];
      $sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"];
      $dia_chi_nguoi_nhan = $_POST["dia_chi_nguoi_nhan"];
      $trang_thai_id = $_POST["trang_thai_id"];

      $ghi_chu = $_POST["ghi_chu"] ?? "";

      $error = [];
      if (empty($ten_nguoi_nhan)) {
        $error["ten_nguoi_nhan"] = "Tên người nhận không được để trống";
      }
      if (empty($email_nguoi_nhan)) {
        $error["email_nguoi_nhan"] = "Email người nhận không được để trống";
      }
      if (empty($sdt_nguoi_nhan)) {
        $error["sdt_nguoi_nhan"] = "Số điện thoại không được để trống";
      }
      if (empty($dia_chi_nguoi_nhan)) {
        $error["dia_chi_nguoi_nhan"] = "Địa chỉ không được để trống";
      }

      
      if (empty($error)) {
        $this->modelDonHang->updateDonHang($id,$ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan,$dia_chi_nguoi_nhan, $trang_thai_id,$ghi_chu);
        header("Location: ". BASE_URL_ADMIN ."?act=don-hang");
        exit();
      } else {
        require_once "./views/donhang/editDonHang.php";
      }
    }
  }


  public function detailDonHang()
  {
    $id = $_GET["id_don_hang"];
    $donhang = $this->modelDonHang->getDetailDonHang($id);
    $sanphamdonhang = $this->modelDonHang->getListSanPhamDonHang($id);
    $listtrangthaidonhang = $this->modelDonHang->getAllTrangThaiDonHang();
    require_once "./views/donhang/detailDonHang.php";
  }

}

?>