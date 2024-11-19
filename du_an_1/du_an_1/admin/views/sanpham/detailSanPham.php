<?
include "./views/layout/header.php";
?>

<!-- Navbar -->
<?
include "./views/layout/navbar.php";
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?
include "./views/layout/sidebar.php";
?>

<div class="content-wrapper">
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"></h3>
            <div class="col-12">
              <img src="<?= BASE_URL . $sanpham["hinh_anh"] ?>" class="product-image" alt="Product Image">
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">Tên Sản Phẩm: <?= $sanpham["ten_san_pham"] ?></h3>
            <h4 class="mt-3">Giá tiền: <small><?= $sanpham["gia_san_pham"] ?></small></h4>
            <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanpham["gia_khuyen_mai"] ?></small></h4>
            <h4 class="mt-3">Số lượng: <small><?= $sanpham["so_luong"] ?></small></h4>
            <h4 class="mt-3">Lượt xem: <small><?= $sanpham["luot_xem"] ?></small></h4>
            <h4 class="mt-3">Mô tả: <small><?= $sanpham["mo_ta"] ?></small></h4>
            <h4 class="mt-3">Trạng thái: <small><?= $sanpham["trang_thai"] == 1 ? "Còn hàng" : "Hết hàng" ?></small></h4>

            <div class="mt-4 product-share">
              <a href="#" class="text-gray">
                <i class="fab fa-facebook-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fab fa-twitter-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-envelope-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-rss-square fa-2x"></i>
              </a>
            </div>

          </div>
        </div>
        <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bình Luận Sản Phẩm</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên Người Bình Luận</th>
                  <th>Nội Dung</th>
                  <th>Ngày Đăng</th>
                  <th>Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>

</div>




<?
include "./views/layout/footer.php";
?>