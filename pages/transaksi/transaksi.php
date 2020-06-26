<?php 
	ob_start();

	switch (@$_GET['act']) {
		default:
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Data Transaksi</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Transaksi&act=tambah" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-plus"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <table id="dtTable" class="table table-striped table-bordered">
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>Kode Transaksi</th>
				  		<th>Tanggal</th>
							<th>Kode Pesanan</th>
							<th>Kode Produk</th>
							<th>Harga</th>
							<th>Quantity</th>
							<th>Biaya</th>
							<th>Bayar</th>
							<th>Kembalian</th>
				  		<th>Actions</th>
				  	</tr>
				  </thead>
				  <tbody>

				  	<?php 
				  		$no = 1;
				  		$sql = "SELECT * FROM tbl_transaksi";
				  		$result = mysqli_query($koneksi, $sql);
				  		while ($data = mysqli_fetch_array($result)) {
				  	?>
				  		<tr>
					  		<td><?php echo $no++; ?></td>
					  		<td><?php echo $data['Kode_Transaksi']; ?></td>
					  		<td><?php echo $data['Date']; ?></td>
					  		<td><?php echo $data['Kode_Pesanan']; ?></td>
					  		<td><?php echo $data['Kode_Produk']; ?></td>
					  		<td><?php echo $data['Harga']; ?></td>
					  		<td><?php echo $data['Quantity']; ?></td>
					  		<td><?php echo $data['Biaya']; ?></td>
								<td><?php echo $data['Bayar']; ?></td>
					  		<td><?php echo $data['Kembalian']; ?></td>
					  		<td>
					  			<a href="?page=Transaksi&act=ubah&id=<?php echo $data['Kode_Transaksi']; ?>">
					  				<span class="glyphicon glyphicon-edit"></span>
					  			</a>
					  			&nbsp;&nbsp;
					  			<a onclick="return confirm('Yakin Nih Data Mau dihapus..?')"
					  				href="?page=Transaksi&act=hapus&id=<?php echo $data['Kode_Transaksi']; ?>">
					  					<span class="glyphicon glyphicon-trash"></span>
					  			</a>
					  		</td>
					  	</tr>
				  	<?php
				  		}
				  	?>

				  </tbody>
				</table>
			  </div>
			</div>		
<?php
			break;

		case 'tambah':

		$sql = "SELECT Kode_Transaksi FROM tbl_transaksi ORDER BY Kode_Transaksi DESC LIMIT 1";
		$result = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($result);
		$kode = $data['Kode_Transaksi'];
		$kode = substr($kode, 0, 6);
		$kode++;
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Tambah Data Transaksi</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Transaksi" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Transaksi</td>
			    			<td><input type="text" name="txtTransaksi" class="form-control" value="<?php echo($kode) ?>" required readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Tanggal</td>
			    			<td><input type="text" name="txtTanggal" class="form-control" value="<?php echo(date('Y-m-d')) ?>" required readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Kode Pesanan</td>
			    			<td>
			    				<div class="input-group">
							      <input type="text" name="txtKodePesanan" id="id_pelanggan" class="form-control" placeholder="Kode Pesanan" required>
							      <span class="input-group-btn">
							        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalPelanggan">
							        	<span class="glyphicon glyphicon-search"></span>
							        </button>
							      </span>
							    </div>
									<!-- /input-group -->
			    			</td>
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
			    			<td>Harga</td>
			    			<td><input type="text" name="txtHarga" id="harga" class="form-control" placeholder="Harga" required readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Quantity</td>
			    			<td><input type="text" name="txtQuantity" id="qty" onkeyup="sum();" class="form-control" placeholder="Quantity" required></td>
			    		</tr>
			    		<tr>
			    			<td>Biaya</td>
			    			<td><input type="text" name="txtBiaya" id="biaya" class="form-control" placeholder="Biaya" required readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Bayar</td>
			    			<td><input type="text" name="txtBayar" id="bayar" onkeyup="kembali();" class="form-control" placeholder="Bayar" required></td>
			    		</tr>
			    		<tr>
			    			<td>Kembalian</td>
			    			<td><input type="text" name="txtKembalian" id="kembalian" class="form-control" placeholder="Kembalian" required readonly></td>
			    		</tr>
			    		<tr>
			    			<td colspan="2">
			    				<button type="submit" name="btnSave" class="btn btn-success">
			    					<span class="glyphicon glyphicon-plus"></span> Create New Record
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
<?php

			if (isset($_POST['btnSave'])) {
				$kode = $_POST['txtTransaksi'];
				$date = $_POST['txtTanggal'];
				$kodePesanan = $_POST['txtKodePesanan'];
				$kodeProduk = $_POST['txtKodeProduk'];
				$harga = $_POST['txtHarga'];
				$quantity = $_POST['txtQuantity'];
				$biaya = $_POST['txtBiaya'];
				$bayar = $_POST['txtBayar'];
				$kembalian = $_POST['txtKembalian'];

				$query = "INSERT INTO tbl_transaksi Values('$kode', '$date', '$kodePesanan', '$kodeProduk', '$harga', '$quantity', '$biaya','$bayar', '$kembalian')";
				$result = mysqli_query($koneksi, $query);
				header('location:?page=Transaksi&act=tambah');

			}

			break;
		
		case 'ubah':
		$kode = $_GET['id'];
		$query = "SELECT * FROM tbl_transaksi WHERE Kode_Transaksi = '$kode'";
		$result = mysqli_query($koneksi, $query);
		$data = mysqli_fetch_array($result);
		$date = $data['Date'];
		$kodePesanan = $data['Kode_Pesanan'];
		$kodeProduk = $data['Kode_Produk'];
		$harga = $data['Harga'];
		$quantity = $data['Quantity'];
		$biaya = $data['Biaya'];
		$bayar = $data['Bayar'];
		$kembalian = $data['Kembalian'];

?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Ubah Data Transaksi</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Transaksi" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Transaksi</td>
			    			<td><input type="text" name="txtTransaksi" class="form-control" value="<?php echo($kode) ?>" readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Date</td>
			    			<td><input type="text" name="txtDate" class="form-control" value="<?php echo($date) ?>" required></td>
			    		</tr>
			    		<tr>
			    			<td>Kode Pesanan</td>
			    			<td>
			    				<div class="input-group">
							      <input type="text" name="txtKodePesanan" id="id_pelanggan" class="form-control" value="<?php echo($kodePesanan) ?>" placeholder="Kode Pesanan" required>
							      <span class="input-group-btn">
							        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalPelanggan">
							        	<span class="glyphicon glyphicon-search"></span>
							        </button>
							      </span>
							    </div>
									<!-- /input-group -->
			    			</td>
			    		</tr>
			    		<tr>
			    			<td>Kode Produk</td>
			    			<td>
			    				<div class="input-group">
							      <input type="text" name="txtKodeProduk" id="kd_paket" class="form-control" value="<?php echo($kodeProduk) ?>" placeholder="Kode Produk" required>
							      <span class="input-group-btn">
							        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalPaket">
							        	<span class="glyphicon glyphicon-search"></span>
							        </button>
							      </span>
							    </div><!-- /input-group -->
			    			</td>
			    		</tr>
              <tr>
			    			<td>Harga</td>
			    			<td><input type="text" name="txtHarga" id="harga" class="form-control" placeholder="Harga" value="<?php echo($harga) ?>"  required readonly></td>
			    		</tr>
              <tr>
			    			<td>Quantity</td>
								<td><input type="text" name="txtQuantity" id="qty" onkeyup="sum();" class="form-control" value="<?php echo($quantity) ?>" placeholder="Quantity" required></td>
			    		</tr>
              <tr>
			    			<td>Biaya</td>
			    			<td><input type="text" name="txtBiaya" id="biaya" class="form-control" placeholder="Biaya" value="<?php echo($biaya) ?>" required readonly></td>
			    		</tr>
							<tr>
			    			<td>Bayar</td>
								<td><input type="text" name="txtBayar" id="bayar" onkeyup="kembali();" class="form-control" value="<?php echo($bayar) ?>" placeholder="Bayar" required></td>
			    		</tr>
							<tr>
			    			<td>Kembalian</td>
								<td><input type="text" name="txtKembalian" id="kembalian" class="form-control" placeholder="Kembalian" value="<?php echo($kembalian) ?>" required readonly></td>
			    		</tr>
			    		<tr>
			    			<td colspan="2">
			    				<button type="submit" name="btnEdit" class="btn btn-success">
			    					<span class="glyphicon glyphicon-edit"></span> Update
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
        <?php
			if (isset($_POST['btnEdit'])) {
				$kode = $_POST['txtTransaksi'];
				$date = $_POST['txtDate'];
				$kodePesanan = $_POST['txtKodePesanan'];
				$kodeProduk = $_POST['txtKodeProduk'];
				$harga = $_POST['txtHarga'];
				$quantity = $_POST['txtQuantity'];
				$biaya = $_POST['txtBiaya'];
				$bayar = $_POST['txtBayar'];
				$kembalian = $_POST['txtKembalian'];

				$query = "UPDATE tbl_transaksi SET Kode_Produk = '$kodeProduk',
													Date = '$date',
													Kode_Pesanan = '$kodePesanan',
													Harga = '$harga',
													Quantity = '$quantity',
													Biaya = '$biaya',
													Bayar = '$bayar',
													Kembalian = '$kembalian'
									WHERE Kode_Transaksi = '$kode'";
				mysqli_query($koneksi, $query);
				header("location:?page=Transaksi");
			}
			break;
		
			case 'hapus':
			$kode = $_GET['id'];
			$query = "DELETE FROM tbl_transaksi WHERE Kode_Transaksi = '$kode'";
			mysqli_query($koneksi, $query);
			header("location:?page=Transaksi");
			break;
		
	}

