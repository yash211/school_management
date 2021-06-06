<?php
class Details_model extends CI_Model{

    public function __construct()
    {
        $this->db2=$this->load->database('second',true);
    }
    
    public function addUserDetails($tablename, $data){
		$data  = array_merge($data,$this->metaData());
		$this->db2->insert($tablename,$data);
		$this->db2->insert_id();
	}
	
	public function getfullyloggedIn($user_id){
		$query = "select is_fully_registered from user_fully_registered where user_id = $user_id";
		return $this->db2->query($query);
	}
	
	public function updateUserDetails($tablename, $data, $user_id){
		$this->db2->where('user_id', $user_id);
		$this->db2->update($tablename, $data);
	}
	
	public function getUser($table,$userid){
        $query="select * from $table where user_id=$userid";
        $result=$this->db2->query($query);
        return $result->row_array();
	}
    
	private function metaData(){
		date_default_timezone_set("Asia/Kolkata");
        $time = time();
        $created_at = date("Y-m-d H:i:s", $time);
        return array(
            'created_at'=>$created_at,
			'updated_at'=>$created_at,
            'deleted'=> 0
        );
	}
	 
}
?>