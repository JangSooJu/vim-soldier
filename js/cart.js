var cartFn = $(function()
{
  //--------オブジェクト宣言---------------------------------------------------------







});


//------カートに追加・削除----------------------------------------------------------------------------------
    // $('button').on("click", function()
    //     {
    //         console.log("a");
    //         if($(this).attr("class") === "add")
    //         {
    //             addButton((this));
    //         }
    //         else
    //         {
    //             delButton((this));
    //         }
    //     });
    //
    // function addButton(that)
    // {
    //     var flg    = $(that).attr('id');
    //     if(cart_arr == null)
    //     {
    //         cart_arr = $.cookie('cart');
    //     }
    //     else if(cart_arr.indexOf(flg) !=-1)
    //     {
    //         alert('既に登録されています');
    //     }
    //     else  if(cart_arr.length > 3)
    //     {
    //         alert('cart max!!');
    //         //cart_arr.splice(0, 1);
    //     }
    //     else
    //     {
    //         console.log("a");
    //         cart_arr.push(flg);
    //         $(that).attr("class", "del");
    //         $(that).text("削除");
    //     };
    // $.cookie('cart', cart_arr);
    // };
    //
    // function delButton(that)
    // {
    //     var flg    = $(that).attr('id');
    //     //flgReg = new RegExp(flg);
    //     //console.log(typeof $.cookie('cart'));
    //     if(cart_arr == null)
    //     {
    //         cart_arr = $.cookie('cart');
    //     }
    //     else
    //     {
    //         console.log("d");
    //         cart_arr.some(function(v, i)
    //         {
    //             if (v==flg) cart_arr.splice(i,1);
    //         });
    //     $(that).attr("class", "add");
    //     $(that).text("追加");
    //     };
    //     $.cookie('cart', cart_arr);
    // };
    //
    // function listMakeAdd(arrctg, arr, name )
    // {
    //     arrctg.push('<a href="detail.php?name=' + name + '"><img id="list"  src="./img/' +
    //     arr + '" width="200" height="200" /></a><br/> <button type="button" id="' +
    //     name + '" class="add">追加</button><br/> ');
    // };
    //
    // function listMakeDel(arrctg, arr, name )
    // {
    //     arrctg.push('<a href="detail.php?name=' + name + '"><img id="list"  src="./img/' +
    //     arr + '" width="200" height="200"></a><br/> <button id="' +
    //     name + '" class="del" type="button" >削除</button><br/> ');
    // };


//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<[$()ここまで]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

//---関数作ってやると()関係でうまく動いてくれなかったので一時的に外してる-----------
///array.splice(n, n, [])
//第一：どこから
//第二：なんこ取り除く
//第三：その後なにを入れるか

/*ここは検索の条件が違うので使うのは難しそう
function makelist( )
{
    console.log($(this).val());
    //ここでarrayの中からcategoryソートをおこなう
    var arr_category = new Array();
    var category = $("select#sort").val();
    //console.log(category);
    //console.log(array[0]);

    for(var i = 0; i <  array.length; i++)
    {
        for(var k in array[i])
        {
            console.log($("select"));
            if( k === "category" && array[i][k] == $("select#sort").val() )
            {
                arr_category.push(array[i]);
            }
        }
    };

    //console.log(arr_category);

	for(var i=0 ; i < arr_category.length ; i++)
    {
		for(var v in array_category[i]){
		    var arr = arr_category[i];
			arrToHtml(v,arr);
        }
	}
};
*/


//emptyがなかったので作った。うまく動かない
/*
function empty(e) {
  switch (e) {
    case " ":
    case  0 :
    case "0":
    case null:
    case false:
    case typeof this == "undefined":
      return true;
    default:
      return false;
  }
};
*/

//----foreach論争の発端-------------------------------------
/*
Array.prototype.in_array = function(val) {
    for(var i = 0, l = this.length; i < l; i++) {
        if(this[i] == val) {
            return true;
        }
    }
    return false;
}

//jsでのforeach
//phpとはkeyとvalueが逆
function logArrayElements(val, key2) {
		val.forEach(function logArrayElements(val, key){
			console.log("a["+ key2 + key + "] = " + val);
		});
}
*/

/*
無名オブジェクト　匿名オブジェクト
配列として認識されない...？
for文とfor inをよく使う
*/
