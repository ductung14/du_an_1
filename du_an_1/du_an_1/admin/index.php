<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once "./controllers/AdminDanhMucController.php";
require_once "./controllers/AdminProductController.php";
// Require toàn bộ file Models
require_once "./models/AdminDanhMuc.php";
require_once "./models/AdminProduct.php";

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  "danh-muc" => (new AdminDanhMucController()) -> danhsachDanhMuc(),
  "form-them-danh-muc" => (new AdminDanhMucController()) -> formAddDanhMuc(),
  "them-danh-muc" => (new AdminDanhMucController()) -> postDanhMuc(),
  "form-sua-danh-muc" => (new AdminDanhMucController()) -> formEditDanhMuc(),
  "sua-danh-muc" => (new AdminDanhMucController()) -> editDanhMuc(),
  "xoa-danh-muc" => (new AdminDanhMucController()) -> deleteDanhMuc(),

  "san-pham" => (new AdminProductController()) -> danhsachSanPham(),
  "form-them-san-pham" => (new AdminProductController()) -> formAddSanPham(),
  "them-san-pham" => (new AdminProductController()) -> postSanPham(),
  "form-sua-san-pham" => (new AdminProductController()) -> formEditSanPham(),
  "sua-san-pham" => (new AdminProductController()) -> editSanPham(),
  "xoa-san-pham" => (new AdminProductController()) -> deleteSanPham(),


};