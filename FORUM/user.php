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
		$pass=password_hash($this->sel($data), PASSWORD_DEFAULT);
		$DB->query('insert into users(name,email,avatar,username,password,about,join_date) values(:name,:email,:avatar,:username,:password,:about,:joinDate)');
		$DB->bind(':name',$data['name']);
        $DB->bind(':email',$data['email']);
        $DB->bind(':avatar',$data['avatar']);
        $DB->bind(':username',$data['username']);
        // $DB->bind(':password',$pass);
        $DB->bind(':password',$data['password']);
        $DB->bind(':about',$data['about']);
        $DB->bind(':joinDate',$data['joinDate']);
        //Execute
        return $DB->execute();
	}
	public function Login($username,$password){
		// $Req ="Select * from users where username=? and password=?";
		// $Results=$this->DB->loadData($Req,$username,$password);
		$DB=$this->DB;
		$DB->query('select * from users where username=:username and password=:password');
		$DB->bind(':username',$username);
        $DB->bind(':password',$password);
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
			$this->lastActivity=$result[7];
		}
		}		
		
	}

	public function getName(){
		return $this->name;
	}
	public function getId(){
		return $this->id;
	}

	public function getPassword(){

	}
	public function getEmail(){
		return $this->email;
	}
	public function getUsername(){
		return $this->username;
	}

 }