?>

<!-- Modal Data Pesanan -->
<div class="modal fade" id="modalPelanggan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 800px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pencarian Data Pesanan</h4>
      </div>
      <div class="modal-body">
        <table id="dtTable" class="table table-striped table-bordered">
		  <thead>
		  	<tr>
		  		<th>No.</th>
		  		<th>Kode Pesanan</th>
		  		<th>Nama Pemesan</th>
		  		<th>Alamat</th>
		  		<th>Email</th>
					<th>No Handphone</th>
					<th>Date</th>
		  		<th>Actions</th>
		  	</tr>
		  </thead>
		  <tbody>

		  	<?php 
		  		$no = 1;
		  		$sql = "SELECT * FROM tbl_pesanan";
		  		$result = mysqli_query($koneksi, $sql);
		  		while ($data = mysqli_fetch_array($result)) {
		  	?>
		  		<tr>
			  		<td><?php echo $no++; ?></td>
			  		<td><?php echo $data['Kode_Pesanan']; ?></td>
			  		<td><?php echo $data['Nama_Pemesan']; ?></td>
			  		<td><?php echo $data['Alamat']; ?></td>
			  		<td><?php echo $data['Email']; ?></td>
						<td><?php echo $data['No_Hp']; ?></td>
						<td><?php echo $data['Date']; ?></td>
			  		<td align="center">
			  			<button class="btn btn-success btn-xs pilih-pelanggan" data-idPelanggan="<?php echo $data['Kode_Pesanan']; ?>" data-idPelanggan="<?php echo $data['Nama_Pemesan']; ?>">
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

