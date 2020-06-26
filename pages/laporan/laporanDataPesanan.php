<?php  
	include "koneksi.php";

	// $mpdf->Image('files/images/frontcover.jpg', 0, 0, 210, 297, 'jpg', '', true, false);
	$html = '
		<h2 style="margin-top: 10pt; text-align: center;">Laporan Data Pesanan</h2>
		<h3 style="text-align: center;">Medan Exchange</h3>
		<br>
		<table style="border-collapse: collapse;width: 100%;" border="0">
			<thead>
				<tr>
					<th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Pesanan</th>
					<th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Nama Pemesan</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Alamat</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Email</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">No. Handphone
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Date</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Pos</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Produk</th>
				</tr>
				
			</thead>
			<tbody>
	';

	$no = 1;
	$query = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan");
	while ($data = mysqli_fetch_array($query)) {
		$html .= '<tr class="';
				if (($no % 2) == 0) {
					$html .= "evenrow";
				}else {
					$html .= "oddrow";
				}
					$html .= '">';

		$html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Pesanan'] . '</td>';
		$html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Nama_Pemesan'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Alamat'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Email'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['No_Hp'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Date'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Pos'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Produk'] . '</td>';
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
	$mpdf->Output('laporan-data-pesanan.pdf', 'I');

	exit;
?>