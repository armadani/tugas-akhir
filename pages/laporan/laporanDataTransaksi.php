<?php  
	include "koneksi.php";

	$html = '
	<h2 style="margin-top: 10pt; text-align: center;">Laporan Data Transaksi</h2>
	<h3 style="text-align: center;">Medan Exchange</h3>
		<br>	
		<table style="border-collapse: collapse;width: 100%;" border="0">
			<thead>
				<tr>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Transaksi</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Tanggal</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Pesanan</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Produk</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Harga</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Quantity</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Biaya</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Bayar</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kembalian</th>
				</tr>
			</thead>
			<tbody>
	';

	$no = 1;
	$query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi");
	while ($data = mysqli_fetch_array($query)) {
		$html .= '<tr class="';
				if (($no % 2) == 0) {
					$html .= "evenrow";
				}else {
					$html .= "oddrow";
				}
					$html .= '">';

		$html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Transaksi'] . '</td>';
		$html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Date'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Pesanan'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Produk'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Harga'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Quantity'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Biaya'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Bayar'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kembalian'] . '</td>';
		$html .= '</tr>';
		$no++;
	}

	$html .= '</tbody></table>';

	include "mpdf/mpdf.php";

	$mpdf = new mPDF('A4');
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->list_indent_first_level = 0;
	$stylesheet = file_get_contents('mpdf/mpdfstyletables.css');
	$mpdf->writeHTML($stylesheet, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('laporan-data-transaksi.pdf', 'I');

	exit;
?>