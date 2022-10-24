
$("#form-endereco").validate({
    rules: {
        lstTipoContatoEndereco: {
            required: true,
        },
        cep: {
            required: true,
        },
        endereco: {
            required: true,
        },
    },
    messages: {
        lstTipoContatoEndereco: {
            required: "Defina o tipo de contato",
        },
        cep: {
            required: "Digite o cep",
        },
        endereco: {
            required: "Digite o endereço",
        },
    },
});

$("#form-telefone").validate({
    rules: {
        lstTipoContatoTelefone: {
            required: true,
        },
        txtDDI: {
            required: true,
        },
        txtDDD: {
            required: true,
        },
        celular: {
            required: true,
        },
    },
    messages: {
        lstTipoContatoTelefone: {
            required: "Escolha o tipo de contato",
        },
        txtDDI: {
            required: "Digite o DDI",
        },
        txtDDD: {
            required: "Digite o DDD",
        },
        celular: {
            required: "Digite o número de telefone",
        },
    },
});

$("#form-email").validate({
    rules: {
        lstTipoContatoEmail: {
            required: true,
        },
        txtEmail: {
            required: true,
            pattern: "[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$",
        },
    },
    messages: {
        lstTipoContatoEmail: {
            required: "Escolha o tipo de email",
        },
        txtEmail: {
            required: "Digite o email",
            pattern: "Email inválido",
        },
    },
});

$("#form-usuario").validate({
    rule: {
        txtEmail: {
            required: true,
        },
        txtSenha: {
            required: true,
            minlength: 8,
            maxlength: 72,
        },
        txtConfSenha: {
            required: true,
            minlength: 8,
            maxlength: 72,
        },
    },
    messages: {
        txtEmail: {
            required: "Digite o email",
            pattern: "Email inválido",
        },
        senha: {
            required: "Por favor, digite uma senha válida.",
            minlength: "A senha deve conter no mínimo 8 caracteres",
            maxlength: "A senha deve conter no máximo 72 caracteres",
        },
        txtConfSenha: {
            required: "Por favor, digite uma senha válida.",
            minlength: "A senha deve conter no mínimo 8 caracteres",
            maxlength: "A senha deve conter no máximo 72 caracteres",
        },
    },
});

$("#form-assinatura").validate({
    rule: {
        txtNomeRazao: {
            required: true,
        },
        txtPeriodoInicial: {
            required: true,
        },
        txtPeriodoFinal: {
            required: true,
        },
    },
    messages: {
        txtEmail: {
            required: "Digite o nome/razão social",
        },
        txtPeriodoInicial: {
            required: "Por favor, digite uma data.",
        },
        txtPeriodoFinal: {
            required: "Por favor, digite uma data.",
        },
    },
});

$("#form-madeira-tora").validate({

});
$("#form-colheita").validate({

});
$("#form-produto").validate({

});
$("#form-residuo").validate({

});
// $("#form-new-funcionario").validate({
//     rules: {
//         nome: {
//             required: true,
//             minlength: 2,
//         },
//         sobrenome: {
//             required: true,
//             minlength: 2,
//         },
//         "data-nascimento": {
//             required: true,
//         },
//         email: {
//             required: true,
//             pattern: "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$",
//         },
//         celular: {
//             required: true,
//             pattern: "[1-9]{2}[0-9]{5}[0-9]{4}$",
//         },
//         senha: {
//             required: true,
//             minlength: 8,
//             maxlength: 72,
//         },
//         "confirmar-senha": {
//             required: true,
//             minlength: 8,
//             maxlength: 72,
//         },
//     },
//     messages: {
//         nome: {
//             required: "Digite o nome",
//         },
//         sobrenome: {
//             required: "Digite o sobrenome",
//         },
//         "data-nascimento": {
//             required: "Digite a data de nascimento",
//         },
//         email: {
//             required: "Digite o email",
//             pattern: "Email inválido",
//         },
//         celular: {
//             required: "Digite o celular",
//             pattern: "Use este formato 11900000000",
//         },
//         senha: {
//             required: "Por favor, digite uma senha válida.",
//             minlength: "A senha deve conter no mínimo 8 caracteres",
//             maxlength: "A senha deve conter no máximo 72 caracteres",
//         },
//         "confirmar-senha": {
//             required: "Por favor, digite uma senha válida.",
//             minlength: "A senha deve conter no mínimo 8 caracteres",
//             maxlength: "A senha deve conter no máximo 72 caracteres",
//         },
//     }
// });
