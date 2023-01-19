4<?php
include_once ('../../vendor/mpdf/mpdf/mpdf.php');
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$obj = new Mobile();
$alldata = $obj->index();
$trs = "";
$serial = 0;
foreach ($alldata as $value) {
	$serial++;
	$trs.="<tr>";
	$trs.="<td>".$serial."</td>";
	$trs.="<td>".$value['id']."</td>";
	$trs.="<td>".$value['title']."</td>";
	$trs.="</tr>";
}
$html = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
<title>::List Of Mobiles::</title>
</head>
<body>
	<h1>List of Mobiles</h1>
	<table border="1" width="320px" align="center" cellspacing="0">
		<thead>
			<tr>
				<th>SR</th>
				<th>ID</th>
				<th>Mobile Name</th>
			</tr>
		</thead>
		<tbody>
			$trs
		</tbody>
	</table>
</body>
</html>
EOD;

$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>
