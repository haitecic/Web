<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
include 'PHPExcel/IOFactory.php';
$inputFileName = 'files/example1.xls';
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objReader->setLoadAllSheets();
$objPHPExcel = $objReader->load($inputFileName);
//把所有擷取資料接成字串
/*
$SheetNames=$objPHPExcel->getSheetNames();
$i=0;
$j=0;
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
                                                          $rowstring=$rowstring . ";" .$cell->getValue();
                                                          $i=$i+1; 
                                                                                  }
                                      $arrayrow[$j]=$rowstring;

                                      $rowstring="";
                                      $i=0;
                                      $j=$j+1;
                                                                               }
                             $SheetData[$k]=implode(";", $arrayrow);
                             $j=0;  
							}
$content=implode(";", $SheetData);
echo $content;
*/
//var_dump($SheetData);
 

//以表單表示
$SheetNames=$objPHPExcel->getSheetNames();
$i=0;
$j=0;
$rowstring="";
$arrayrow=array();
foreach ($SheetNames as $k) {
                            $objWorksheet=$objPHPExcel->getSheetByName($k);
							
                            echo '<table>' . "\n";
                            foreach ($objWorksheet->getRowIterator() as $row) {
                            echo '<tr>' . "\n";
		
                            $cellIterator = $row->getCellIterator();
                            $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
                                                                               // even if it is not set.
                                                                               // By default, only cells
                                                                               // that are set will be
                                                                               // iterated.
                            foreach ($cellIterator as $cell) {
                            echo '<td>' . $cell->getValue() . '</td>' . "\n";
                            }
  
                            echo '</tr>' . "\n";
                                                                              }
                            echo '</table>' . "\n";
							echo "<br>";
                            }
?>
</html>