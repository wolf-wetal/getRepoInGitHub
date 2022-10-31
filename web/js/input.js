
function  inputSave (data) {
    let inpName = document.getElementById("inpt_name_"+data);
/*    console.log(data);
    console.log(inpName.value);*/
    let postForm = {
        'id'     : data,
        'nickname'   : inpName.value,
    };
    $.ajax({
        type: "POST",
        url: '/index.php?r=users/update',
        dataType: 'json',
        data: postForm,
        success: function(result){console.log(result);},
        error: function(err){console.log(err);}
    });
}
