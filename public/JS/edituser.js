$(document).ready(function(){
    $('#save').prop('disabled',true);
    $('#password2').focusout(function(){
        var pass1 = $('#password1').val();
        var pass2 = $('#password2').val();

        if(pass2 != pass1){
            $('#save').prop('disabled',true);
        }else{
            $('#save').prop('disabled',false);
        }
    });
});
