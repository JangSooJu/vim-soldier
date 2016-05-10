//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<[$()ここから]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$(function()
{
//-------もろもろ作成-------------------------------------------------------
    $('div#select').append('<select id="sort"></select>');
    $('select#sort').append('<option value="all"> all </option>')
                    .append('<option value="zennsai"> zennsai </option>')
                    .append('<option value="syusai"> syusai </option>')
                    .append('<option value="syusyoku"> syusyoku </option>')
                    .append('<option value="add"> add </option>');

    $('div#search').append('<input id="searchwd" type="text" size="20"/>')
                   .append('<img id="homes" src="homeskunn.jpg" />');
    
    //var cart = window.sessionStorage.getItem(['cart']);
    //cartを便利にする
    
    $.cookie.json = true;
    var cart_arr = $.cookie('cart');
    //console.log(cart_arr);
    if( !cart_arr )
    {
        //console.log("a");
        cart_arr = Array();
    };
    //console.log(cart_arr);
    //$.removeCookie( "cart" ); 
//--------最初にallを表示------------------------------------------------------------
    //----------------------------------- 
    // 初期化作業
    //-----------------------------------
    var arrctg = new Array();
    for(var i=0 ; i < array.length ; i++)
    {	
		for(var y in array[i])
        {
            //imgのみタグつきで書き込む
            //console.log(cart_arr);
            var name_d = array[i][y].substr(0, array[i][y].length-4);
            if(y === "img" && jQuery.inArray(name_d, cart_arr) == -1)//cartに入っていなかったら)
            {
                listMakeAdd(arrctg, array[i][y], name_d);
            }else if(y === "img")
            {
                listMakeDel(arrctg, array[i][y], name_d);
            }
            else
            {     
                arrctg.push(y + " : " + array[i][y] + " <br/> ");
            }
        }
    }
    $("div#box").html(arrctg);		    

//----------sort---------------------------------------------------------------------
    $("div#select").change(function()
        {
        //categoryソート用の配列を用意・selectで選択されたcategoryを調べる
        var arr_category = new Array();
        var arrctg_s = new Array();
        var category = $("select#sort").val();
        //allの時は
        if( category === "all" )
        {
            for(var i=0 ; i < array.length ; i++)
            {	
                for(var a in array[i])
                {
                    //imgのみタグつきで書き込む
                    var name_s = array[i][a].substr(0, array[i][a].length-4);
                    //cartに入っていたら
                    if(a === "img" && jQuery.inArray(name_s, cart_arr) == -1)
                    {

                        listMakeAdd(arrctg_s, array[i][a], name_s);
                    }
                    else if(a === "img")
                    {
                        listMakeDel(arrctg_s, array[i][a], name_s);
                    }
                    else
                    {     
                        arrctg_s.push(a + " : " + array[i][a] + " <br/> ");
                    }
                }
            };
        $("div#box").html(arrctg_s);		    
        }   
        //addの時は
        else if( category === 'add')
        {   
            //cartにあるものだけの配列を作成
            for(var i = 0; i <  array.length; i++)
            {
                for(var b in array[i])
                {
                    //cartにはいっているもののみ配列に追加
                    if( b === "kana" && jQuery.inArray(array[i][b], cart_arr) !== -1 )
                    {
                        arr_category.push(array[i]);
                    }
                }
            };
            console.log(arr_category);
            for(var i=0 ; i < arr_category.length ; i++)
            {	
                for(var c in arr_category[i])
                {
                    //imgのみタグつきで書き込む
                    var name_s = arr_category[i][c].substr(0, arr_category[i][c].length-4);
                    if(c === "img")
                    {
                        listMakeDel(arrctg_s, arr_category[i][c], name_s);
                    }
                    else
                    {     
                        arrctg_s.push(c + " : " + array[i][c] + " <br/> ");
                    }
                }
            };
        console.log(arrctg_s);
        $("div#box").html(arrctg_s);		    
        }
        else
        //それ以外
        {
            for(var i = 0; i <  array.length; i++)
            {
                for(var d in array[i])
                {
                    //categoryが一致したもののみ配列に追加
                    if( d === "category" && array[i][d] === $("select#sort").val() )
                    {
                        arr_category.push(array[i]);
                    }
                }
            };
            //HTMLに書き込む文章を作成
            for(var i=0 ; i < arr_category.length ; i++)
            {	
		        for(var e in arr_category[i])
                {
                    //imgのみタグつきで書き込む
                    //arrToHtml(y,arr_category[i], arrctg2);
                    var name_s = arr_category[i][e].substr(0, arr_category[i][e].length-4);
                    if(e === "img" && jQuery.inArray(name_s, cart_arr) == -1 )
                    {
                        listMakeAdd(arrctg_s, arr_category[i][e], name_s);
                    }else if(e === "img")
                    {
                        listMakeDel(arrctg_s, arr_category[i][e], name_s);
                    }
                    else
                    {     
                        arrctg_s.push(e + " : " + arr_category[i][e] + " <br/> ");
                    } 
                }
	        }
        $("div#box").html(arrctg_s);	
        }
    });

//--------wordsearch---------------------------------------------------------------------
    $('img#homes').click(function()
    {
        //検索ワードを取得
        var sw = $('input#searchwd').val();
        var arrctg_w = new Array();
        var arr_sw = new Array();
        for(var i = 0; i <  array.length; i++)
        {
            for(var w in array[i])
            {
                //検索ワードに引っかかったものを配列に追加
                if( w === "kana" && array[i][w].match(sw) )
                {
                    arr_sw.push(array[i]);
                }
            }
        };
        //HTMLに書き込む文章を作成
        for(var i=0 ; i < arr_sw.length ; i++)
        {	
            for(var z in arr_sw[i])
            {
                //imgのみタグつきで書き込む
                var name_w = arr_sw[i][z].substr(0, arr_sw[i][z].length-4);
                if(z === "img" && jQuery.inArray(name_w, cart_arr) == -1 )
                {
                    listMakeAdd(arrctg_w, arr_sw[i][z], name_w);
                }else if(z === "img")
                {
                    listMakeDel(arrctg_w, arr_sw[i][z], name_w);
                }
                else
                {     
                    arrctg_w.push(z + " : " + arr_sw[i][z] + " <br/> ");
                }
            }
        }
        $("div#box").html(arrctg_w);	
    });
//--------画像が動くやつ-----------------------------------------------------------------------
/*    var flag = false;
    $("img#list")
        .mousedown(function()
        {
            flag = true;
            return false;
        })
        .mouseup(function()
        {
            flag = false;
        })
        .mousemove(function(e)
        {
            if(flag)
            {
                $(this).css(
                {
                    top: e.pageY -200, 
                    left: e.pageX -200
                })
            }
        });
*/

//-----searchのとこに空文字(？)挿入----------------------------------------------
    var str = 'search';
    $("input#searchwd")
        .addClass('watermark')
        .val(str)
        .focus(function()
        {
            $(this).removeClass('watermark');
            if ($(this).val() === str )
            {
                $(this).val('');
            }
        })
        .blur(function()
        {
            if($(this).val() === '')
            {
                $(this).val(str);
                $(this).addClass('watermark');
            }
        });
    
        $("form#search").submit(function()
                {
                    if(('input#searchwd').val === str)
                    {
                        $('input#searchwd').val('');
                    }
                });

//------カートに追加・削除----------------------------------------------------------------------------------
    $('button').on("click", function()
        {
            if($(this).attr("class") === "add")
            {
                addButton((this));
            }else
            {
                delButton((this));
            }
        });

    function addButton(that)
    {
        var flg    = $(that).attr('id'); 
        if(cart_arr == null)
        {
            console.log("a");
            cart_arr = $.cookie('cart');
        }
        else if(cart_arr.indexOf(flg) !=-1)
        {
            alert('既に登録されています');
        }
        else  if(cart_arr.length > 3)
        {
            alert('cart max!!');
            //cart_arr.splice(0, 1);
        }
        else
        {
            cart_arr.push(flg);    
            $(that).attr("class", "del"); 
            $(that).attr("value", "削除");
        }
        $.cookie('cart', cart_arr);
    };

    function delButton(that)
    {
        var flg    = $(that).attr('id'); 
        //flgReg = new RegExp(flg);
        //console.log(typeof $.cookie('cart'));
        if(cart_arr == null)
        {
            cart_arr = $.cookie('cart');
        }
        else
        {
            cart_arr.some(function(v, i)
            {
                if (v==flg) cart_arr.splice(i,1);    
            });
            $(that).attr("class", "add"); 
            $(that).attr("value", "追加");
        }
        $.cookie('cart', cart_arr);
    };
                
    function listMakeAdd(arrctg, arr, name )
    {
        arrctg.push('<a href="detail.php"><img id="list"  src="' + 
        arr + '" width="200" height="200" /></a><br/> <button type="button" id="' + name + 
        '" class="del">追加</button><br/> ');
    }

    function listMakeDel(arrctg, arr, name )
    {
        arrctg.push('<a href="detail.php"><img id="list"  src="' + 
        arr + '" width="200" height="200"></a><br/> <button id="' + name + 
        '" class="del" type="button" >削除</button><br/> ');
    }
});
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