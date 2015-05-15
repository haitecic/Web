<html>
<head>
<meta charset='utf-8'>
</head>
<?php
//將資料夾中的檔案，藉由unoconv+libreoffice轉換成pdf，再由imagemagick將pdf轉成圖片jpg，pdftotext將pdf轉換成txt，並將路徑存入對應資料表

//連結到本機端資料庫project_resource
$database_host="localhost";
$username="root";
$password="";
$database_name="project_resource";
$db_connect=mysql_connect($database_host, $username, $password);
$db_select=mysql_select_db($database_name);
mysql_query("SET NAMES utf8");//與資料庫傳遞時中文編碼確認

include 'PHPExcel/IOFactory.php';
$file_path="files/2014/*";
$file_array=glob($file_path);
$x=0;
foreach($file_array as $file)
        {
		$inputFileName = $file;
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setLoadAllSheets();
		$objPHPExcel = $objReader->load($inputFileName);
		$SheetNames=$objPHPExcel->getSheetNames();
		$i=0;
		$j=0;
		$rowstring="";
		$arrayrow=array();
		//echo "file:" . $file;
		//echo "<br>";
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
									$text=preg_replace('/\n/','<br>',$cell->getValue());
									$text=preg_replace('/\s/','&nbsp' ,$text);
									$Data[$x][$i][$j]=$text;
									$j=$j+1;
									}
											if($i>=5 && !empty($Data[$x][$i][3]))
												{				
												//echo $i;
												//echo "<br>";
												//var_export($Data[$x][$i][2]);
												//echo "<br>";
												//if($Data[$x][$i][2]=='') echo "yes";
												$file_name=explode('/', $file);
												$datetime=explode('.', $file_name[2]);
												if($Data[$x][$i][2]=='')
												{
												$query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
														value ('{$Data[$x][$i-1][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
														if($Data[$x][$i-1][2]=='')
														  {
														  $query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
																value ('{$Data[$x][$i-2][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
																if($Data[$x][$i-2][2]=='')
																	{
																	$query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
																	value ('{$Data[$x][$i-3][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
																	if($Data[$x][$i-3][2]=='')
																		{
																		$query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
																		value ('{$Data[$x][$i-4][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
																		if($Data[$x][$i-4][2]=='')
																			{
																			$query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
																			value ('{$Data[$x][$i-5][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
																			if($Data[$x][$i-5][2]=='')
																				{
																				$query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
																				value ('{$Data[$x][$i-6][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
																				}
																			}
																		}
																	}
														  }
												}
												else
												{
												$query="insert into vp_meeting (topic, content, in_charge, file_name, time, people)
														value ('{$Data[$x][$i][2]}', '{$Data[$x][$i][3]}', '{$Data[$x][$i][4]}', '{$file_name[2]}', '{$datetime[0]}', '{$Data[$x][3][2]}')";
												}
												//echo "<br>";
												//echo $query . "<br><br>";
												mysql_query($query);
												}
									$j=0;
									$i=$i+1;
									}
									$i=0;
                            }

		$x=$x+1;
		}
		echo "successful";
		

?>
</html>