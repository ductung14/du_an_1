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
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản khách hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container">
    <div class="row">
      <!-- left column -->

      <div class="col-md-3">
        <div class="text-center">
          <img src="<?= $thongtin["anh_dai_dien"] ?>" style="width: 100px" class="avatar img-circle" alt="avatar">
          <h6 class="mt-2">Họ tên: <?= $thongtin["ho_ten"] ?></h6>

        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-8 personal-info">
        <form action="<?= BASE_URL_ADMIN . "?act=sua-thong-tin-ca-nhan-quan-tri" ?>" method="post">
          <hr>
          <h3>Thông tin cá nhân</h3>

          <div class="form-group">
            <label class="col-lg-3 control-label">Họ tên:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="Jane">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="Bishop">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-12">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp;
                    Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="Save Changes">
          </div>
        </form>
        <hr>
        <h3>Đổi mật khẩu</h3>
        <? if (isset($_SESSION["success"])) { ?>
          <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>
            <i class="fa fa-coffee"></i>
            <?= $_SESSION["success"] ?>
          </div>
        <? } ?>
        <form action="<?= BASE_URL_ADMIN . "?act=sua-mat-khau-ca-nhan-quan-tri" ?>" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu cũ</label>
            <div class="col-md-12">
              <input class="form-control" type="password" name="old_pass" value="">
              <? if (isset($_SESSION["error"]["old_pass"])) { ?>
                <p class="text-danger"><?= $_SESSION["error"]["old_pass"] ?></p>
              <? } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu mới</label>
            <div class="col-md-12">
              <input class="form-control" type="password" name="new_pass" value="">
              <? if (isset($_SESSION["error"]["new_pass"])) { ?>
                <p class="text-danger"><?= $_SESSION["error"]["new_pass"] ?></p>
              <? } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Xác nhận mật khẩu</label>
            <div class="col-md-12">
              <input class="form-control" type="password" name="confirm_pass" value="">
              <? if (isset($_SESSION["error"]["confirm_pass"])) { ?>
                <p class="text-danger"><?= $_SESSION["error"]["confirm_pass"] ?></p>
              <? } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-12">
              <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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