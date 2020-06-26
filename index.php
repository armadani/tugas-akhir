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
	  <a class="navbar-brand" href="?page=home">Medan Exchange</a>
	  <ul class="nav navbar-nav">
	  <li><a href="admin-login.php">Login Admin</a></li>
        <li><a href="gallery-produk.html">Lihat Produk</a></li>
		<li><a href="pesan.php">Pesan Produk</a></li>
		</ul>
		
    </div>
	
    <!-- <form class="navbar-form navbar-right" name="frmLogin" action="cekLogin.php" method="POST">
        <div class="form-group-sm">
          <span style="color:white;"><i>Admin Login</i></span>
          <input name="txtUser" type="text" class="form-control" placeholder="Username" required>
          <input name="txtPassword" type="password" class="form-control" placeholder="Password">
          <button type="submit" class="btn btn-default btn-sm">Submit</button>
          
        </div>
        
    </form> -->
    
    
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
