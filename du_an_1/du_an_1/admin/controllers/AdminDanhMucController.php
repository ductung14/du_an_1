<?
  class AdminDanhMucController{
    public $modelDanhMuc;
    public function __construct(){
      $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhsachDanhMuc(){
      $listdanhmuc = $this ->modelDanhMuc-> getAllDanhMuc();
      require_once "./views/danhmuc/listDanhMuc.php";
      die();
    }
    public function formAddDanhMuc(){
      require_once "./views/danhmuc/addDanhMuc.php";
    }
    public function postDanhMuc(){
      if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $ten_danh_muc = $_POST["ten_danh_muc"];
        $mo_ta = $_POST["mo_ta"];
        $error = [];
        if(empty($ten_danh_muc)){
          $error["ten_danh_muc"] = "Tên danh mục không được để trống";
        }

        if(empty($error)){
          $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
          header("Location: " . BASE_URL_ADMIN . "?act=danh-muc");
          exit();
        }
        else{
          require_once "./views/danhmuc/addDanhMuc.php";
        }
      }
    }

    public function formEditDanhMuc(){
      $id = $_GET["id_danh_muc"];
      $danhmuc = $this->modelDanhMuc->getOneDanhMuc($id);
      if($danhmuc){
        require_once "./views/danhmuc/editDanhMuc.php";
      }
      else{
        header("Location: " . BASE_URL_ADMIN . "?act=danh-muc");
      }
    }
    public function editDanhMuc(){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id"];
        $ten_danh_muc = $_POST["ten_danh_muc"];
        $mo_ta = $_POST["mo_ta"];
        $error = [];
        if(empty($ten_danh_muc)){
          $error["ten_danh_muc"] = "Tên danh mục không được để trống";
        }
        if(empty($error)){
          $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
          header("Location: ". BASE_URL_ADMIN . "?act=danh-muc");
          exit();
        }
        else{
          $danhmuc = ["id" => $id, "ten_danh_muc" => $ten_danh_muc, "mo_ta" => $mo_ta];
          require_once "./views/danhmuc/editDanhMuc.php";
        }
      }
    }

    public function deleteDanhMuc(){
      $id = $_GET["id_danh_muc"];
      $danhmuc = $this->modelDanhMuc->getOneDanhMuc($id);
      if($danhmuc){
        $this->modelDanhMuc->deleteDanhMuc($id);
        header("Location: ". BASE_URL_ADMIN . "?act=danh-muc");
      }
      else{
        header("Location: ". BASE_URL_ADMIN . "?act=danh-muc");
      }
    }
  }

?>