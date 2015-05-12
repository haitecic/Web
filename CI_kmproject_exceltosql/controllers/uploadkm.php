<?php
class Uploadkm extends CI_Controller{
	public function __construct()
	{
		parent::__construct();		
		$this->load->helper('form');  //載入Form輔助函數
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('html');  		
		$this->load->model('uploadkm_model');  //載入已定義的模型與資料庫做連接		
		//$this->output->cache(180);
		//取消快取	
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');  
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}

	public function upload_km()
	{
	include 'application/libraries/Smalot/Classes/PHPExcel/IOFactory.php';//載入PHPExcel
	$inputFileName = 'file/ABC.xls';//載入要轉的檔案
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader->setLoadAllSheets();
	$objPHPExcel = $objReader->load($inputFileName);
	$SheetNames=$objPHPExcel->getSheetNames();
	$i=0;
	$j=0;
echo <<<_END
<html>
<head><meta charset="utf-8" />
<link type="text/css" href="css/manageScreen.css" rel="stylesheet" />
</head>
_END;
	$rowstring="";
	$arrayrow=array();
	foreach ($SheetNames as $k) {
								$objWorksheet=$objPHPExcel->getSheetByName($k);
								foreach ($objWorksheet->getRowIterator() as $row) {
								$cellIterator = $row->getCellIterator();
								$cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
																				// even if it is not set.
																				// By default, only cells
																				// that are set will be
																				// iterated.
																				foreach ($cellIterator as $cell) {
																				$Data[$k][$i][$j]=$cell->getValue();
																				$j=$j+1;
																				}
								$j=0;
								$i=$i+1;
								}
								$i=0;
                                }
	$this->uploadkm_model->create_data($Data);
	}





}
?>