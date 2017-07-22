<?php 
/**
* Connect Database And All The Method Are Here
*/
class Database 
{
	protected $DB;
	public $Id;
	
	function __construct()
	{
		$this->DB = new mysqli('localhost','root','','perfolio');

		//chek the connect success or not
		// if(mysqli_connect_errno()){
		// 	echo "Connect Failed";
		// }else{
		// 	echo "Connect Success";
		// }
	}
	protected  final function Filter($value){

		return strip_tags(trim(mysqli_real_escape_string($this->DB,$value)));
	}
	public function Insert($table, $data){
		$c = 0;
		$sql = "insert into {$table} set ";
		foreach ($data as $key => $value) {
			if ($c>0) {
						$sql .= ", ";
					}
					$sql .="{$key} ='".$this->Filter($value)."'";
					$c =1;		
				}
		if($this->DB->query($sql)){
			$this->Id = $this->DB->insert_id;
			echo "Insert Success";
		}else{
			echo $this->DB->error;
		}

	}
	public function View($table ,$sel, $order){
		$sql = "select {$sel} from {$table}";
		if($order){
			$sql .= " order by {$order[0]} {$order[1]}";
		}
		 return $this->DB->query($sql);
	}
	public function Edit($table , $id){
		$sql = "select * from {$table} where id='".$this->Filter($id)."'";
		return $this->DB->query($sql);
	}
	public function Update($table , $data, $id){
		$c = 0;		
			$sql = "update {$table} set ";
			foreach($data as $key=>$value){
				if($c > 0){
					$sql .= ", ";				
				}
				$sql .= "{$key}='". $this->Filter($value) ."'";		
				$c= 1;
			}		
			$sql .= " where id= '".$this->Filter($id)."'";	
						
			if($this->DB->query($sql)){
				echo "Update Successful";
			}
			else{
				echo $this->DB->error;	
			}		
	}
	public function Delete($table, $id){
		$sql = "delete from {$table} where id='".$this->Filter($id)."'";
		$this->DB->query($sql);
		if(mysqli_affected_rows($this->DB) >0){
			echo "Delete Success";
		}

	}
	public function Count($table){
	    $sql = "select count('id') as total from $table";
	    $result = mysqli_query($this->DB, $sql);
        $value = mysqli_fetch_assoc($result);
        $num_row = $value['total'];
         echo $num_row;
    }
}



?>