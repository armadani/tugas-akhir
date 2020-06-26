<?php  

	switch (@$_GET['page']) {
		case 'Produk':
			include "pages/produk/produk.php";
			break;
		case 'Pesanan':
			include "pages/pesanan/pesanan.php";
			break;
		case 'Admin':
			include "pages/admin/admin.php";
			break;
		case 'Karyawan':
			include "pages/karyawan/karyawan.php";
			break;
		case 'Transaksi':
			include "pages/transaksi/transaksi.php";
			break;
		case 'LaporanDataPesanan':
			include "pages/laporan/laporanDataPesanan.php";
			break;
		case 'LaporanDataProduk':
			include "pages/laporan/laporanDataProduk.php";
			break;
		case 'LaporanDataPelanggan':
			include "pages/laporan/laporanDataPelanggan.php";
			break;
		case 'LaporanDataKaryawan':
			include "pages/laporan/laporanDataKaryawan.php";
			break;
		case 'LaporanDataTransaksi':
			include "pages/laporan/laporanDataTransaksi.php";
			break;
		
		default:
?>
			<div class="jumbotron">
			  <p>Selamat Datang di</p>
			  <h1>Aplikasi Pemesanan Produk MDX</h1>
			  <p>Aplikasi yang digunakan untuk mengelola data transaksi Medan Exchange</p>
			  
			</div>
<?php
			break;
	}

?>