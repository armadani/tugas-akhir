<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Pemesanan Produk Medan Exchange</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/datatables/dataTables.bootstrap.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?page=home">Admin Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?page=Admin">Admin</a></li>
            <li><a href="?page=Karyawan">Karyawan</a></li> 
            <li><a href="?page=Produk">Produk</a></li>
            <li><a href="?page=Pesanan">Pemesanan</a></li>
            
            
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?page=Transaksi">Transaksi Pemesanan</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?page=LaporanDataPesanan" target="_blank">Laporan Data Pesanan</a></li>
            <li><a href="?page=LaporanDataProduk" target="_blank">Laporan Data Produk</a></li> 
            <li><a href="?page=LaporanDataTransaksi" target="_blank">Laporan Data Transaksi</a></li> 
            
          </ul>
        </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">
          <?php  
            session_start();
            echo $_SESSION['Nama'];
          ?>
          Logout</a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div class="container">
		
    <?php 
      include "koneksi.php";
      include "content.php"; 
    ?>

	</div>

</body>
</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  $(function(){
    $("#dtTable").dataTable();
  });
</script>

<script type="text/javascript">
  $(function(){
    $("#dtTable2").dataTable();
  });
</script>

<!-- Memilih Data Pelanggan dari Modal Pelanggan -->
<script type="text/javascript">
  $(document).on('click', '.pilih-pelanggan', function(){
    document.getElementById('id_pelanggan').value = $(this).attr('data-idPelanggan');
    $('#modalPelanggan').modal('hide');
  });
</script>

<!-- Memilih Data Paket dan Harga dari Modal Paket -->
<script type="text/javascript">
  $(document).on('click', '.pilih-paket', function(){
    document.getElementById('kd_paket').value = $(this).attr('data-KdPaket');
    document.getElementById('harga').value = $(this).attr('data-Harga');
    $('#modalPaket').modal('hide');
  });
</script>

<!-- Menghitung & menampilkan biaya -->
<script type="text/javascript">
  function sum(){
    var harga = document.getElementById('harga').value;
    var qty = document.getElementById('qty').value;
    var hasil = parseInt(harga) * parseInt(qty);
    if (hasil) {
      document.getElementById('biaya').value = hasil;
    }
  }
</script>

<!-- Menghitung & menampilkan Kembalian -->
<script type="text/javascript">
  function kembali(){
    var biaya = document.getElementById('biaya').value;
    var bayar = document.getElementById('bayar').value;
    var hasil = parseInt(bayar) - parseInt(biaya);
    if (hasil) {
      document.getElementById('kembalian').value = hasil;
    }
  }
</script>