<?php 
 class topic {
 	private $DB;
 	private $categorie_ID;
 	private $user_id;
 	private $title;
 	private $body;
 	private $last_activity;
 	private $create_data;
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
	public function loadTopic($id){
		$DB=$this->DB;
		$DB->query('select * from topics where id=:id');
		$DB->bind(':id',$id);
        $Results=$DB->loadData();
		if(empty($Results)) {
			die("introuvable");
		}else{
foreach ($Results as $result) {
			$this->id=$result[0];
			$this->categorie_ID=$result[1];
			$this->user_id=$result[2];
			$this->title=$result[3];
			$this->body=$result[4];
			$this->last_activity=$result[5];
			$this->create_data=$result[6];
		}
		}		
	}
		public function loadAllTopic($id){
		$DB=$this->DB;
		$DB->query('select * from topics');
		$DB->bind(':id',$id);
        $Results=$DB->loadData();
			return $Results;
	}
	public function createTopic($data){
		$DB=$this->DB;
		$DB->query('insert into topics(categorie_ID,user_id,title,body,last_activity,create_data) values(:categorie_ID,:user_id,:title,:body,:last_activity,:create_data)');
		$DB->bind(':categorie_ID',$data['categorie_ID']);
        $DB->bind(':user_id',$data['user_id']);
        $DB->bind(':title',$data['title']);
        $DB->bind(':body',$data['body']);
        // $DB->bind(':password',$pass);
        $DB->bind(':last_activity',$data['last_activity']);
        $DB->bind(':create_data',$data['create_data']);
        //Execute
        return $DB->execute();
	}

	public function getCategorie_ID(){
		return $this->categorie_ID;
	}
	public function getuser_id(){
		return $this->user_id;
	}
	public function getTitle(){
	}
	public function getBody(){
		return $this->body;
	}
	public function getlast_activity(){
		return $this->last_activity;
	}
	public function getcreate_data(){
		return $this->create_data;
	}
 }