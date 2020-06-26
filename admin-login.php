<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Pemesanan Produk Medan Exchange</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/adminstyle.css" />
</head>
<body>
  <?php 
      include "koneksi.php";
    //   include "content.php"; 
    ?>
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
    <!-- <div class="jumbotron"> -->
    
    <!-- <div class="container"> -->
    <img src="image/logo.png" class="logo">
        
        <div class="box3">
            <form action="cekLogin.php" method="POST">
            <h2>Admin Login</h2>
                <input class="form-control" type="text" name="txtUser" required placeholder="Masukkan username">
                <br>
                <input class="form-control" type="password" name="txtPassword" required placeholder="Masukkan password">
                <br><button type="reset" value="Cancel" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success ">Submit</button>
            </form>
        </div> <!-- box3         -->
    <!-- </div> -->



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
