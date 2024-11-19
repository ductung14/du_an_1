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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản khách hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <img src="<?= BASE_URL . $khachhang["anh_dai_dien"] ?>" alt="" style="width:100%"
            onerror="this.onerror=null; this.url='https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp'">
        </div>
        <div class="col-8">
          <div class="container">
            <table class="table table-boderless">
              <tbody>
                <tr>
                  <th>Họ tên:</th>
                  <th><?= $khachhang["ho_ten"] ?></th>
                </tr>
                <tr>
                  <th>Ngày sinh:</th>
                  <th><?= $khachhang["ngay_sinh"] ?></th>
                </tr>
                <tr>
                  <th>Email:</th>
                  <th><?= $khachhang["email"] ?></th>
                </tr>
                <tr>
                  <th>Số điện thoại:</th>
                  <th><?= $khachhang["so_dien_thoai"] ?></th>
                </tr>
                <tr>
                  <th>Giới tính:</th>
                  <th><?= $khachhang["gioi_tinh"] == 1 ? "Nam" : "Nữ" ?></th>
                </tr>
                <tr>
                  <th>Địa chỉ:</th>
                  <th><?= $khachhang["dia_chi"] ?></th>
                </tr>
                <tr>
                  <th>Trạng thái:</th>
                  <th><?= $khachhang["trang_thai"] == 1 ? "Active" : "Inactive" ?></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <h2>Lịch sử mua hàng</h2>
          <div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã Đơn Hàng </th>
                  <th>Tên Người Nhận </th>
                  <th>Số Điện Thoại </th>
                  <th>Ngày Đặt </th>
                  <th>Tổng Tiền </th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listdonhang as $key => $donhang): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $donhang["ma_don_hang"] ?></td>
                    <td><?= $donhang["ten_nguoi_nhan"] ?></td>
                    <td><?= $donhang["sdt_nguoi_nhan"] ?></td>
                    <td><?= $donhang["ngay_dat"] ?></td>
                    <td><?= $donhang["tong_tien"] ?></td>
                    <td><?= $donhang["trang_thai_id"] == 1 ? "Chưa Xác Nhận" : "Đã Xác Nhận" ?></td>
                    <td>
                      <a href="<?= BASE_URL_ADMIN . "?act=chi-tiet-don-hang&id_don_hang=" . $donhang["id"] ?>">
                        <button class="btn btn-primary">Chi Tiết</button>
                      </a>
                      <a href="<?= BASE_URL_ADMIN . "?act=form-sua-don-hang&id_don_hang=" . $donhang["id"] ?>">
                        <button class="btn btn-warning">Sửa</button>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <h2>Bình luận sản phẩm</h2>
          <div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Sản Phẩm</th>
                  <th>Nội Dung</th>
                  <th>Ngày Đăng</th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listbinhluan as $key => $binhluan): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhluan["san_pham_id"] ?>"><?= $binhluan["ten_san_pham"] ?></a></td>
                    <td><?= $binhluan["noi_dung"] ?></td>
                    <td><?= $binhluan["ngay_dang"] ?></td>
                    <td><?= $binhluan["trang_thai"] == 1 ? "Hiển Thị" : "Ẩn" ?></td>
                    <td>
                      <form method="post" action="<?= BASE_URL_ADMIN . "?act=update-trang-thai-binh-luan" ?>">
                        <input type="hidden" name="id_binh_luan" value="<?=$binhluan["id"]?>">
                        <input type="hidden" name="name_view" value="detail_khach">
                        <input type="hidden" name="id_khach_hang" value="<?=$binhluan["tai_khoan_id"]?>">
                        <button onclick="return confirm('Bạn có muốn ẩn bình luận này không?')" class="btn btn-danger">
                          <?=$binhluan["trang_thai"] == 1 ? "Ẩn" : "Hiện"?>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?
include "./views/layout/footer.php";
?>

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->
<script>
  // <![CDATA[  <-- For SVG support
  if ('WebSocket' in window) {
    (function() {
      function refreshCSS() {
        var sheets = [].slice.call(document.getElementsByTagName("link"));
        var head = document.getElementsByTagName("head")[0];
        for (var i = 0; i < sheets.length; ++i) {
          var elem = sheets[i];
          var parent = elem.parentElement || head;
          parent.removeChild(elem);
          var rel = elem.rel;
          if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
          }
          parent.appendChild(elem);
        }
      }
      var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
      var address = protocol + window.location.host + window.location.pathname + '/ws';
      var socket = new WebSocket(address);
      socket.onmessage = function(msg) {
        if (msg.data == 'reload') window.location.reload();
        else if (msg.data == 'refreshcss') refreshCSS();
      };
      if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
        console.log('Live reload enabled.');
        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
      }
    })();
  } else {
    console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
  }
  // ]]>
</script>
</body>

</html>