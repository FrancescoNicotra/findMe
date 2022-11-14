$(document).ready(function (){
    $("#submit").click(function (e){
        e.preventDefault();
        var nome = $('#nome').val();
        var cognome = $('#cognome').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#second-pass').val();
        var num_tel = $('#num_tel').val();

        if(nome == '' || cognome == '' || email == '' || username == ''|| password == '' || num_tel == ''){
            alert("Riempi tutti i campi");
            return false;
        }
        var formData = {
                nome: nome,
                cognome: cognome,
                email: email,
                username: username,
                password: password,
                num_tel: num_tel
            };
        $.ajax({
            type: "POST",
            url: "storeData.php",
            data: formData,
            dataType: "json",
            success: function (e){
                alert("Registrazione effettuata con successo");
            },
            error: function (xhr,e){
                console.error(xhr);
                console.log(e);
            }
        });
    });
});