  <?php
 
class Item
{
	public $cateArr = array();
    public $dbh      = NULL;

    public function __construct( $dbh )
    {
        $this->dbh = $dbh;
    }      

  public function getItemList( $ctg_id )
    {
        //カテゴリーによって表示させるアイテムをかえる
        
        $table  = ' item ';
        $col    = ' item_id, item_name,detail, price,image, ctg_id,delete_flg';
        $where  = ( $ctg_id !== '' ) ? '  ctg_id = ? ': '';
        $arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
        
        $res = $this->dbh->select( $table, $col, $where, $arrVal );
        
        return ( $res !== false && count( $res ) !== 0 ) ? $res : false;
    }
	
	//表示の有無によって表示させるアイテムを変える
	public function getAllItemList( $delete_flg )
	{
		$table = 'item';
		$col = 'item_id,item_name';
		$where = ( $delete_flg !== '' ) ? '  delete_flg = ? ': '';
		$arrVal =  ( $delete_flg !== '' ) ? array( $delete_flg) :array();
		$res = $this->dbh->select( $table, $col, $where, $arrVal );
		var_dump($res);
		// public $item_id;
		// public $item_name;
		// public static $count =0;
		// function getList($res){
//			foreach ( $res as $key => $value){
				// $obj = new getAllItemList;
			//	$obj->item_id = $key;
			//	$obj->item_name = $value;
			//	$objlist[] = $obj;
			//$id = $key;
			//$name = $value;
//			echo "Value: ";
//			var_dump($value);
//			echo "<br />\n";
//			}
			// return $objlist;
		// }
//		echo "<br><br>idを出力<br><br>";
 //       var_dump($id);
        return ( $res !== false && count( $res ) !== 0 ) ? $res : false;
	}
	
	
       public function insCartData( $item_id,$item_name,$detail,$price,$image,$ctg_id,$delete_flg )
        {   
//			echo "<br>".$item_id.$item_name.$price.$image.$ctg_id."<br>";
            $table   = ' item ';
            $insData = array( 'item_id' => $item_id, 'item_name' =>$item_name, 'detail'=>$detail,'price' =>$price, 'image' =>$image, 'ctg_id' => $ctg_id,'delete_flg'=>$delete_flg);
			var_dump($insData);
            return $this->dbh->insert( $table, $insData );
        }

       public function delCartData( $item_id )
        {
            $table = ' item ';
            $insData = array( 'delete_flg'=> 1 );
            $where =' item_id = ? ';
            $arrWhereVal = array( $item_id );
            
            return $this->dbh->update( $table, $insData, $where, $arrWhereVal);
        }
		
		public function editData( $item_id,$item_name,$detail,$price,$image,$ctg_id,$delete_flg )
		{
			$table   = ' item ';
            $editData = array('item_name' =>$item_name, 'detail'=>$detail,'price' =>$price, 'image' =>$image, 'ctg_id' => $ctg_id, 'delete_flg' =>$delete_flg );
			$where =' item_id = ?';
            $arrWhereVal = array( $item_id );
			echo "<br>";
			var_dump($table);
			echo "<br>";
			var_dump($editData);
			echo "<br>";
			var_dump($where);
			echo "<br>";
			var_dump($arrWhereVal);
			echo "<br>";
			return $this->dbh->update( $table, $editData,$where, $arrWhereVal);
		}
}
		?>