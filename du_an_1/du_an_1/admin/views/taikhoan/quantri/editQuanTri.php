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
          <h1>Quản lý quản trị viên</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa quản trị viên</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?= BASE_URL_ADMIN . "?act=sua-quan-tri" ?>" method="POST">
    <input type="text" name="id" value="<?= $quan_tri["id"] ?>" hidden>
      <div class="card-body">
        <div class="form-group">
          <label>Họ tên</label>
          <input type="text" class="form-control" name="ho_ten" value="<?=$quan_tri["ho_ten"]?>" placeholder="Nhập họ tên">
          <?if(isset($error["ho_ten"] )){?>
            <p class="text-danger"><?=$error["ho_ten"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" name="email" value="<?=$quan_tri["email"]?>" placeholder="Nhập email">
          <?if(isset($error["email"] )){?>
            <p class="text-danger"><?=$error["email"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" class="form-control" name="so_dien_thoai" value="<?=$quan_tri["so_dien_thoai"]?>" placeholder="Nhập sô điện thoại">
          <?if(isset($error["so_dien_thoai"] )){?>
            <p class="text-danger"><?=$error["so_dien_thoai"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Trạng thái</label>
          <select class="form-control" name="trang_thai">
            <option value="1">
              <? $quan_tri["trang_thai"] == 1 ? "selected" : "" ?>
              Active
            </option>
            <option value="2">
            <? $quan_tri["trang_thai"] !== 1 ? "selected" : "" ?>
              Inactive
            </option>
          </select>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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