$( document ).ready(function() {
    $('.restore_button').on('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
            
        var onSuccess = function(data, textStatus, jqXHR) {
            if (data.indexOf("success") != -1) {
                alert("Check your email");
                window.location = "index.php";
            } else if (data.indexOf("userNotFound") != -1){
                alert("User not found");
            } else {
                alert("error");
            }
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