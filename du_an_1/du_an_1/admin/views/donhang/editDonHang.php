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
          <h1>Chỉnh Sửa Thông Tin Đơn Hàng: <?=$donhang["ma_don_hang"]?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa đơn hàng</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="<?= BASE_URL_ADMIN . "?act=sua-don-hang" ?>" >
      <input type="text" name="id" value="<?= $donhang["id"] ?>" hidden>
      <div class="card-body">
        <div class="form-group">
          <label>Tên người nhận</label>
          <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donhang["ten_nguoi_nhan"] ?>" placeholder="Nhập tên người nhận">
        </div>
        <div class="form-group">
          <label>Email người nhận</label>
          <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $donhang["email_nguoi_nhan"] ?>" placeholder="Nhập email người nhận">
        </div>
        <div class="form-group">
          <label>Số điện thoại người nhận</label>
          <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donhang["sdt_nguoi_nhan"] ?>" placeholder="Nhập SĐT người nhận">
        </div>
        <div class="form-group">
          <label>Địa chỉ người nhận</label>
          <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donhang["dia_chi_nguoi_nhan"] ?>" placeholder="Nhập đại chỉ người nhận">
        </div>

        <div class="form-group">
          <label>Trạng thái đơn hàng</label>
          <select class="form-control" name="trang_thai_id">
            <? foreach($listtrangthaidonhang as $trangthai):?>
              <option
                <?
                  if ($donhang["trang_thai_id"] > $trangthai["id"] || $donhang["trang_thai_id"] == 9 || $donhang["trang_thai_id"] == 10 || $donhang["trang_thai_id"] == 11)
                  {}
                ?>
                <?= $trangthai["id"] == $donhang["trang_thai_id"] ? 'selected' : ""?>
                value="<?=$trangthai["id"]?>"><?=$trangthai["ten_trang_thai"];?>
              </option>
            <? endforeach?>
          </select>
        </div>

        <div class="form-group">
          <label>Ghi chú</label>
          <textarea name="ghi_chu" id="" class="form-control" placeholder="Nhập ghi chú"><?= $donhang["ghi_chu"] ?></textarea>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" >Update</button>
        </div>
    </form>
  </div>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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