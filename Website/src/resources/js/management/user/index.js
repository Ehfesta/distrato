/* 

Cadastro

 */
function handleRegisterUser() {
  $("#form-new-usuario").validate({
    rules: {
      nome: {
        required: true,
      },
      sobrenome: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      senha: {
        required: true,
        minlength: 8,
        maxlength: 72,
      },
      "confirmar-senha": {
        required: true,
        minlength: 8,
        maxlength: 72,
      },
    },
    messages: {
      nome: "Por favor, digite o nome.",
      sobrenome: "Por favor, digite o sobrenome.",
      email: "Por favor, digite um e-mail válido.",
      senha: {
        required: "Por favor, digite uma senha válida.",
        minlength: "A senha deve conter no mínimo 8 caracteres",
        maxlength: "A senha deve conter no máximo 72 caracteres",
      },
      "confirmar-senha": {
        required: "Por favor, digite uma senha válida.",
        minlength: "A senha deve conter no mínimo 8 caracteres",
        maxlength: "A senha deve conter no máximo 72 caracteres",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".input-group-msg").append(error);
    },
    highlight: function (element) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid");
    },
    submitHandler: function (form) {
      $(".btn-submit-register").attr("disabled", true);

      const senha = $("#input-senha").val();
      const senhaConfirmar = $("#input-senha-confirmar").val();

      if (senha !== senhaConfirmar) {
        toastr.warning(
          "Por favor, verifique sua senha. As senhas não conferem."
        );
        return false;
      }

      let data = $(form).serialize();
      let url = $(form).attr("data-id");

      console.log(data);

      $.ajax({
        url: urlSistema + url,
        type: "POST",
        data: data,
        error: function (error) {
          console.log(error);
          toastr.error("Ocorreu um erro ao cadastrar novo usuário. [1]");
          $(".btn-submit-register").attr("disabled", false);
        },
        success: function (result) {
          result = result.trim();
          console.log(result);
          switch (result) {
            case "error":
              toastr.error("Ocorreu um erro ao cadastrar novo usuário. [2]");
              break;
            case "password":
              toastr.warning(
                "Por favor, verifique sua senha. As senhas não conferem."
              );
              break;
            case "email":
              toastr.warning(
                "E-mail já cadastrado. Por favor, insira um novo e-mail válido."
              );
              break;
            case "fields":
              toastr.warning("Verifique os campos obrigatórios.");
              break;
            case "menus":
              toastr.warning("Nenhum menu de acesso foi selecionado.");
              break;
            case "success":
              toastr.success(
                "Cadastro de usuário realizado com sucesso! Sua página será recarregada."
              );
              setTimeout(() => location.reload(), 1500);
              break;
            default:
              toastr.warning("Falha ao realizar cadastro.");
          }
          $(".btn-submit-register").attr("disabled", false);
        },
      });
    },
  });
}
$(".btn-submit-register").click(handleRegisterUser);

/* 

Update

 */
function handleUpdateUser() {
  $("#form-edit-usuario").validate({
    rules: {
      nome: {
        required: true,
      },
      sobrenome: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      senha: {
        minlength: 8,
        maxlength: 72,
      },
      "confirmar-senha": {
        minlength: 8,
        maxlength: 72,
      },
    },
    messages: {
      nome: "Por favor, digite o seu nome.",
      sobrenome: "Por favor, digite o seu sobrenome.",
      email: "Por favor, digite um e-mail válido.",
      senha: {
        minlength: "A senha deve conter no mínimo 8 caracteres",
        maxlength: "A senha deve conter no máximo 72 caracteres",
      },
      "confirmar-senha": {
        minlength: "A senha deve conter no mínimo 8 caracteres",
        maxlength: "A senha deve conter no máximo 72 caracteres",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".input-group-msg-modal").append(error);
    },
    highlight: function (element) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid");
    },
    submitHandler: function (form) {
      $(".btn-submit-update").attr("disabled", true);

      const senhaModal = $("#input-senha-modal").val();
      const senhaConfirmarModal = $("#input-senha-confirmar-modal").val();

      if (senhaModal !== "") {
        if (senhaModal !== senhaConfirmarModal) {
          toastr.warning(
            "Por favor, verifique sua senha. As senhas não conferem."
          );
          return false;
        }
      }

      let data = $(form).serialize();
      let url = $(form).attr("data-id");

      $.ajax({
        url: urlSistema + url,
        type: "POST",
        data: data,
        error: function (error) {
          console.log(error);
          toastr.error("Ocorreu um erro ao atualizar usuário. [1]");
          $(".btn-submit-update").attr("disabled", false);
        },
            success: function (result) {
            result = result.trim();
            console.log(result);

            switch (result) {
                case "error":
                    toastr.error("Ocorreu um erro ao atualizar usuário. [2]");
                break;
                case "password":
                    toastr.warning(
                        "Por favor, verifique sua senha. As senhas não conferem."
                    );
                break;
                case "email":
                    toastr.warning(
                        "E-mail já cadastrado. Por favor, insira um novo e-mail válido."
                    );
                break;
                case "fields":
                    toastr.warning("Verifique os campos obrigatórios.");
                break;
                case "menus":
                    toastr.warning("Nenhum menu de acesso foi selecionado.");
                break;
                case "success":
                    toastr.success(
                        "Atualização de usuário realizada com sucesso! Sua página será recarregada."
                    );
                    setTimeout(() => location.reload(), 1500);
                break;
                default:
                    $(".btn-submit-update").attr("disabled", false);
                    toastr.warning("Falha ao realizar atualização.");
            }
          $(".btn-submit-update").attr("disabled", false);
        },
      });
    },
  });
}
$(".btn-submit-update").click(handleUpdateUser);
