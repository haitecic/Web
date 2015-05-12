<?php
class Uploadkm_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();  //載入資料庫程式庫	
		date_default_timezone_set('Asia/Taipei');  //設定時區
	}
	public function create_data($Data)
	{
		for($m=2011; $m<=2015; $m++)
		{
		$i=0;

			foreach($Data[$m]['0'] as $title)
			{
					switch($title)
				{
					case "編號":
						$classid[$m]['idea_id']=$i;
						$i=$i+1;
						break;
					case "提案名稱":
						$classid[$m]['idea_name']=$i;
						$i=$i+1;
						break;
					case "創意提案來源":
						$classid[$m]['idea_source']=$i;
						$i=$i+1;
						break;
					case "提案說明":
						$classid[$m]['idea_description']=$i;
						$i=$i+1;
						break;	
					case "提案類別":
						$classid[$m]['inner_or_outer']=$i;
						$i=$i+1;
						break;
					case "階段狀態":
						$classid[$m]['stage']=$i;
						$i=$i+1;
						break;
					case "階段細項狀態":
						$classid[$m]['stage_detail']=$i;
						$i=$i+1;
						break;
					case "進度說明":
						$classid[$m]['progress_description']=$i;
						$i=$i+1;
						break;
					case "提案單位":
						$classid[$m]['proposed_unit']=$i;
						$i=$i+1;
						break;
					case "提案人":
						$classid[$m]['proposer']=$i;
						$i=$i+1;
						break;
					case "提案日期":
						$classid[$m]['proposed_date']=$i;
						$i=$i+1;
						break;
					case "有效提案":
						$classid[$m]['valid_project']=$i;
						$i=$i+1;
						break;
					case "立案日期":
						$classid[$m]['established_date']=$i;
						$i=$i+1;
						break;
					case "協辦單位":
						$classid[$m]['joint_unit']=$i;
						$i=$i+1;
						break;		
					case "協辦窗口":
						$classid[$m]['joint_person']=$i;
						$i=$i+1;
						break;
					case "承作廠商":
						$classid[$m]['co_worker']=$i;
						$i=$i+1;
						break;
					case "提案審核進度":
						$classid[$m]['idea_examination']=$i;
						$i=$i+1;
						break;
					case "I":
						$classid[$m]['Idea']=$i;
						$i=$i+1;
						break;
					case "R":
						$classid[$m]['Requirement']=$i;
						$i=$i+1;
						break;
					case "F":
						$classid[$m]['Feasibility']=$i;
						$i=$i+1;
						break;
					case "P":
						$classid[$m]['Prototype']=$i;
						$i=$i+1;
						break;	
					case "備註":
						$classid[$m]['note']=$i;
						$i=$i+1;
						break;	
					case "導入車型":
						$classid[$m]['adoption']=$i;
						$i=$i+1;
						break;			
					case "專利申請":
						$classid[$m]['applied_patent']=$i;
						$i=$i+1;
						break;	
					case "具備敗復活申請資格":
						$classid[$m]['resurrection_application_qualified']=$i;
						$i=$i+1;
						break;
					case "敗部復活申請與否":
						$classid[$m]['resurrection_applied']=$i;
						$i=$i+1;
						break;	
					case "創意中心窗口":
						$classid[$m]['PM_in_charge']=$i;
						$i=$i+1;
						break;
					case "結案":
						$classid[$m]['closed_case']=$i;
						$i=$i+1;
						break;							
					default:
						$i=$i+1;
						break;
				}
			}
			unset($Data[$m]['0']);

			foreach($Data[$m] as $Datayear)
			       {
//     			   echo $Datayear[$classid[$m]['idea_id']];
//				   echo $Datayear[$classid[$m]['idea_name']];
//				   echo $Datayear[$classid[$m]['idea_source']];
//				   echo $Datayear[$classid[$m]['idea_description']];
//				   echo $Datayear[$classid[$m]['inner_or_outer']];
//				   echo "<br>";
     			   $insertData=array('idea_id'=>$Datayear[$classid[$m]['idea_id']],
				   'idea_name'=>(string)$Datayear[$classid[$m]['idea_name']],
				   'idea_source'=>(string)$Datayear[$classid[$m]['idea_source']],
				   'idea_description'=>(string)$Datayear[$classid[$m]['idea_description']],
				   'inner_or_outer'=>(string)$Datayear[$classid[$m]['inner_or_outer']],
				   'stage'=>(string)$Datayear[$classid[$m]['stage']],
				   'stage_detail'=>(string)$Datayear[$classid[$m]['stage_detail']],
				   'progress_description'=>(string)$Datayear[$classid[$m]['progress_description']],
				   'proposed_unit'=>(string)$Datayear[$classid[$m]['proposed_unit']],
				   'proposer'=>(string)$Datayear[$classid[$m]['proposer']],
				   'proposed_date'=>$Datayear[$classid[$m]['proposed_date']],
				   'valid_project'=>(string)$Datayear[$classid[$m]['valid_project']],
				   'established_date'=>$Datayear[$classid[$m]['established_date']],
				   'joint_unit'=>(string)$Datayear[$classid[$m]['joint_unit']],
				   'joint_person'=>(string)$Datayear[$classid[$m]['joint_person']],
				   'co_worker'=>(string)$Datayear[$classid[$m]['co_worker']],
				   'idea_examination'=>(string)$Datayear[$classid[$m]['idea_examination']],
				   'Idea'=>(string)$Datayear[$classid[$m]['Idea']],
				   'Requirement'=>(string)$Datayear[$classid[$m]['Requirement']],
				   'Feasibility'=>(string)$Datayear[$classid[$m]['Feasibility']],
				   'Prototype'=>(string)$Datayear[$classid[$m]['Prototype']],
				   'note'=>(string)$Datayear[$classid[$m]['note']],
				   'adoption'=>(string)$Datayear[$classid[$m]['adoption']],
				   'applied_patent'=>(string)$Datayear[$classid[$m]['applied_patent']],
				   'resurrection_application_qualified'=>(string)$Datayear[$classid[$m]['resurrection_application_qualified']],
				   'resurrection_applied'=>(string)$Datayear[$classid[$m]['resurrection_applied']],
				   'PM_in_charge'=>(string)$Datayear[$classid[$m]['PM_in_charge']],
				   'closed_case'=>(string)$Datayear[$classid[$m]['closed_case']],
                   'year'=>$m);
				   $this->db->insert('project_all', $insertData);
			       }
       }
//		$Data = array('name'=>'123');
//		$this->db->insert('project_all', $Data);
echo "done";
	}
}
?>