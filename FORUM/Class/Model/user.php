<?php 
 class user {
 	private $DB;
 	private $id;
	private $name;
	private $email;
	private $avatar;
	private $username;
	private $about;
	private $lastActivity;
	private $joinDate;
	// public function __construct($Id=null){
	// 	$db=new sqlserver (DB_HOST,DB_NAME);
	// 	$request="select * from [user] where userID=?";
	// 	$requestParam=array(&ID);
	// 	$return=$db->loadData($request,$requestParam);
	// }
	public function __construct(){
				$fichier="DB.ini";
				$donnee=array();
				$groupe_recherche="correction";
				$item_recherche="Date";
				if(file_exists($fichier) && $fichier_lecture=file($fichier)){
				   foreach($fichier_lecture as $ligne)
				   {
				     if(preg_match("#^\[(.*)\]\s+$#",$ligne,$matches))
				     {
				        $groupe=$matches[1];
				        $donnee[$groupe]=array();
				     }
				     elseif($ligne[0]!=';')
				     {
				        list($item,$valeur)=explode("=",$ligne,2);
				        if(!isset($valeur)) // S'il n'y a pas de valeur
				             $valeur=''; // On donne une chaîne vide
				        $donnee[$groupe][$item]=$valeur;
				     }
				   }
				}else{
				echo "Le fichier est introuvable ou incompatible<br />";
			}
				$this->DB=new BDD(trim($donnee['base de donnee']['server']),trim($donnee['base de donnee']['dbname']),trim($donnee['base de donnee']['user']),trim($donnee['base de donnee']['password']));
		}
	public function sel($data){
		$aleat="?@".substr($data['name'],0,2)."!^^".substr($data['email'],2,4);
		return $data['password'].$aleat;
	}
	public function createUser($data){
		$DB=$this->DB;
		$DB->query('select * from users where Email=:email');
		$DB->bind(':email',$data['email']);
        $Results=$DB->loadData();
		if(empty($Results)) {
		$pass=password_hash($data['password'], PASSWORD_DEFAULT);
		$DB->query('insert into users(name,email,avatar,username,password,about,join_date,last_activity) values(:name,:email,:avatar,:username,:password,:about,:joinDate,:last)');
		$DB->bind(':name',$data['name']);
        $DB->bind(':email',$data['email']);
        $DB->bind(':avatar',$data['avatar']);
        $DB->bind(':username',$data['username']);
        $DB->bind(':password',$pass);
        // $DB->bind(':password',$data['password']);
        $DB->bind(':about',$data['about']);
        $DB->bind(':joinDate',$data['joinDate']);
        $DB->bind(':last',$data['lastActivity']);
        //Execute
        return $DB->execute();
		}else{
			return false;
		}
		
	}
	public function modifier($data,$ID){
		$DB=$this->DB;
		if (empty($data['password'])) {
			$DB->query('update users set name=:name,username=:username,about=:about where id=:id');
		$DB->bind(':id',$ID);
		$DB->bind(':name',$data['name']);
        $DB->bind(':username',$data['username']);
        $DB->bind(':about',$data['about']);
			$this->name=$data['name'];
			$this->username=$data['username'];
			$this->about=$data['about'];
		}else{
		$DB->query('update users set name=:name,username=:username,password=:password,about=:about where id=:id');
		$DB->bind(':id',$ID);
		$DB->bind(':name',$data['name']);
        $DB->bind(':username',$data['username']);
        $DB->bind(':password',password_hash($data['password'], PASSWORD_DEFAULT));
        $DB->bind(':about',$data['about']);
			$this->name=$data['name'];
			$this->username=$data['username'];
			$this->about=$data['about'];
        //Execute
        return $DB->execute();
        }
	}
	public function Login($email,$password){
		// $Req ="Select * from users where username=? and password=?";
		// $Results=$this->DB->loadData($Req,$username,$password);
		$DB=$this->DB;
		$DB->query('select * from users where Email=:email');
		$DB->bind(':email',$email);
        $Results=$DB->loadData();
		if(empty($Results)) {
			return false;
		}else{
foreach ($Results as $result) {
	if (password_verify($password,$result[5])==true) {
		$this->id=$result[0];
			$this->name=$result[1];
			$this->email=$result[2];
			$this->avatar=$result[3];
			$this->username=$result[4];
			$this->about=$result[6];
			$this->lastActivity=$result[8];
			return true;
	}else{
		return false;
	}
			
		}
		
		}		
	}
	public function loadUser($id){
		$DB=$this->DB;
		$DB->query('select * from users where id=:id');
		$DB->bind(':id',$id);
        $Results=$DB->loadData();
		if(empty($Results)) {
			die("introuvable");
		}else{
foreach ($Results as $result) {
			$this->id=$result[0];
			$this->name=$result[1];
			$this->email=$result[2];
			$this->avatar=$result[3];
			$this->username=$result[4];
			$this->about=$result[6];
			$this->lastActivity=$result[8];
		}
		}
	}
	public function getName(){
		return $this->name;
	}
	public function getAvatar($id=null){
		$DB=$this->DB;
		$DB->query('select * from users where id=:id');
		$DB->bind(':id',$id);
        $Results=$DB->loadData();
		if(empty($Results)) {
			return $this->avatar;
		}else{
foreach ($Results as $result) {
			return $result[3];
		}
		}
		
	}
	public function getId(){
		return $this->id;
	}
	public function getPassword(){
	}
	public function getEmail(){
		return $this->email;
	}
	public function getAbout(){
		return $this->about;
	}
	public function getUsername($id=null){
		$DB=$this->DB;
		$DB->query('select * from users where id=:id');
		$DB->bind(':id',$id);
        $Results=$DB->loadData();
		if(empty($Results)) {
			return $this->username;
		}else{
foreach ($Results as $result) {
			return $result[4];
		}
		}
		
	}
	public function getLastActivity(){
		return $this->lastActivity;
	}
 }
