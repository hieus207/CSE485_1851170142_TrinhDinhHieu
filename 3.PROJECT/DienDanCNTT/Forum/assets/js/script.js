


function Edit_Cm(cm_id,p_id){
    var jParent=document.getElementsByClassName('cmt_id'+cm_id);
    // Thang nao bi tac dong
    var jTest=document.getElementById('add_cmt');
    var jForm=jTest.cloneNode();
    // alert(jForm.outerHTML);
    var test=jParent[0].childNodes[1].childNodes[3];
    var div = document.createElement("div"); 
    var test2=jParent[0].childNodes[1].childNodes[3].childNodes[1].textContent.trim();
    
div.innerHTML = 
'<div class="comment-body">'+
'<form id="add_cmt" action="http://localhost:8080/Forum/index.php?controller=posts&action=edit_c&cm_id='+cm_id+'" method="post">'+
'<input type="hidden" class="form-control" name="post_id" value="'+p_id+'">'+
'<div class="form-group">'+
'<textarea class="form-control" name="body" id="body" rows="5">'+test2+'</textarea>'+
'</div>'+
'<button type="submit" name="add_comment" class="btn btn-primary float float-right">Comment</button>'+
'</form>'+
'</div>';
    test.innerHTML=div.outerHTML;
    // console.log(test2);
}

function check(){
    var cball = document.getElementsByClassName("checkall");
    var checkbox = document.getElementsByClassName("cb1");
    for(i=0;i<checkbox.length;i++)
    {
        if(cball[0].checked==true)
        checkbox[i].checked=true;
        else
        checkbox[i].checked=false;
    }
    
}
$(document).ready(function(){
    $('.nav-bar a').click(function(){
        $('.nav-bar a').removeClass('active');
        $(this).addClass('active');
    })

    $('.newest').click(function(){
        $('.slider').hide();
        $('.post-new').show();
    })

    $('.home').click(function(){
        $('.slider').show();
        $('.post-new').hide();
    })
})