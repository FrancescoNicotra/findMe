function verificaNum(num_tel){
    num_tel = num_tel.replace(/[^0-9]/g,'');
    $("#num_tel").val(num_tel);
    if(num_tel == '' || !num_tel.match(/^3[0-9]{9}$/)){
        $("#isValid").prop("hidden",true);
        $("#isInvalid").prop("hidden",false);
        return false;
    }
    else {
        $("#isValid").prop("hidden",false);
        $("#isInvalid").prop("hidden",true);
        return true;
    }
}
