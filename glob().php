<?php
//用glob，array_filter存取並區分資料夾以及檔案路徑

$dir_files=glob('/var/www/html/project_management/application/assets/project_attachment/77*', GLOB_MARK);//GLOB_MARK：資料夾檔案名稱後面加上斜線
$dirs = array_filter($dir_files, "isdir");
$flies = array_filter($dir_files, "isfile");

function isdir($path_dir_string)
                {
				$end_string=substr($path_dir_string, -1);
			    if($end_string=="/")
				  {
				  return true;
				  }
				return false;
				}
function isfile($path_dir_string)
                {
				$end_string=substr($path_dir_string, -1);
			    if($end_string=="/")
				  {
				  return false;
				  }
				return true;
				}
				
echo "dirs:";
echo "<br>";
var_dump($dirs);
echo "<br><br>";
echo "files:";
echo "<br>";
var_dump($flies);

//執行成果
/*
dirs:
array(15) { [0]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6671/" 
			[1]=> string(84) "/var/www/html/project_management/application/assets/project_attachment/6671_convert/" 
			[2]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6672/" 
			[3]=> string(84) "/var/www/html/project_management/application/assets/project_attachment/6672_convert/" 
			[4]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6673/" 
			[5]=> string(84) "/var/www/html/project_management/application/assets/project_attachment/6673_convert/" 
			[6]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6674/" 
			[7]=> string(84) "/var/www/html/project_management/application/assets/project_attachment/6674_convert/" 
			[8]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6675/" 
			[9]=> string(84) "/var/www/html/project_management/application/assets/project_attachment/6675_convert/" 
			[10]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6676/" 
			[11]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6677/" 
			[12]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6678/" 
			[13]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6679/" 
			[14]=> string(76) "/var/www/html/project_management/application/assets/project_attachment/6680/" } 

files:
array(0) { }
*/
?>