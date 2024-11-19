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
          <h1>Quản Lý Đơn Hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                      <td>
                        <? if ($donhang["trang_thai_id"] == 1) {
                          echo "Đã Thanh Toán";
                        } elseif ($donhang["trang_thai_id"] == 2) {
                          echo "Chưa Thanh Toán";
                        } elseif ($donhang["trang_thai_id"] == 3) {
                          echo "Chưa Xác Nhận";
                        } elseif ($donhang["trang_thai_id"] == 4) {
                          echo "Đã Xác Nhận";
                        } elseif ($donhang["trang_thai_id"] == 5) {
                          echo "Đang Chuẩn Bị Hàng";
                        } elseif ($donhang["trang_thai_id"] == 6) {
                          echo "Đang Giao";
                        } elseif ($donhang["trang_thai_id"] == 7) {
                          echo "Đã Giao";
                        } elseif ($donhang["trang_thai_id"] == 8) {
                          echo "Đã Nhận";
                        } elseif ($donhang["trang_thai_id"] == 9) {
                          echo "Thành Công";
                        } elseif ($donhang["trang_thai_id"] == 10) {
                          echo "Hoàn Hàng";
                        } else {
                          echo "Hủy Đơn";
                        }
                        ?>

                      </td>
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
                <tfoot>
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
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
  $(function () {
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
    (function () {
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
      socket.onmessage = function (msg) {
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