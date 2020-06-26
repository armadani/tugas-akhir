<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Pemesanan Produk Medan Exchange</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/datatables/dataTables.bootstrap.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top navbar-primary bg-primary">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="index.php">Medan Exchange</a>
	  <ul class="nav navbar-nav">
	  <li><a href="admin-login.php">Login Admin</a></li>
        <li><a href="gallery-produk.html">Lihat Produk</a></li>
		<li><a href="pesan.php">Pesan Produk</a></li>
		</ul>
	 
    </div>
    
  </div><!-- /.container-fluid -->
</nav>
	<div class="container">
  <?php 
      include "koneksi.php";
    //   include "content.php"; 
    ?>

	

<?php
		$sql = "SELECT Kode_Pesanan FROM tbl_pesanan ORDER BY Kode_Pesanan DESC LIMIT 1";
		$result = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($result);
		$kode = $data['Kode_Pesanan'];
		$kode = substr($kode, 0, 6);
		$kode++;
?>
	<!-- <center>
	<h2><i>
		<a href="#">Lihat Produk>></a>
	</i></h2>
	</center> -->
<!-- <h2 style="text-align:center;color:#337ab7"><a href="gallery-produk.html">Gallery Produk</a></h2> -->
    <div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Mulailah Memesan Barang</b></font>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Pesanan</td>
			    			<td><input type="text" name="txtPesanan" class="form-control" value="<?php echo($kode) ?>" placeholder="Masukkan Kode" readonly required></td>
			    		</tr>
			    		<tr>
			    			<td>Nama</td>
			    			<td><input type="text" name="txtNama" class="form-control" placeholder="Masukkan Nama lengkap" required></td>
			    		</tr>
			    		<tr>
			    			<td>Alamat</td>
			    			<td><textarea name="txtAlamat" class="form-control" placeholder="Alamat" required></textarea></td>
			    		</tr>
                        <tr>
			    			<td>Email</td>
			    			<td><input type="text" name="txtEmail" class="form-control" placeholder="Masukkan Email valid" required></td>
			    		</tr>
			    		<tr>
			    			<td>No. Handphone</td>
			    			<td><input type="text" name="txtHP" class="form-control" placeholder="Masukkan No. Handphone" required></td>
			    		</tr>
                        <tr>
			    			<td>Date</td>
			    			<td><input type="text" name="txtDate" class="form-control" value="<?php echo(date('Y-m-d')) ?>" required readonly></td>
			    		</tr>
                        <tr>
			    			<td>Kode Pos</td>
			    			<td><input type="text" name="txtKP" class="form-control" placeholder="Masukkan Kode Pos" required></td>
			    		</tr>
              <tr>
			    			<td>Kode Produk</td>
			    			<td>
			    				<div class="input-group">
							      <input type="text" name="txtKodeProduk" id="kd_paket" class="form-control" placeholder="Kode Produk" required>
							      <span class="input-group-btn">
							        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalPaket">
							        	<span class="glyphicon glyphicon-search"></span>
							        </button>
							      </span>
							    </div><!-- /input-group -->
			    			</td>
			    		</tr>
                        <tr>
			    			<td>Deskripsi</td>
			    			<td><input type="text" name="txtDeskripsi" class="form-control" placeholder="Deskripsi" required></td>
			    		</tr>
			    		<tr>
			    			<td colspan="2">
			    				<button type="submit" name="btnSave" class="btn btn-success">
			    					<span class="glyphicon glyphicon-plus"></span> Pesan Produk
			    				</button>
			    				<button type="reset" name="btnReset" class="btn btn-danger">
			    					<span class="glyphicon glyphicon-repeat"></span> Reset
			    				</button>
			    			</td>
			    		</tr>
			    	</table>
			    </form>
			  </div>
			</div>
            </div>	
<?php
			if (isset($_POST['btnSave'])) {
				$kodePesanan = $_POST['txtPesanan'];
				$nama = $_POST['txtNama'];
                $alamat = $_POST['txtAlamat'];
                $email = $_POST['txtEmail'];
                $no_hp = $_POST['txtHP'];
                $date = $_POST['txtDate'];
                $kodePos = $_POST['txtKP'];
                $produk = $_POST['txtKodeProduk'];
                $deskripsi = $_POST['txtDeskripsi'];

				$query = "INSERT INTO tbl_pesanan Values('$kodePesanan', 
				'$nama', '$alamat', '$email', '$no_hp', '$date', '$kodePos', '$produk', '$deskripsi')";
				$result = mysqli_query($koneksi, $query);

				if ($result) {
					echo "<script>alert('Data Berhasil ditambahkan..');</script>";
					
				}

            }
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

<!-- Memilih Data Paket dan Harga dari Modal Paket -->
<script type="text/javascript">
  $(document).on('click', '.pilih-paket', function(){
    document.getElementById('kd_paket').value = $(this).attr('data-KdPaket');
    document.getElementById('harga').value = $(this).attr('data-Harga');
    $('#modalPaket').modal('hide');
  });
</script>

<!-- modal data produk -->
<div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 800px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pencarian Data Produk</h4>
      </div>
      <div class="modal-body">
        <table id="dtTable2" class="table table-striped table-bordered">
		  <thead>
		  	<tr>
		  		<th>No.</th>
		  		<th>Kode Produk</th>
		  		<th>Nama Produk</th>
		  		<th>Deskripsi</th>
		  		<th>Harga</th>
					<th>Stock</th>
					<th>Kategori</th>
					<th>Merk</th>
		  		<th>Actions</th>
		  	</tr>
		  </thead>
		  <tbody>

		  	<?php 
		  		$no = 1;
		  		$sql = "SELECT * FROM tbl_produk";
		  		$result = mysqli_query($koneksi, $sql);
		  		while ($data = mysqli_fetch_array($result)) {
		  	?>
		  		<tr>
			  		<td><?php echo $no++; ?></td>
			  		<td><?php echo $data['Kode_Produk']; ?></td>
			  		<td><?php echo $data['Nama']; ?></td>
						<td><?php echo $data['Deskripsi']; ?></td>
			  		<td><?php echo $data['Harga']; ?></td>
			  		<td><?php echo $data['Stock']; ?></td>
						<td><?php echo $data['Kategori']; ?></td>
						<td><?php echo $data['Merk']; ?></td>
			  		<td align="center">
			  			<button class="btn btn-success btn-xs pilih-paket" data-KdPaket="<?php echo $data['Kode_Produk']; ?>" data-Harga="<?php echo $data['Harga']; ?>">
			  				<span class="glyphicon glyphicon-check"></span>
			  			</button>
			  		</td>
			  	</tr>
		  	<?php
		  		}
		  	?>

		  </tbody>
		</table>
      </div>
    </div>
  </div>
</div>

