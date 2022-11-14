 var checkPswd = (e) => {
    var password = $("#firstPass").val();
    var confirm_pswd = $("#secondPass").val();
        if(password.length >= 8 && password.match(/([a-zA-Z])/) && password.match(/([0-9])/) && password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                if(password === confirm_pswd )
                    $('#submit').prop('disabled', false);
        }else $('#submit').prop('disabled', true);
    };
    $(document).on('keyup','#secondPass',checkPswd)
