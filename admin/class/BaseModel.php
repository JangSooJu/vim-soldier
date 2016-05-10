<?php

/**
 * Description of Auth
 *
 * @author AKI
 */
class BaseModel {
    
    public $pdo;
            
    public function __construct() {
        $this->db_connect();
    }

    //----------------------------------------------------
    // データベース接続
    //----------------------------------------------------
    public function db_connect(){
        try {
          $this->pdo = new PDO(_DSN, _DB_USER, _DB_PASS);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $Exception) {
          die('エラー :' . $Exception->getMessage());
        }
    }


    
    
}

?>
