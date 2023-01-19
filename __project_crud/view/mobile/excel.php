<?php
include_once ('../../vendor/phpoffice/phpexcel/Classes/PHPExcel.php');
include_once ('../../vendor/autoload.php');
use allproject\mobile\mobile;

$obj = new Mobile();
$alldata = $obj->index();

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Marten Balliauw")
			->setLastModifiedby("Marten Balliauw")
			->setTitle("Office 2007 XLSX Mobile document")
			->setSubject("Subject")
			->setDescription("setDescription")
			->setKeywords("Keywords")
			->setCategory("Category");
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1','SL')
			->setCellValue('B1','ID')
			->setCellValue('C1','Mobile Name');
$counter = 2;
$serial = 0;
foreach ($alldata as $value) {
	$serial++;
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$counter,$serial)
				->setCellValue('B'.$counter,$value['id'])
				->setCellValue('C'.$counter,$value['title']);
				$counter++;
}
$objPHPExcel->getActiveSheet()->setTitle('Mobile_List');
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="mobile.xls"');
header('Cache-Control: max-age = 0');
header('Cache-Control: max-age = 1');

header('Expires: Mon, 26 Jul 2011 5:00:00 GMT');


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
