function handleLogin() {
    
    $("#form-login").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },

        messages: {
            password: {
                required: "Por favor, digite uma senha.",
            },
            email: "Por favor, digite um e-mail válido.",
        },

        errorElement: "span",

        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".input-group").append(error);
        },

        highlight: function (element) {
            $(element).addClass("is-invalid");
        },

        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        },

        submitHandler: function (form) {
            $(this).attr("disabled", true);
            const data = $(form).serialize();
            //console.log(data);
            $.ajax({
                url: urlSistema + "/login/sessao",
                type: "POST",
                data: data,
                error: function (error) {
                    console.log(error);
                    toastr.error("Ocorreu um erro ao realizar login [1].");
                    $(this).attr("disabled", true);
                },
                success: function (result) {
                result = result.trim();
                console.log(result);
                switch (result) {
                    case "error":
                        toastr.error("Ocorreu um erro ao realizar login [2].");
                    break;
                    case "password":
                        toastr.warning("Usuário e/ou senha inválidos.");
                    break;
                    case "fields":
                        toastr.warning("Verifique os campos obrigatórios.");
                    break;
                    case "gestor":
                        toastr.success("Login realizado com sucesso!");
                        setTimeout(() => (window.location.href = "Convites"), 1500);
                    break;
                    case "cliente":
                        toastr.success("Login realizado com sucesso!");
                        setTimeout(() => (window.location.href = "Convites"), 1500);
                    break;
                    default:
                        toastr.warning("Falha ao realizar login.");
                }
                $(this).attr("disabled", true);
                },
            });
        },
    });
}

$("#btn-submit-login").click(handleLogin);

$('.select-lang').click(function () {

    let idioma = $(this).data("lang");
    let url = urlSistema + '/lang/' + idioma;
    console.log(idioma);

    $.ajax({
        url: url,
        type: 'get',
        success: function (result) {
            if(result == "sucesso"){
                location.reload();
            }
        }
    });
});
