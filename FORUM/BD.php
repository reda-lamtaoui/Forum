<?php
class BDD{
	public $pdo;
	private $stmt;
	public function __construct($sqlHost=null,$sqlDb=null,$sqlUser=null,$sqlPassword=null){
         try {
            // $this->pdo=new pdo('mysql:host=localhost;dbname=talkingspace',"root","");
            $this->pdo=new pdo('mysql:host='.$sqlHost.';dbname='.$sqlDb.'',"$sqlUser","$sqlPassword");
        }catch (PDOException $e) { //catch any error of type PDOException
            $this->error = $e->getMessage();
        }
	}
	// public function LoadData($sqlquery,$sqlParam=null,$sqlParam2=null){
 //        return $stmt->fetchall();
 //    }   
    public function LoadData(){
        $this->stmt->execute();
        return $this->stmt->fetchall();
    }   

	public function query($query){
        $pdo=$this->pdo;
        $this->stmt = $pdo->prepare($query);
        
    }
	// public function query($sqlquery){
	// 	$this->stmt = $this->pdo->prepare($sqlquery);
	// }	
	public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute(){
        return $this->stmt->execute();
    }
}

?>
