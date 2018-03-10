$( document ).ready(function() {
    // onfocus
    document.getElementById('help_input').onfocus = function() {
        document.getElementById('help_input').style.borderColor = 'green';
    };
    
    // onblur
    document.getElementById('help_input').onblur = function() {
        document.getElementById('help_input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    };
    // --------------------------------------------  
    
    $('.restore_button').on('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
            
        var onSuccess = function(data, textStatus, jqXHR) {
            
            if (data.indexOf("userNotFound") != -1){
                document.getElementById('help_input').style.borderColor = 'red';
                document.getElementById('help_input').innerHTML = "user not found";
                document.getElementById('help_input').style.visibility = "visible";
                return;
            }
            
            if (data.indexOf("success") != -1) {
                window.location = "check_email.php";
                return;
            }
            
            document.getElementById('help_input').style.borderColor = 'red';
            document.getElementById('help_input').innerHTML = "error, try again";
            document.getElementById('help_input').style.visibility = "visible";
            
            console.dir(data);
        };
        
        var onError = function(data, textStatus, jqXHR) {
            console.dir(data);
        };
        
        var data = $(".restore_form").serialize();
        var url = "worker/restore_user_request.php";
        var settings = {
            data: data,
            method: "POST",
            url: url,
            success: onSuccess,
            error: onError, 
        };
        $.ajax(settings);
  
    });
    
});