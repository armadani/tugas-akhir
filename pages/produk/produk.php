<?php 
	ob_start();

	switch (@$_GET['act']) {
		default:
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Data Produk</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Produk&act=tambah" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-plus"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <table id="dtTable" class="table table-striped table-bordered">
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
					  		<td>
					  			<a href="?page=Produk&act=ubah&id=<?php echo $data['Kode_Produk']; ?>">
					  				<span class="glyphicon glyphicon-edit"></span>
					  			</a>
					  			&nbsp;&nbsp;
					  			<a onclick="return confirm('Yakin Nih Data Mau dihapus..?')"
					  				href="?page=Produk&act=hapus&id=<?php echo $data['Kode_Produk']; ?>">
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

		$sql = "SELECT Kode_Produk FROM tbl_produk ORDER BY Kode_Produk DESC LIMIT 1";
		$result = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($result);
		$kode = $data['Kode_Produk'];
		$kode = substr($kode, 0, 6);
		$kode++;
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Tambah Data Produk</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Produk" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Produk</td>
			    			<td><input type="text" name="txtKode" class="form-control" value="<?php echo($kode) ?>" placeholder="Masukkan Kode Produk" readonly required></td>
			    		</tr>
			    		<tr>
			    			<td>Nama Produk</td>
			    			<td><input type="text" name="txtNama" class="form-control" placeholder="Masukkan Nama Produk" required></td>
			    		</tr>
			    		<tr>
			    			<td>Deskripsi</td>
			    			<td><textarea name="txtDesk" class="form-control" placeholder="Masukkan Deskripsi Produk" required></textarea></td>
			    		</tr>
			    		<tr>
			    			<td>Harga</td>
			    			<td><input type="text" name="txtHarga" class="form-control" placeholder="Masukkan Harga Produk" required></td>
			    		</tr>
			    		<tr>
			    			<td>Stock Produk</td>
			    			<td><input type="text" name="txtStock" class="form-control" placeholder="Masukkan Stock Produk" required></td>
			    		</tr>
                        <tr>
			    			<td>Kategori</td>
			    			<td><input type="text" name="txtKategori" class="form-control" placeholder="Masukkan Kategori" required></td>
			    		</tr>
                        <tr>
			    			<td>Merk Produk</td>
			    			<td><input type="text" name="txtMerk" class="form-control" placeholder="Masukkan Merk Produk" required></td>
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
				$kode = $_POST['txtKode'];
				$nama = $_POST['txtNama'];
				$deskripsi = $_POST['txtDesk'];
                $harga = $_POST['txtHarga'];
                $stock = $_POST['txtStock'];
                $kategori = $_POST['txtKategori'];
                $merk = $_POST['txtMerk'];

				$query = "INSERT INTO tbl_produk Values('$kode', 
				'$nama', '$deskripsi', '$harga', '$stock', '$kategori', '$merk')";
				$result = mysqli_query($koneksi, $query);

				if ($result) {
					echo "<script>alert('Data Berhasil ditambahkan..');location='?page=Produk'</script>";
					
				}

			}

			break;
		
		case 'ubah':

		$id = $_GET['id'];
		$query = "SELECT * FROM tbl_produk WHERE Kode_Produk = '$id'";
		$result = mysqli_query($koneksi, $query);
		$data = mysqli_fetch_array($result);
		$nama = $data['Nama'];
		$deskripsi = $data['Deskripsi'];
		$harga = $data['Harga'];
		$stock = $data['Stock'];
		$kategori = $data['Kategori'];
		$merk = $data['Merk'];

?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Ubah Data Produk</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Produk" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Produk</td>
			    			<td><input type="text" name="txtKd" class="form-control" value="<?php echo($id) ?>" readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Nama Produk</td>
			    			<td><input type="text" name="txtNama" class="form-control" value="<?php echo($nama) ?>" required></td>
			    		</tr>
			    		<tr>
			    			<td>Deskripsi</td>
			    			<td><textarea name="txtDeskripsi" class="form-control" required><?php echo($deskripsi) ?></textarea></td>
			    		</tr>
			    		<tr>
			    			<td>Harga</td>
			    			<td><input type="text" name="txtHarga" class="form-control" value="<?php echo($harga) ?>" required></td>
			    		</tr>
                        <tr>
			    			<td>Stock</td>
			    			<td><input type="text" name="txtStock" class="form-control" value="<?php echo($stock) ?>" required></td>
			    		</tr>
                        <tr>
			    			<td>Kategori</td>
			    			<td><input type="text" name="txtKategori" class="form-control" value="<?php echo($kategori) ?>" required></td>
			    		</tr>
                        <tr>
			    			<td>Merk Produk</td>
			    			<td><input type="text" name="txtMerk" class="form-control" value="<?php echo($merk) ?>" required></td>
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
				$id = $_POST['txtKd'];
				$nama = $_POST['txtNama'];
				$deskripsi = $_POST['txtDeskripsi'];
                $harga = $_POST['txtHarga'];
                $stock = $_POST['txtStock'];
                $kategori = $_POST['txtKategori'];
                $merk = $_POST['txtMerk'];

				$query = "UPDATE tbl_produk SET Nama = '$nama',
													Deskripsi = '$deskripsi',
													Harga = '$harga',
                                                    Stock = '$stock',
                                                    Kategori = '$kategori',
                                                    Merk = '$merk'
													WHERE Kode_Produk = '$id'";
				mysqli_query($koneksi, $query);
				header("location:?page=Produk");
			}

			break;
		
		case 'hapus':
			$id = $_GET['id'];
			$query = "DELETE FROM tbl_produk WHERE Kode_Produk = '$id'";
			mysqli_query($koneksi, $query);
			header("location:?page=Produk");
			break;
		
	}

?>