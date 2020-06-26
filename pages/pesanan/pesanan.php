<?php 
	ob_start();

	switch (@$_GET['act']) {
		default:
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Data Pesanan</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Pesanan&act=tambah" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-plus"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <table id="dtTable" class="table table-striped table-bordered">
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>Kode Pesanan</th>
				  		<th>Nama Pemesan</th>
				  		<th>Alamat</th>
				  		<th>Email</th>
							<th>No. Handphone</th>
							<th>Date</th>
							<th>Kode Pos</th>
							<th>Kode Produk</th>
							<th>Deskripsi</th>
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
								<td><?php echo $data['Kode_Pos']; ?></td>
								<td><?php echo $data['Kode_Produk']; ?></td>
								<td><?php echo $data['Deskripsi']; ?></td>
					  		<td>
					  			<a href="?page=Pesanan&act=ubah&id=<?php echo $data['Kode_Pesanan']; ?>">
					  				<span class="glyphicon glyphicon-edit"></span>
					  			</a>
					  			&nbsp;&nbsp;
					  			<a onclick="return confirm('Yakin Nih Data Mau dihapus..?')"
					  				href="?page=Pesanan&act=hapus&id=<?php echo $data['Kode_Pesanan']; ?>">
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
		$sql = "SELECT Kode_Pesanan FROM tbl_pesanan ORDER BY Kode_Pesanan DESC LIMIT 1";
		$result = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($result);
		$kode = $data['Kode_Pesanan'];
		$kode = substr($kode, 0, 6);
		$kode++;
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Tambah Data Pesanan</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Pelanggan" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Pesanan</td>
			    			<td><input type="text" name="txtPesanan" class="form-control" value="<?php echo($kode) ?>" placeholder="Masukkan Kode" readonly required></td>
			    		</tr>
			    		<tr>
			    			<td>Nama Pemesan</td>
			    			<td><input type="text" name="txtNama" class="form-control" placeholder="Masukkan Nama Pemesan" required></td>
			    		</tr>
			    		<tr>
			    			<td>Alamat</td>
			    			<td><textarea name="txtAlamat" class="form-control" placeholder="Alamat" required></textarea></td>
			    		</tr>
                        <tr>
			    			<td>Email</td>
			    			<td><input type="text" name="txtEmail" class="form-control" placeholder="Masukkan Email Pemesan" required></td>
			    		</tr>
			    		<tr>
			    			<td>No. Handphone</td>
			    			<td><input type="text" name="txtHP" class="form-control" placeholder="Masukkan No. HP Pemesan" required></td>
			    		</tr>
                        <tr>
			    			<td>Date</td>
			    			<td><input type="text" name="txtDate" class="form-control" value="<?php echo(date('Y-m-d')) ?>" required readonly></td>
			    		</tr>
                        <tr>
			    			<td>Kode Pos</td>
			    			<td><input type="text" name="txtKP" class="form-control" placeholder="Masukkan Kode Pos Pemesan" required></td>
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
			break;
		
		case 'ubah':

		$id = $_GET['id'];
		$query = "SELECT * FROM tbl_pesanan WHERE Kode_Pesanan = '$id'";
		$result = mysqli_query($koneksi, $query);
		$data = mysqli_fetch_array($result);
		$nama = $data['Nama_Pemesan'];
		$alamat = $data['Alamat'];
		$email = $data['Email'];
		$no_hp = $data['No_Hp'];
		$date = $data['Date'];
		$kodePos = $data['Kode_Pos'];
		$kodeProduk = $data['Kode_Produk'];
		$deskripsi = $data['Deskripsi'];

?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Ubah Data Pesanan</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Pesanan" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Pesanan</td>
			    			<td><input type="text" name="txtKodePesanan" class="form-control" value="<?php echo($id) ?>" readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Nama Pemesan</td>
			    			<td><input type="text" name="txtNama" class="form-control" value="<?php echo($nama) ?>" required></td>
			    		</tr>
			    		<tr>
			    			<td>Alamat Lengkap</td>
			    			<td><input type="text" name="txtAlamat" class="form-control" value="<?php echo($alamat) ?>" required></td>
			    		</tr>
							<tr>
			    			<td>Email</td>
			    			<td><input type="text" name="txtEmail" class="form-control" value="<?php echo($email) ?>" required></td>
			    		</tr>
                        <tr>
			    			<td>No. Handphone</td>
			    			<td><input type="text" name="txtHp" class="form-control" value="<?php echo($no_hp) ?>" required></td>
			    		</tr>
                <tr>
			    			<td>Date</td>
			    			<td><input type="text" name="txtDate" class="form-control" value="<?php echo($date) ?>" required></td>
			    		</tr>
							</tr>
                <tr>
			    			<td>Kode Pos</td>
			    			<td><input type="text" name="txtKodePos" class="form-control" value="<?php echo($kodePos) ?>" required></td>
			    		</tr>
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
			    			<td><textarea name="txtDeskripsi" class="form-control" required><?php echo($deskripsi) ?></textarea></td>
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
				$id = $_POST['txtKodePesanan'];
				$nama = $_POST['txtNama'];
				$alamat = $_POST['txtAlamat'];
				$email = $_POST['txtEmail'];
				$no_hp = $_POST['txtHp'];
				$date = $_POST['txtDate'];
				$kodePos = $_POST['txtKodePos'];
				$kodeProduk = $_POST['txtKodeProduk'];
				$deskripsi = $_POST['txtDeskripsi'];

				$query = "UPDATE tbl_pesanan SET Nama_Pemesan = '$nama',
													Alamat = '$alamat',
													Email = '$email',
                          No_Hp = '$no_hp',
													Date = '$date',
													Kode_Pos = '$kodePos',
													Kode_Produk = '$kodeProduk',
													Deskripsi = '$deskripsi'
													WHERE Kode_Pesanan = '$id'";
				mysqli_query($koneksi, $query);
				header("location:?page=Pesanan");
			}

			break;
		
		case 'hapus':
			$id = $_GET['id'];
			$query = "DELETE FROM tbl_pesanan WHERE Kode_Pesanan = '$id'";
			mysqli_query($koneksi, $query);
			header("location:?page=Pesanan");
			break;
		
	}

?>

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