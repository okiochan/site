$( document ).ready(function() {
    
    $('#Name_Input').on('input', function() {
        document.getElementById('Name_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    });
    $('#Email_Input').on('input', function() {
        document.getElementById('Email_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    });
    $('#Phone_Input').on('input', function() {
        document.getElementById('Pass_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    });
    
    // onfocus
    // --------------------------------------------
    document.getElementById('Name_Input').onfocus = function() {
        document.getElementById('Name_Input').style.borderColor = 'green';
    };
    document.getElementById('Email_Input').onfocus = function() {
        document.getElementById('Email_Input').style.borderColor = 'green';
    };
    document.getElementById('Pass_Input').onfocus = function() {
        document.getElementById('Pass_Input').style.borderColor = 'green';
    };
    // --------------------------------------------
    
    // onblur
    // --------------------------------------------
    document.getElementById('Name_Input').onblur = function() {
        document.getElementById('Name_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    }
    document.getElementById('Email_Input').onblur = function() {
        document.getElementById('Email_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    };
    document.getElementById('Pass_Input').onblur = function() {
        document.getElementById('Pass_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
    };
    // --------------------------------------------
    
    function validate_form() {
        document.getElementById('help_for_name_input').style.visibility = "hidden";
        document.getElementById('help_for_email_input').style.visibility = "hidden";
        document.getElementById('help_for_pass_input').style.visibility = "hidden";
        
        valid = true;
        
        var r = document.getElementById('Email_Input').value.match(/^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z]{2,}$/i);
        if (!r) {
            document.getElementById('Email_Input').style.borderColor = 'red';
            document.getElementById('help_for_email_input').innerHTML = "E-mail введен некорректно.";
            document.getElementById('help_for_email_input').style.visibility = "visible";
            valid = false;
        }
        
        var r = document.getElementById('Name_Input').value.match(/^[a-zA-ZА-Яа-я][ a-zA-ZА-Яа-я\-]*$/i);
        if (!r) {
            document.getElementById('Name_Input').style.borderColor = 'red';
            document.getElementById('help_for_name_input').innerHTML = "Поле 'Name' может содержать только буквы, пробельные символы и знак '-'. Поле 'Name' должно начинаться с буквы.";
            document.getElementById('help_for_name_input').style.visibility = "visible";
            valid = false;
        }
     
        var str = document.getElementById('Pass_Input').value;
        if (str.length <= 4) {
            document.getElementById('Pass_Input').style.borderColor = 'red';
            document.getElementById('help_for_pass_input').innerHTML = "Поле 'Password' должно содержать не менее 5 символов";
            document.getElementById('help_for_pass_input').style.visibility = "visible";
            valid = false;
        }
        
        return valid;
    }
                        
    
    $('.reg_button').on('click', (e) => {
        if (validate_form() == true) {
            e.preventDefault();
            e.stopPropagation();
            
            var onSuccess = function(data, textStatus, jqXHR) {
                if (data.indexOf("success") != -1) {
                    alert("User register successful");
                    window.location = "index.php";
                } else if (data.indexOf("userExist") != -1){
                    alert("User already exist");
                }else if (data.indexOf("emailExist") != -1){
                    alert("Email already exist");
                }else {
                    alert("error occured");
                }
                console.dir(data);
            };
            
            var onError = function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
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
        }
        else {
            e.preventDefault();
            e.stopPropagation();
        }
    });
    
});