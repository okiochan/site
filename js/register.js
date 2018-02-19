$( document ).ready(function() {
    $('.reg_button').on('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
            
        var onSuccess = function(data, textStatus, jqXHR) {
            if (data.indexOf("success") != -1) {
                alert("User register successful");
                window.location = "index.php";
            } else if (data.indexOf("userExist") != -1){
                alert("User already exist");
            }else {
                alert("Pass is too short, requers 5 symbols at least");
            }
            console.dir(data);
        };
        
        var onError = function(data, textStatus, jqXHR) {
            console.dir(data);
        };
        
        var data = $(".reg_form").serialize();
        var url = "worker/register_user.php";
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