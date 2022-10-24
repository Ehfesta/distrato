/*
LISTAR INLINE DE AJUDA - GERAL
*/

function envioTeste() {

    let form = $("#form-servidoremailteste");
    let data = form.serialize();

    if (form.valid()) {

        $.blockUI({ message: $('#msgCarregandoAguarde') });
    
        $.ajax({
            url: urlSistema + "servidoremail/envioemailteste",
            type: "POST",
            data: data,
            error: function (error) {
                $.unblockUI();
                console.log(error);
                toastr.error("Falha ao enviar o email teste!");
            },
            success: function (result) {
                $.unblockUI();        
                result = result.trim();
                console.log(result);
                switch (result) {
                    case "error":
                        toastr.error("Ocorreu um erro ao enviar o email teste. [2]");
                        break;
                    case "fields":
                        toastr.warning("Verifique os campos obrigatórios.");
                        break;
                    case "success":
                        toastr.success("Email enviado com sucesso.");
                        setTimeout(() => location.reload(), 1500);
                        break;
                    default:
                        toastr.warning("Falha ao realizar o envio.");
                }  
            },
        });
    }    
}

$("#btn-send-email-test").click(envioTeste);