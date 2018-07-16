
$(document).ready(function(){
    $('#my-form').submit(function(event){
        event.preventDefault();
        var error = '';
        
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var password = $('#password').val();
        var confirm_pass = $('#confirm_password').val();
        var email = $('#email').val();
        var tphone = "nophone";
        var city = "nocity";
        var zip = $('#zip').val();
        var state = "nostate";
        
        var fnamePattern = /^[A-Z][a-z]{1,10}$/;
        var lnamePattern = /((([A-Z][a-z]{1,2}(\s)?){0,3})|[A-Z]')(([A-Z][a-z]{1,10})|([A-Z][a-z][A-Z][a-z]{1,10}))/g;
        var emailPattern = /^[A-Za-z]{1,20}@[A-Za-z]{2,8}.com$/;
        //var tphonePattern = /^((\(?)[0-9]{3}(\))?(-)?)?([0-9]{3}(-)?[0-9]{4})$/;
        var zipPattern = /^([0-9]{4}-)?([0-9]{5})$/;
        var cityPattern = /([A-Z][a-z]{0,20})|([A-Z][a-z]{1,10}\s[A-Z][a-z]{1,10})/g;
        console.log(email);
        console.log("~~~");
        console.log(emailPattern.test(email));
        if(password != confirm_pass){
            alert("Non matching passwords");
            return 0;
        }
         
        if(!fnamePattern.test(fname)){
            error += "wrong first name\n";
            $('#fnamediv2').remove(".sfname");
            $('#fnamediv').removeClass("has-success has-feedback");
            $('#fnamediv').addClass("has-error has-feedback");
        }else{
            $('#fnamediv').removeClass("has-error has-feedback");
            $('#fnamediv').addClass("has-success has-feedback");
        }
         
        if(!lnamePattern.test(lname)){
            error += "wrong last name\n";
            $('#lnamediv2').remove(".sfname");
            $('#lnamediv').removeClass("has-success has-feedback");
            $('#lnamediv').addClass("has-error has-feedback");
        }else{
            $('#lnamediv').removeClass("has-error has-feedback");
            $('#lnamediv').addClass("has-success has-feedback");
        }
         
        if(!emailPattern.test(email)){
            error += "wrong email\n";
            $('#emaildiv2').remove(".semail");
            $('#emaildiv').removeClass("has-success has-feedback");
            $('#emaildiv').addClass("has-error has-feedback");
        }else{
            $('#emaildiv').removeClass("has-error has-feedback");
            $('#emaildiv').addClass("has-success has-feedback");
        }
         
        
         
        if(!zipPattern.test(zip)){
            error += "wrong zip\n";
            $('#zipdiv').remove(".szip");
            $('#zipdiv').addClass("has-error has-feedback");
            $('#zipdiv').removeClass("has-success has-feedback");
        }else{
            $('#zipdiv').addClass("has-success has-feedback");
            $('#zipdiv').removeClass("has-error has-feedback");
        }
         
        
        var check = $('#check-term').prop('checked');
        //console.log(check);
        if(!check){
            $('#check-term').append("Box not checked");
            alert("Box not checked");
            return false;
        }else{
             
        }
        if(error){
            alert(error);
            return false;
        }
        $.ajax({
            url: 'php/signup.php',
            type: 'GET',
            dataType: 'HTML',
            data: {
                fname: fname,
                lname: lname,
                password: password,
                email: email,
                tphone: tphone,
                city: city,
                state: state,
                zip: zip
            },
            
            success: function(serverResponse) {
                $(".bi").append("<div class='has-success'>Account Created</div>");
                console.log(serverResponse);
                var myHTML = '';
                console.log(serverResponse);
                $('#zipdiv').removeClass("has-success has-feedback");
                $('#emaildiv').removeClass("has-success has-feedback");
                $('#fnamediv').removeClass("has-success has-feedback");
                $('#lnamediv').removeClass("has-success has-feedback");
                $('#fname').val("");
                $('#lname').val("");
                $('#password').val("");
                $('#confirm_password').val("");
                $('#email').val("");
                $('#tphone').val("");
                $('#city').val("");
                $('#zip').val("");
                $('#state').val("");
            },
            
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error');
                console.log(errorThrown);
                console.log(jqXHR);
            },
            
    
            complete: function() {
                
            }
        });
         
    });
    
    $('#modal-submit').click(function(){
        $('#check-term').prop('checked', true);
        
    });
    
    $('#login1').submit(function(event){
        event.preventDefault();
        var emailPattern = /^[A-Za-z]{1,20}@[A-Za-z]{2,6}.com$/;
        var loginemail = $("#loginemail").val();
        var loginpassword = $("#loginpassword").val();
        if(!emailPattern.test(loginemail)){
            alert("wrong email");
        }
        console.log(loginemail);
        console.log(loginpassword);
        $.ajax({
            url: 'php/login.php',
            type: 'GET',
            dataType: 'HTML',
            data: {
                email: loginemail,
                password: loginpassword
            },
            
            success: function(serverResponse) {
                console.log(serverResponse);
                var myHTML = '';
            },
            
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error');
                console.log(errorThrown);
                console.log(jqXHR);
            },
            
    
            complete: function() {
                location.reload();
            }
        });
    });
});