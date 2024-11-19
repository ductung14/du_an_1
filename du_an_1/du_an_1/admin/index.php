<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once "./controllers/AdminDanhMucController.php";
require_once "./controllers/AdminDonHangController.php";
require_once "./controllers/AdminProductController.php";
require_once "./controllers/AdminTaiKhoanController.php";
// Require toàn bộ file Models
require_once "./models/AdminDanhMuc.php";
require_once "./models/AdminDonHang.php";
require_once "./models/AdminProduct.php";
require_once "./models/AdminTaiKhoan.php";

// Route
$act = $_GET['act'] ?? '/';

if($act !== "login-admin" && $act !== "logout-admin" && $act !== "check-login-admin"){
  checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  "/" => (new AdminProductController()) -> home(),

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
  "chi-tiet-san-pham" => (new AdminProductController()) -> detailSanPham(),

  "don-hang" => (new AdminDonHangController()) -> danhsachDonHang(),
  "form-sua-don-hang" => (new AdminDonHangController()) -> formEditDonHang(),
  "sua-don-hang" => (new AdminDonHangController()) -> editDonHang(),
  "chi-tiet-don-hang" => (new AdminDonHangController()) -> detailDonHang(),

  "tai-khoan-quan-tri" => (new AdminTaiKhoanController()) -> danhSachQuanTri(),
  "form-them-quan-tri" => (new AdminTaiKhoanController()) -> formAddQuanTri(),
  "them-quan-tri" => (new AdminTaiKhoanController()) -> postQuanTri(),
  "form-sua-quan-tri" => (new AdminTaiKhoanController()) -> formEditQuanTri(),
  "sua-quan-tri" => (new AdminTaiKhoanController()) -> postEditQuanTri(),


  "reset-password" => (new AdminTaiKhoanController()) -> resetPassWord(),

  "tai-khoan-khach-hang" => (new AdminTaiKhoanController()) -> danhSachKhachHang(),
  "form-sua-khach-hang" => (new AdminTaiKhoanController()) -> formEditKhachHang(),
  "sua-khach-hang" => (new AdminTaiKhoanController()) -> postEditKhachHang(),
  "chi-tiet-khach-hang" => (new AdminTaiKhoanController()) -> detailKhachHang(),

  "update-trang-thai-binh-luan" => (new AdminProductController()) -> updateTrangThaiBinhLuan(),

  "form-sua-thong-tin-ca-nhan-quan-tri" => (new AdminTaiKhoanController()) -> formEditCaNhanQuanTri(),
  // "sua-thong-tin-ca-nhan-quan-tri" => (new AdminTaiKhoanController()) -> postEditCaNhanQuanTri(),

  "sua-mat-khau-ca-nhan-quan-tri" => (new AdminTaiKhoanController()) -> postEditMatKhauCaNhan(),


  "login-admin" => (new AdminTaiKhoanController()) -> formLogin(),
  "check-login-admin" => (new AdminTaiKhoanController()) -> login(),
  "logout-admin" => (new AdminTaiKhoanController()) -> logout(),
};