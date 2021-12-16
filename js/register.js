// If user clicks anywhere outside of the modal, Modal will close
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



function func(){
    var registerForm=document.getElementById('register-form');
    var loginForm=document.getElementById('login-form');
    if(registerForm.style.display=='none'){
        registerForm.style.display='block';
        loginForm.style.display='none';
    }
    else{
        registerForm.style.display='none';
        loginForm.style.display='block';
    }

}


$(function(){
	//get the form
    var form=$('#register-form');
    //get the messages div
    var msgDiv=$('#message');
    //
    $(form).submit(function(event){
    //Stop the browser from submitting the form
	event.preventDefault();
    //serialize the form data
    var formData=$(form).serialize();
    //submit the form using AJAX
    $.ajax({
    	type:'POST',
    	url:$(form).attr('action'),
    	data:formData,
        beforeSend:function(){
                 $(msgDiv).html('<div class="spinner-border" role="status"<span class="sr-only">Loading...</span> </div>')
                
              
             },

    	success:function(msg){
    		if(msg=='OK'){
    			$(msgDiv).removeClass('alert alert-danger');
    			$(msgDiv).addClass('alert alert-success');
                $(msgDiv).text('Sign Up Succeded');
                $('#username').val('');
                $('#email').val('');
                $('#password').val('');
    		}else{
    			$(msgDiv).addClass('alert alert-danger');
    			$(msgDiv).text(msg);
    		}
    	}
    });
    });
});

$(function(){
    //get the form
    var form=$('#comments-form');
    //get the messages div
    var msgDiv=$('#cm-messages');
    //
    $(form).submit(function(event){
    //Stop the browser from submitting the form
    event.preventDefault();
    //serialize the form data
    var formData=$(form).serialize();
    //submit the form using AJAX
    $.ajax({
        type:'POST',
        url:$(form).attr('action'),
        data:formData,
        beforeSend:function(){
                 $(msgDiv).html('<div class="spinner-border" role="status"<span class="sr-only">Loading...</span> </div>')
                
              
            },

        success:function(msg){
            if(msg=='ok'){
                location.reload(true/false);
            }else{
                $(msgDiv).addClass('alert alert-danger');
                $(msgDiv).text(msg);
            }
        }
    });
    });
});

$(function(){

    //get the form
    var form=$('#login-form');
    //get the messages div
    var msgDiv=$('#log-message');
    //
    $(form).submit(function(event){
    //Stop the browser from submitting the form
    event.preventDefault();
    //serialize the form data
    var formData=$(form).serialize();
    //submit the form using AJAX
    $.ajax({
        type:'POST',
        url:$(form).attr('action'),
        data:formData,
        beforeSend:function(){
                 $(msgDiv).html('<div class="spinner-border" role="status"<span class="sr-only">Loading...</span> </div>')
                
              
            },

        success:function(msg){
            if(msg=='OK'){
                $(msgDiv).removeClass('alert alert-danger');
                $(msgDiv).addClass('alert alert-success');
                $(msgDiv).text('Login Succeded');
                setTimeout(function (){ window.location.href= 'z-index.php';},2000);
            }else{
                $(msgDiv).addClass('alert alert-danger');
                $(msgDiv).text(msg);
            }
        }
    });
    });
});

//submit multipart/form-data using ajax jquery
$(document).ready(function () {


    $('#post-form').submit(function (event) {
        // Get form
        var post_form = $('#post-form')[0];

        //stop submit the form, we will post it manually.
        event.preventDefault();

        //get the messages div
        var post_msgDiv=$('#post-messages');

        // Create an FormData object
        var post_data = new FormData(post_form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'connection/post-check.php',
            data: post_data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend:function(){
                 $(msgDiv).html('<div class="spinner-border" role="status"<span class="sr-only">Loading...</span> </div>')
                
              
            },
            success: function (returnedData) {

                if(returnedData=='OK'){
                    $(post_msgDiv).removeClass('alert alert-danger');
                    $(post_msgDiv).addClass('alert alert-success');
                    $(post_msgDiv).text('post added successfully');
                    window.location.href='z-index.php';
                }else{
                    $(post_msgDiv).addClass('alert alert-danger');
                    $(post_msgDiv).text(returnedData);
                }

            }
        });

    });

});

 

