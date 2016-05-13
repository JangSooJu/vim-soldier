var cartCookieFn = $(function()
{
  //cookie.jsというライブラリを使用し、そのための初期設定
  $.cookie.json = true;


  //--------addボタンとdelボタンを切り替える処理---------------------------------------------------------
  var changeButton = function(target,text){
    //配列の中身を出力するためのベストプラクティス
    var counter = 0;
    //isArrayはes5なのでie8で動かない。
    if(Array.isArray(target)){
      while (counter<target.length) {
        $("#button"+target[counter]).html(text);
        counter++;
      }
    }else {
      $("#"+target).html(text);
    }

  }


  //--------クッキーを編集する---------------------------------------------------------
  var cookieEdit = function(type,cart_arr,idCookie){
    if(type==="del"){
      //配列の中にある任意の文字列を削除するメソッド
      cart_arr.some(function(val,i){
        if (val==idCookie) cart_arr.splice(i,1);
      });
    }else if(type==="add"){
      cart_arr.push(idCookie);
    }
    $.cookie('cart', cart_arr);
    cartNumChange();
  }


  //--------クッキーを更新するかどうかを司る---------------------------------------------------------
  var cookieControl = function(target){
    var idTarget = target.attr('id');
    //buttonの文字を削除し、idの数字だけ拾ってくる。
    var idCookie = idTarget.slice(6);

    //
    if(target.html()=="削除") {
      cookieEdit("del",cart_arr,idCookie);
      changeButton(idTarget,"追加");

    //カート内の商品が４つだったらaddできないように
    }else if(cart_arr.length === 4){
      return false;

    //
    }else if(target.html()=="追加"){
      cookieEdit("add",cart_arr,idCookie);
      changeButton(idTarget,"削除");
    }
  }


  //--------クッキーを読み込む---------------------------------------------------------
  var cart_arr = $.cookie('cart');
  if( !cart_arr ){
    cart_arr = Array();
  }else{
    //addボタンとdelボタンを書き換える処理
    changeButton(cart_arr,"削除");
  }


  //--------カートの数字を書き換える---------------------------------------------------------
  var cartNumChange = function(){
    $('.label').html(cart_arr.length);
  }


  //--------パブリックメソッド---------------------------------------------------------

  $('.list button').on("click", function(){
    cookieControl($(this));
  });

  cartNumChange();

});
