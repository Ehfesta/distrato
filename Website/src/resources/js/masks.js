$(document).ready(function(){
    $("#input-cnpj-modal").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });
    $("#input-cep-modal").inputmask("99999-999");
    $("#input-ddi-modal").inputmask("+99[9]");
    $("#input-ddd-modal").inputmask("99");
    $("#input-numero-telefone-modal").inputmask({
        mask: ['9999-9999', '99999-9999'],
        keepStatic: true
    });
})
