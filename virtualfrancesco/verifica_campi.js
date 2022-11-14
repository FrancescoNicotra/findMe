var checkField = (e) => {
    $("#campi-obbligatori :input").each(function (){
        if($("#campi-obbligatori :input").val() !== ""){
            $("#invia").prop("disabled",false);
        } else $("#invia").prop("disabled",false);
    })
}
$(document).on("keyup","input[type='text']",checkField)