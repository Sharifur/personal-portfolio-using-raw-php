<?php 

Class Admin extends Database{

	public function login($email, $password){

		$sql =  "select * from users where email='".$this->Filter($email)."' and password='".md5($this->Filter($password))."'";

		return $this->DB->query($sql);
	}

}

















?>