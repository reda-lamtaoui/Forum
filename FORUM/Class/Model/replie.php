<?php 
 class categorie {
 	private $DB;
 	private $id;
 	private $name;
	private $description;
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
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
// 	public function getName($id){
// 		$DB=$this->DB;
// 		$DB->query('select * from categories where id=:id');
// 		$DB->bind(':id',$id);
//         $Results=$DB->loadData();
// 		if(empty($Results)) {
// 			die("introuvable");
// 		}else{
// foreach ($Results as $result) {
// 			return $result[1];
// 		}
// 		}		
// 	}
	public function getDescription($id=null){
		return $this->description;
	}
// 	public function getDescription($id){
// 		$DB=$this->DB;
// 		$DB->query('select * from categories where id=:id');
// 		$DB->bind(':id',$id);
//         $Results=$DB->loadData();
// 		if(empty($Results)) {
// 			die("introuvable");
// 		}else{
// foreach ($Results as $result) {
// 			return $result[2];
// 		}
// 		}		
// 	}
	public function loadAllCategories(){
		$DB=$this->DB;
		$DB->query('select * from categories');
        $Results=$DB->loadData();
			return $Results;
	}
 }