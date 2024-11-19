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
        <div class="col-sm-10">
          <h1>Quản lý đơn hàng - Đơn Hàng: <?= $donhang["ma_don_hang"] ?></h1>
        </div>
        <div class="col-sm-2">
          <form action="" method="post">
            <select name="" id="">
              <? foreach ($listtrangthaidonhang as $key => $trangthai) : ?>
                <option
                  <?= $trangthai["id"] == $donhang["trang_thai_id"] ? 'selected' : "" ?>
                  <?= $trangthai["id"] < $donhang["trang_thai_id"] ? 'disabled' : "" ?>
                  value="<?= $trangthai["id"] ?>"><?= $trangthai["ten_trang_thai"] ?>
                </option>
              <? endforeach ?>
            </select>
          </form>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?
          if ($donhang["trang_thai_id"] == 1) {
            $colorAlert = "primary";
          } elseif ($donhang["trang_thai_id"] == 10) {
            $colorAlert = "success";
          } elseif ($donhang["trang_thai_id"] == 11) {
            $colorAlert = "danger";
          } else {
            $colorAlert = "warning";
          }
          ?>
          <div class="alert alert-<?= $colorAlert ?>" role="alert">
            Đơn Hàng: <?= $donhang["ten_trang_thai"] ?>
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Cửa Hàng Đồ Da Dụng
                  <small class="float-right">Ngày đặt:
                    <?=
                    formatFate($donhang["ngay_dat"])
                    ?>
                  </small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Thông tin người đặt:
                <address>
                  <strong><?= $donhang["ho_ten"] ?></strong><br>
                  <?= $donhang["dia_chi"] ?><br>
                  Phone: <?= $donhang["so_dien_thoai"] ?><br>
                  Email: <?= $donhang["email"] ?>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Người nhặn:
                <address>
                  <strong><?= $donhang["ten_nguoi_nhan"] ?></strong><br>
                  <?= $donhang["dia_chi_nguoi_nhan"] ?><br>
                  Phone: <?= $donhang["sdt_nguoi_nhan"] ?><br>
                  Email: <?= $donhang["email_nguoi_nhan"] ?>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Thông tin:
                <address>
                  <strong>Mã đơn hàng: <?= $donhang["ma_don_hang"] ?></strong><br>
                  Tông tiền: <?= $donhang["tong_tien"] ?><br>
                  Ghi chú: <?= $donhang["ghi_chu"] ?><br>
                  Phương Thức Thanh Toán: <?= $donhang["ten_phuong_thuc"] ?>
                </address>
              </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Đơn Giá</th>
                      <th>Số Lượng</th>
                      <th>Thành Tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <? $tong_tien = 0 ?>
                    <?
                    foreach ($sanphamdonhang as $key => $sanpham):
                    ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $sanpham["ten_san_pham"] ?></td>
                        <td><?= $sanpham["don_gia"] ?></td>
                        <td><?= $sanpham["so_luong"] ?></td>
                        <td><?= $sanpham["thanh_tien"] ?></td>
                      </tr>
                      <? $tong_tien += $sanpham["thanh_tien"] ?>
                    <? endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Ngày Đặt Hàng:
                  <?=
                  formatFate($donhang["ngay_dat"])
                  ?>
                </p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Thành Tiền:</th>
                      <td>
                        <? echo $tong_tien  ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Vận Chuyển:</th>
                      <td>100</td>
                    </tr>
                    <tr>
                      <th>Tông Tiền:</th>
                      <td><?= $tong_tien + 100 ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
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