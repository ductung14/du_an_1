
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
          <h1>Quản lý sản phẩm</h1>
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
              <a href="<?= BASE_URL_ADMIN . "?act=form-them-san-pham" ?>">
                <button class="btn btn-success">Thêm Sản Phẩm</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm </th>
                    <th>Ảnh </th>
                    <th>Giá </th>
                    <th>Số Lượng </th>
                    <th>Danh Mục </th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($listsanpham as $key => $sanpham):?>
                    <tr>
                      <td><?=$key + 1?></td>
                      <td><?=$sanpham["ten_san_pham"]?></td>
                      <td>
                        <img src="<?= BASE_URL . $sanpham["hinh_anh"]?>" alt="" style="width:100px; heigth:100px;" onerror="this.onerror=null; this.url='https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp'">
                      </td>
                      <td><?=$sanpham["gia_san_pham"]?></td>
                      <td><?=$sanpham["so_luong"]?></td>
                      <td><?=$sanpham["ten_danh_muc"]?></td>
                      <td><?=$sanpham["trang_thai"] == 1 ? "Còn hàng" : "Hết hàng"?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . "?act=chi-tiet-san-pham&id_san_pham=" . $sanpham["id"] ?>">
                          <button class="btn btn-primary">Chi Tiết</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . "?act=form-sua-san-pham&id_san_pham=" . $sanpham["id"] ?>">
                          <button class="btn btn-warning">Sửa</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . "?act=xoa-san-pham&id_san_pham=" . $sanpham["id"] ?>"
                          onclick="return confirm('Bạn có đồng ý xoá không?')">
                          <button class="btn btn-danger">Xoá</button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm </th>
                    <th>Ảnh </th>
                    <th>Giá </th>
                    <th>Số Lượng </th>
                    <th>Danh Mục </th>
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