<?php
class BDD{
	public $pdo;
	private $stmt;
	public function __construct($sqlHost,$sqlDb=null,$sqlUser,$sqlPassword){
		$this->pdo=new pdo('mysql:host='.$sqlHost.';dbname='.$sqlDb.'',"$sqlUser","$sqlPassword");
	}
	public function LoadData($sqlquery,$sqlParam=null){
		$stmt = $this->pdo->prepare($sqlquery);
		$stmt->execute(array($sqlParam));
		return $sth->fetchall();
	}	
	public function query($query){
        $this->stmt = $this->pdo->prepare($query);
        
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