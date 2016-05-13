<?php

require_once( 'Database.class.php');
require_once( 'CheckError.class.php');
require_once( '../smarty/libs/Smarty.class.php' );
require_once( 'config.php');

$smarty = new Smarty();
$db     = new Database( DB_HOST , DB_USER , DB_PASS , DB_NAME );
$checkError = new CheckError();

// テンプレートディレクトリ指定
$smarty->template_dir = './template';
$smarty->compile_dir  = './template_c';

//選択肢リスト

$item_name        = ( isset ( $_POST['item_name'] ) === true ) ? $_POST['item_name'] : '';
$price         = ( isset ( $_POST['price'] ) === true ) ? $_POST['price'] : '';
$file_name ="none";

$arr_err_msg = array(
    "item_name"        => '',
    "price"         => '',
    "image"       => '',
);

$arr_form = array(
    "item_name" =>$item_name,
    "price"  =>$price,
);

if ( isset ( $_POST['send'] ) === true )
{
    $arr_err_msg = $checkError->errorCheck( $arr_form, $_FILES );
    $check_flg = $checkError->getErrorFlg();
    
    if( $check_flg === true )
    {
        $file_name = (  $_FILES["image"]["error"]  !== 4 ) ? time().".jpg" : 'none';

        $query = ""
            ."INSERT INTO "
            ."     item_tb "
            ." ( "
            ." item_name, "
            ." price, "
            ." image "
            ." ) values ("
            .  $db->str_quote( $item_name ) .","
            .  $db->quote( $price ) .","
            .  $db->str_quote( $file_name )
            ." ) ";
        $res = $db->execute( $query );
        
        if( $res !== false )
        {
            //ファイルUP
            if( $file_name !== 'none')
            {
                if( move_uploaded_file( $_FILES['image']['tmp_name'] , './' . $file_name ) === true )
                {
                    echo "success!";
                    exit;
                }
            }
            else
            {
                echo "success!";
                exit;
            }


        }else{
            echo "データ入力に失敗しました。";
            exit;
        }

    }

}

//データの選択
//ヒアドキュメント
$query = <<< EOF
     SELECT 
        item_name, 
        price,
        image 
      FROM 
        item_tb 
EOF;
$arrItem = $db->select($query);
$smarty->assign( 'arr_form', $arr_form );
$smarty->assign( 'arr_err_msg' , $arr_err_msg );
$smarty->assign( 'arrItem' , $arrItem);

$smarty->display( 'exam3.tpl');
