<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2013 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.9, 2013-06-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Asia/Jakarta');

/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';
require_once 'db.php';

// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$query = mysql_query('select nim, nama, alamat from mahasiswa');

//set table header
$objPHPExcel->getActiveSheet()->setCellValue('A5', 'No');
$objPHPExcel->getActiveSheet()->setCellValue('B5', 'NIM');
$objPHPExcel->getActiveSheet()->setCellValue('C5', 'Nama');
$objPHPExcel->getActiveSheet()->setCellValue('D5', 'Alamat');

//start data from row 11
$i = 8;
$no= 1;
while($data=mysql_fetch_array($query)){
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $no);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $data['nim']);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $data['nama']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $data['alamat']);
	$i++;
	$no++;
}

// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFill()->getStartColor()->setARGB('#9933CC');
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFill()->getStartColor()->setARGB('#9933CC');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Add an image to the worksheet
//$objDrawing = new PHPExcel_Worksheet_Drawing();
//$objDrawing->setName('Media Kreatif Indonesia');
//$objDrawing->setDescription('Logo Media Kreatif');
//$objDrawing->setPath('images/logo.jpg');
//$objDrawing->setCoordinates('B2');
//$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
$objPHPExcel->getActiveSheet()->setCellValue('A1', "IMPORT DATABASE KE EXCEL");
$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');
$objPHPExcel->getActiveSheet()->setCellValue('A2', "FONY REVINDASARI");
$objPHPExcel->getActiveSheet()->mergeCells('A3:D3');
$objPHPExcel->getActiveSheet()->setCellValue('A3', "NIM : 110533430524");
$objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
$objPHPExcel->getActiveSheet()->setCellValue('A4', "S1 PENDIDIKAN TEKNIK INFORMATIKA");
$objPHPExcel->getActiveSheet()->mergeCells('A5:D5');
$objPHPExcel->getActiveSheet()->setCellValue('A5', "2011 OFF B");
$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A1:D5')->getFont()->setSize(18);
$objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setSize(18);
$objPHPExcel->getActiveSheet()->getStyle('A1:D5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A1:D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing file" , EOL;
echo 'File has been created in ' , getcwd() , EOL;
