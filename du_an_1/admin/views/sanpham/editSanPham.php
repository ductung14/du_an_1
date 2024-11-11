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
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Sửa sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="<?= BASE_URL_ADMIN . "?act=sua-san-pham" ?>" enctype="multipart/form-data">
      <input type="text" name="id" value="<?= $sanpham["id"] ?>" hidden>
      <div class="card-body">
      <div class="form-group">
          <label>Tên sản phẩm</label>
          <input type="text" class="form-control" name="ten_san_pham" value="<?= $sanpham["ten_san_pham"] ?>" placeholder="Nhập tên sản phẩm">
          <?if(isset($error["ten_san_pham"] )){?>
            <p class="text-danger"><?=$error["ten_san_pham"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Giá sản phẩm</label>
          <input type="number" class="form-control" name="gia_san_pham" value="<?= $sanpham["gia_san_pham"] ?>" placeholder="Nhập giá sản phẩm">
          <?if(isset($error["gia_san_pham"] )){?>
            <p class="text-danger"><?=$error["gia_san_pham"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Giá khuyến mãi</label>
          <input type="number" class="form-control" name="gia_khuyen_mai" value="<?= $sanpham["gia_khuyen_mai"] ?>" placeholder="Nhập giá khuyến mãi">
          <?if(isset($error["gia_khuyen_mai"] )){?>
            <p class="text-danger"><?=$error["gia_khuyen_mai"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Hình ảnh</label><br>
          <img src="./.<?= $sanpham["hinh_anh"] ?>" style="width: 100px" alt="">
          <input type="file" class="form-control" name="hinh_anh" placeholder="Nhập hình ảnh">
          <?if(isset($error["hinh_anh"] )){?>
            <p class="text-danger"><?=$error["hinh_anh"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Số lượng</label>
          <input type="text" class="form-control" name="so_luong" value="<?= $sanpham["so_luong"] ?>" placeholder="Nhập số lượng">
          <?if(isset($error["so_luong"] )){?>
            <p class="text-danger"><?=$error["so_luong"]?></p>
          <?}?>
        </div>

        <div class="form-group">
          <label>Danh mục</label>
          <select class="form-control" id="" name="danh_muc_id">
            <? foreach($listdanhmuc as $danhmuc):?>
              <option value="<?=$danhmuc["id"]?>"><?=$danhmuc["ten_danh_muc"];?></option>
            <? endforeach?>
          </select>
        </div>

        <div class="form-group">
          <label>Trạng thái</label>
          <select class="form-control" id="" name="trang_thai">
            <option value="1">Còn hàng</option>
            <option value="2">Hết hàng</option>
          </select>
        </div>

        <div class="form-group">
          <label>Mô tả</label>
          <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"><?= $sanpham["mo_ta"] ?></textarea>
        </div>


        <div class="card-footer">
          <button type="submit" class="btn btn-primary" >Submit</button>
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