<?php  
	include "koneksi.php";

	$html = '
	<h2 style="margin-top: 10pt; text-align: center;">Laporan Data Produk</h2>
	<h3 style="text-align: center;">Medan Exchange</h3>
		<br>	
		<table style="border-collapse: collapse;width: 100%;" border="0">
			<thead>
				<tr>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kode Produk</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Nama Produk</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Deskripsi</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Harga</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Stock</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Kategori</th>
                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd; text-align: center;">Merk</th>
				</tr>
			</thead>
			<tbody>
	';

	$no = 1;
	$query = mysqli_query($koneksi, "SELECT * FROM tbl_produk");
	while ($data = mysqli_fetch_array($query)) {
		$html .= '<tr class="';
				if (($no % 2) == 0) {
					$html .= "evenrow";
				}else {
					$html .= "oddrow";
				}
					$html .= '">';

		$html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kode_Produk'] . '</td>';
		$html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Nama'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Deskripsi'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Harga'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Stock'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Kategori'] . '</td>';
        $html .= '<td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">' . $data['Merk'] . '</td>';
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
	$mpdf->Output('laporan-data-produk.pdf', 'I');

	exit;
?>