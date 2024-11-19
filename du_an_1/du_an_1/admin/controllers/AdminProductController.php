<?
class AdminProductController
{
  public $modelSanPham;
  public $modelDanhMuc;
  public function __construct()
  {
    $this->modelSanPham = new AdminProduct();
    $this->modelDanhMuc = new AdminDanhMuc();

  }
  public function danhsachSanPham()
  {
    $listsanpham = $this->modelSanPham->getAllSanPham();
    require_once "./views/sanpham/listSanPham.php";
    die();
  }
  public function formAddSanPham()
  {
    $listdanhmuc = $this->modelDanhMuc->getAllDanhMuc();
    require_once "./views/sanpham/addSanPham.php";
  }
  public function postSanPham()
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
        $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai,$file_thumb, $so_luong,$mo_ta,$danh_muc_id, $trang_thai );
        header("Location: " . BASE_URL_ADMIN . "?act=san-pham");
        exit();
      } else {
        require_once "./views/sanpham/addSanPham.php";
      }
    }
  }

  public function formEditSanPham()
  {
    $listdanhmuc = $this->modelDanhMuc->getAllDanhMuc();
    $id = $_GET["id_san_pham"];
    $sanpham = $this->modelSanPham->getOneSanPham($id);
    if ($sanpham) {
      require_once "./views/sanpham/editSanPham.php";
    } else {
      header("Location: " . BASE_URL_ADMIN . "?act=san-pham");
    }
  }
  public function editSanPham()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $id = $_POST["id"];

      $sanphamOld = $this->modelSanPham->getOneSanPham($id);
      $old_file = $sanphamOld["hinh_anh"];

      $ten_san_pham = $_POST["ten_san_pham"];
      $gia_san_pham = $_POST["gia_san_pham"];
      $gia_khuyen_mai = $_POST["gia_khuyen_mai"];
      $so_luong = $_POST["so_luong"];
      $trang_thai = $_POST["trang_thai"] ?? "";
      $danh_muc_id = $_POST["danh_muc_id"] ?? "";
      $mo_ta = $_POST["mo_ta"];
      $hinh_anh = $_FILES["hinh_anh"] ?? null;

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

      
      if(isset($hinh_anh) && $hinh_anh["error"] == UPLOAD_ERR_OK){
        $new_file = uploadFile($hinh_anh, "./uploads/");

        if(!empty($old_file)){
          deleteFile($old_file);
        }
      }
      else{
        $new_file = $old_file ;
      }


      
      if (empty($error)) {
        $this->modelSanPham->updateSanPham($id,$ten_san_pham, $gia_san_pham, $gia_khuyen_mai,$new_file, $so_luong,$mo_ta,$danh_muc_id, $trang_thai );
        header("Location: ". BASE_URL_ADMIN ."?act=san-pham");
        exit();
      } else {
        require_once "./views/sanpham/editSanPham.php";
      }
    }
  }

  public function deleteSanPham()
  {
    $id = $_GET["id_san_pham"];
    $sanpham = $this->modelSanPham->getOneSanPham($id);
    if ($sanpham) {
      $this->modelSanPham->deleteSanPham($id);
      header("Location: " . BASE_URL_ADMIN . "?act=san-pham");
    } else {
      header("Location: " . BASE_URL_ADMIN . "?act=san-pham");
    }
  }

  public function detailSanPham()
  {
    $id = $_GET["id_san_pham"];
    $listdanhmuc = $this->modelDanhMuc->getAllDanhMuc();
    $sanpham = $this->modelSanPham->getOneSanPham($id);
    if ($sanpham) {
      require_once "./views/sanpham/detailSanPham.php";
    } else {
      header("Location: " . BASE_URL_ADMIN . "?act=san-pham");
    }
  }

  public function updateTrangThaiBinhLuan(){
    $id = $_POST["id_binh_luan"];
    $name_view = $_POST["name_view"];
    $id_khach_hang = $_POST["id_khach_hang"];
    $binhluan = $this->modelSanPham->getDetailBinhLuan($id);

    if($binhluan){
      $trang_thai_update="";
      if($binhluan["trang_thai"] == 1){
        $trang_thai_update = 2;
      }
      else{
        $trang_thai_update = 1;
      }
      $status = $this->modelSanPham->updateTrangThaiBinhLuan($id, $trang_thai_update);
      if($status){
        if($name_view == "detail_khach"){
          header("Location: " . BASE_URL_ADMIN . "?act=chi-tiet-khach-hang&id_khach_hang=" . $id_khach_hang);
        }
      }
    }
  }

  public function home(){
    require_once "./views/home.php";
  }
}

?>