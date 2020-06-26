<?php 
	ob_start();

	switch (@$_GET['act']) {
		default:
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Data Admin</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Admin&act=tambah" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-plus"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <table id="dtTable" class="table table-striped table-bordered">
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>Username</th>
				  		<th>Password</th>
				  		<th>Nama</th>
				  		<th>Email</th>
				  		<th>Actions</th>
				  	</tr>
				  </thead>
				  <tbody>

				  	<?php 
				  		$no = 1;
				  		$sql = "SELECT * FROM tbl_admin";
				  		$result = mysqli_query($koneksi, $sql);
				  		while ($data = mysqli_fetch_array($result)) {
				  	?>
				  		<tr>
					  		<td><?php echo $no++; ?></td>
					  		<td><?php echo $data['Username']; ?></td>
					  		<td><?php echo $data['Password']; ?></td>
					  		<td><?php echo $data['Nama']; ?></td>
					  		<td><?php echo $data['Email']; ?></td>
					  		<td>
					  			<a href="?page=Admin&act=ubah&id=<?php echo $data['Username']; ?>">
					  				<span class="glyphicon glyphicon-edit"></span>
					  			</a>
					  			&nbsp;&nbsp;
					  			<a onclick="return confirm('Yakin Nih Data Mau dihapus..?')"
					  				href="?page=Admin&act=hapus&id=<?php echo $data['Username']; ?>">
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
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Tambah Data Admin</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Admin" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Username</td>
			    			<td><input type="text" name="txtUsername" class="form-control" placeholder="Masukkan Username" required></td>
			    		</tr>
			    		<tr>
			    			<td>Password</td>
			    			<td><input type="password" name="txtPassword" class="form-control" placeholder="Masukkan Password" required></td>
			    		</tr>
			    		<tr>
			    			<td>Nama</td>
			    			<td><textarea name="txtNama" class="form-control" placeholder="Masukkan Nama" required></textarea></td>
			    		</tr>
			    		<tr>
			    			<td>Email</td>
			    			<td><input type="text" name="txtEmail" class="form-control" placeholder="Masukkan Email" required></td>
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
				$username = $_POST['txtUsername'];
				$password = $_POST['txtPassword'];
				$nama = $_POST['txtNama'];
                $email = $_POST['txtEmail'];
                
				$query = "INSERT INTO tbl_admin Values('$username', 
				'$password', '$nama', '$email')";
				$result = mysqli_query($koneksi, $query);

				if ($result) {
					echo "<script>alert('Data Berhasil ditambahkan..');location='?page=Admin'</script>";
					
				}

			}

			break;
		
		case 'ubah':

		$id = $_GET['id'];
		$query = "SELECT * FROM tbl_admin WHERE Username = '$id'";
		$result = mysqli_query($koneksi, $query);
		$data = mysqli_fetch_array($result);
		$password = $data['Password'];
		$nama = $data['Nama'];
        $email = $data['Email'];
?>
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<font size="4"><b>Ubah Data Admin</b></font>
			  	<div class="pull-right">
			  		<a href="?page=Admin" class="btn btn-sm btn-primary">
			  			<span class="glyphicon glyphicon-backward"></span>
			  		</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			    <form name="frmInput" action="" method="POST">
			    	<table class="table table-bordered">
			    		<tr>
			    			<td>Username</td>
			    			<td><input type="text" name="txtUsername" class="form-control" value="<?php echo($id) ?>" readonly></td>
			    		</tr>
			    		<tr>
			    			<td>Password</td>
			    			<td><input type="password" name="txtPassword" class="form-control" value="<?php echo($password) ?>" required></td>
			    		</tr>
			    		<tr>
			    			<td>Nama</td>
			    			<td><textarea name="txtNama" class="form-control" required><?php echo($nama) ?></textarea></td>
			    		</tr>
			    		<tr>
			    			<td>Email</td>
			    			<td><input type="text" name="txtEmail" class="form-control" value="<?php echo($email) ?>" required></td>
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
				$id = $_POST['txtUsername'];
				$password = $_POST['txtPassword'];
				$nama = $_POST['txtNama'];
                $email = $_POST['txtEmail'];

				$query = "UPDATE tbl_admin SET Nama = '$nama',
													Email = '$email',
													Password = '$password'
													WHERE Username = '$id'";
				mysqli_query($koneksi, $query);
                header("location:?page=Admin");
			}

			break;
		
		case 'hapus':
			$id = $_GET['id'];
			$query = "DELETE FROM tbl_admin WHERE Username = '$id'";
			mysqli_query($koneksi, $query);
			header("location:?page=Admin");
			break;
		
	}

?>