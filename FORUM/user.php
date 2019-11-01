<?php 
 class user {
 	public $DB;
 	public $id;
	public $name;
	public $email;
	public $avatar;
	public $username;
	public $password;
	public $about;
	public $lastActivity;
	public $joinDate;
	// public function __construct($Id=null){
	// 	$db=new sqlserver (DB_HOST,DB_NAME);
	// 	$request="select * from [user] where userID=?";
	// 	$requestParam=array(&ID);
	// 	$return=$db->loadData($request,$requestParam);
	// }
	public function __construct(){
		$this->DB=new BDD("localhost","talkingspace","root","");
		}

	public function createUser($data){
		$DB=$this->DB;
		$DB->query('insert into users(name,email,avatar,username,password,about,join_date) values(:name,:email,:avatar,:username,:password,:about,:joinDate)');
		$DB->bind(':name',$data['name']);
        $DB->bind(':email',$data['email']);
        $DB->bind(':avatar',$data['avatar']);
        $DB->bind(':username',$data['username']);
        $DB->bind(':password',$data['password']);
        $DB->bind(':about',$data['about']);
        $DB->bind(':joinDate',$data['joinDate']);
        //Execute
        return $DB->execute();
	}
	public function Login($username,$password){
		$Req ="Select * from users where username=? and password=?";
		$Results=$this->DB->loadData($Req,$username,$password);
		if(empty($Results)) {
			
		}else{
foreach ($Results as $result) {
			$this->id=$result[0];
			$this->name=$result[1];
			$this->email=$result[2];
			$this->avatar=$result[3];
			$this->username=$result[4];
			$this->password=$result[5];
			$this->about=$result[6];
			$this->lastActivity=$result[7];
		}
		}
		
	}

	public function getPrenom(){
	}

	public function getPassword(){
	}

 }