//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<[$()��������]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$(function()
{
//-------�������쐬-------------------------------------------------------
    
    $.cookie.json = true;
    var cart_arr = $.cookie('cart');
    if( !cart_arr )
    {
        cart_arr = Array();
    };

//------�J�[�g�ɒǉ��E�폜----------------------------------------------------------------------------------
    $('button').on("click", function()
        {
            console.log("a");
            if($(this).attr("class") === "add")
            {
                addButton((this));
            }
            else
            {
                delButton((this));
            }
        });

    function addButton(that)
    {
        var flg    = $(that).attr('id'); 
        if(cart_arr == null)
        {
            cart_arr = $.cookie('cart');
        }
        else if(cart_arr.indexOf(flg) !=-1)
        {
            alert('���ɓo�^����Ă��܂�');
        }
        else  if(cart_arr.length > 3)
        {
            alert('cart max!!');
            //cart_arr.splice(0, 1);
        }
        else
        {
            console.log("a");
            cart_arr.push(flg);    
            $(that).attr("class", "del"); 
            $(that).text("�폜");
        };
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
            console.log("d");
            cart_arr.some(function(v, i)
            {
                if (v==flg) cart_arr.splice(i,1);    
            });
        $(that).attr("class", "add"); 
        $(that).text("�ǉ�");
        };
        $.cookie('cart', cart_arr);
    };

    function listMakeAdd(arrctg, arr, name )
    {
        arrctg.push('<a href="detail.php?name=' + name + '"><img id="list"  src="./img/' + 
        arr + '" width="200" height="200" /></a><br/> <button type="button" id="' + 
        name + '" class="add">�ǉ�</button><br/> ');
    };

    function listMakeDel(arrctg, arr, name )
    {
        arrctg.push('<a href="detail.php?name=' + name + '"><img id="list"  src="./img/' + 
        arr + '" width="200" height="200"></a><br/> <button id="' + 
        name + '" class="del" type="button" >�폜</button><br/> ');
    };

});
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<[$()�����܂�]>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
