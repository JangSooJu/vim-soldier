<?php


class control extends Database {

	public function __construct( $db_host, $db_user, $db_pass, $db_name ) {
		parent::__construct( $db_host, $db_user, $db_pass, $db_name ) ;
	}

	public function categorySort($get){
		$query	= 'SELECT * FROM akino where category = "'. $get. '"';
		$data = $this->select($query);
		return $data;
	}
	
	public function wordSearch($get){
		$query	= 'SELECT * FROM akino where kana like "%'. $get. '%"';
		$data = $this->select($query);
		return $data;
	}

	public function allSelect(){
	    $query = "SELECT * FROM akino";
	    $data = $this->select($query);
	    return $data;
	}

	public function addSelect($arr){
		foreach($arr as $val){	
			$query = 'SELECT * FROM akino where id ="'. $val. '"';
			if(empty($data)){
				$data = array();
				array_push($data, $this->selectImg($query));
			}else{
				array_push($data, $this->selectImg($query));
			}
		}
		return $data;
	}
	
	public function detailOpen($get){
		$query = 'SELECT * FROM akino where id ="'. $get. '"';
	    $data = $this->select($query);
	    return $data;	
	}

	public function cartShow($arr){
		foreach($arr as $val){	
			$query = 'SELECT img FROM akino where id ="'. $val. '"';
			if(empty($data)){
				$data = array();
				array_push($data, $this->selectImg($query));
			}else{
				array_push($data, $this->selectImg($query));
			}
		}
		return $data;
	}
}


?>