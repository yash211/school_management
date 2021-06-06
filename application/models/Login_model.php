<?php
class Login_model extends CI_Model{

    public function __construct()
    {
		$this->db2= $this->load->database('second',true);
    }
    
    public function adduser($data){
        $data  = array_merge($data,$this->metaData());
		$this->db2->insert("user",$data);
		$this->db2->insert_id();
    }

    public function getUser($condn,$key){
		$query="select * from user where $condn='$key'";
		return $this->db2->query($query);
	}
	public function updateUser($username, $password){
		$query = "insert into user(username, password) values ('$username', '$password')";
		$this->db2->query($query);
	}
	public function insertFullyRegistered($user_id){
		$query = "insert into user_fully_registered(user_id, is_fully_registered) values ($user_id, 0)";
		$this->db2->query($query);
	}
	public function getUserFullyRegistered($user_id){
		$query="select is_fully_registered from user_fully_registered where user_id='$user_id'";
		return $this->db2->query($query);
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