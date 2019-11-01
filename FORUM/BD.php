<?php
class BDD{
	public $pdo;
	private $stmt;
	public function __construct($sqlHost,$sqlDb=null,$sqlUser,$sqlPassword){
         try {
            $this->pdo=new pdo('mysql:host='.$sqlHost.';dbname='.$sqlDb.'',"$sqlUser","$sqlPassword");
        }catch (PDOException $e) { //catch any error of type PDOException
            $this->error = $e->getMessage();
        }
	}
	public function LoadData($sqlquery,$sqlParam=null,$sqlParam2=null){
		$stmt = $this->pdo->prepare($sqlquery);
		$stmt->execute(array($sqlParam,$sqlParam2));
		return $stmt->fetchall();
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