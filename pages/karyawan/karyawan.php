<?php 
	ob_start();

	switch (@$_GET['act']) {
		default:
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Data Karyawan</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Karyawan&act=tambah" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-plus"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <table id="dtTable" class="table table-striped table-bordered">
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>Kode Karyawan</th>
				  		<th>Nama Karyawan</th>
				  		<th>Alamat</th>
				  		<th>Email</th>
						  <th>No. Handphone</th>
						  <th>Deskripsi</th>
				  		<th>Actions</th>
				  	</tr>
				  </thead>
				  <tbody>

				  	<?php 
				  		$no = 1;
				  		$sql = "SELECT * FROM tbl_karyawan";
				  		$result = mysqli_query($koneksi, $sql);
				  		while ($data = mysqli_fetch_array($result)) {
				  	?>
				  		<tr>
					  		<td><?php echo $no++; ?></td>
					  		<td><?php echo $data['Kode_Karyawan']; ?></td>
					  		<td><?php echo $data['Nama_Karyawan']; ?></td>
					  		<td><?php echo $data['Alamat']; ?></td>
					  		<td><?php echo $data['Email']; ?></td>
							  <td><?php echo $data['No_Hp']; ?></td>
							  <td><?php echo $data['Deskripsi']; ?></td>
					  		<td>
					  			<a href="?page=Karyawan&act=ubah&id=<?php echo $data['Kode_Karyawan']; ?>">
					  				<span class="glyphicon glyphicon-edit"></span>
					  			</a>
					  			&nbsp;&nbsp;
					  			<a onclick="return confirm('Yakin Nih Data Mau dihapus..?')"
					  				href="?page=Karyawan&act=hapus&id=<?php echo $data['Kode_Karyawan']; ?>">
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
		$sql = "SELECT Kode_Karyawan FROM tbl_karyawan ORDER BY Kode_Karyawan DESC LIMIT 1";
		$result = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($result);
		$kode = $data['Kode_Karyawan'];
		$kode = substr($kode, 0, 6);
		$kode++;
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Tambah Data Karyawan</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Karyawan" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Karyawan</td>
			    			<td><input type="text" name="txtKaryawan" class="form-control" value="<?php echo($kode) ?>" placeholder="Masukkan Kode Karyawan" readonly autocomplete="off" required></td>
			    		</tr>
			    		<tr>
			    			<td>Nama</td>
			    			<td><input type="text" name="txtNama" class="form-control" placeholder="Masukkan Nama Karyawan" required></td>
			    		</tr>
			    		<tr>
			    			<td>Alamat</td>
			    			<td><textarea name="txtAlamat" class="form-control" placeholder="Masukkan Alamat Lengkap" required></textarea></td>
			    		</tr>
			    		<tr>
			    			<td>Email</td>
			    			<td><input type="text" name="txtEmail" class="form-control" placeholder="Masukkan Email Valid" required></td>
			    		</tr>
						<tr>
			    			<td>No. Handphone</td>
			    			<td><input type="text" name="txtHp" class="form-control" placeholder="Masukkan NO HP " required></td>
			    		</tr>
						<td>Deskripsi</td>
						<td><textarea name="txtDeskripsi" placeholder="masukkan deskripsi" class="form-control" required></textarea>
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
				$kode = $_POST['txtKaryawan'];
				$nama = $_POST['txtNama'];
				$alamat = $_POST['txtAlamat'];
				$email = $_POST['txtEmail'];
				$no_hp = $_POST['txtHp'];
				$deskripsi = $_POST['txtDeskripsi'];

				$query = "INSERT INTO tbl_karyawan Values('$kode', 
				'$nama', '$alamat', '$email', '$no_hp', '$deskripsi')";
				$result = mysqli_query($koneksi, $query);

			}

			break;
		
		case 'ubah':

		$id = $_GET['id'];
		$query = "SELECT * FROM tbl_karyawan WHERE Kode_Karyawan = '$id'";
		$result = mysqli_query($koneksi, $query);
		$data = mysqli_fetch_array($result);
		$nama = $data['Nama_Karyawan'];
		$alamat = $data['Alamat'];
		$email = $data['Email'];
		$no_hp = $data['No_Hp'];
		$deskripsi = $data['Deskripsi'];

?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Ubah Data Karyawan</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Karyawan" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Kode Karyawan</td>
			    			<td><input type="text" name="txtKaryawan" class="form-control" value="<?php echo($id) ?>" readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Nama</td>
			    			<td><input type="text" name="txtNama" class="form-control" value="<?php echo($nama) ?>" required></td>
			    		</tr>
			    		<tr>
			    			<td>Alamat</td>
			    			<td><textarea name="txtAlamat" class="form-control" required><?php echo($alamat) ?></textarea></td>
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
				$id = $_POST['txtKaryawan'];
				$nama = $_POST['txtNama'];
				$alamat = $_POST['txtAlamat'];
				$email = $_POST['txtEmail'];
				$no_hp = $_POST['txtHp'];
				$deskripsi = $_POST['txtDeskripsi'];

				$query = "UPDATE tbl_karyawan SET Nama_Karyawan = '$nama',
													Alamat = '$alamat',
													Email = '$email',
													No_Hp = '$no_hp',
													Deskripsi = '$deskripsi'
													WHERE Kode_Karyawan = '$id'";
				mysqli_query($koneksi, $query);
				header("location:?page=Karyawan");
			}

			break;
		
		case 'hapus':
			$id = $_GET['id'];
			$query = "DELETE FROM tbl_karyawan WHERE Kode_Karyawan = '$id'";
			mysqli_query($koneksi, $query);
			header("location:?page=Karyawan");
			break;
		
	}

?>