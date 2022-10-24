/* 

Cadastro

 */
function handleRegisterClient() {
  $("#form-new-client").validate({
    rules: {
      cnpj: {
        required: true,
      },
      "razao-social": {
        required: true,
      },
      "telefone-empresa": {
        required: true,
      },
      "email-responsavel": {
        email: true,
      },
      cep: {
        required: true,
      },
      endereco: {
        required: true,
      },
      bairro: {
        required: true,
      },
      cidade: {
        required: true,
      },
      estado: {
        required: true,
      },
      pais: {
        required: true,
      },
    },
    messages: {
      cnpj: "Por favor, digite o CNPJ do cliente.",
      "razao-social": "Por favor, digite a razão social do cliente.",
      "telefone-emrpesa": "Por favor, digite um telefone para o cliente.",
      "email-responsavel": "Por favor, digite um e-mail válido.",
      cep: "Por favor, digite o CEP do cliente.",
      endereco: "Por favor, digite o Endereço do cliente.",
      bairro: "Por favor, digite o Bairro do cliente.",
      cidade: "Por favor, digite a Cidade do cliente.",
      estado: "Por favor, digite o Estado do cliente.",
      pais: "Por favor, digite o País do cliente.",
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

      let data = $(form).serialize();
      let url = $(form).attr("data-id");

      console.log(data);

      $.ajax({
        url: urlSistema + url,
        type: "POST",
        data: data,
        error: function (error) {
          console.log(error);
          toastr.error("Ocorreu um erro ao cadastrar novo cliente. [1]");
          $(".btn-submit-register").attr("disabled", false);
        },
        success: function (result) {
          result = result.trim();
          console.log(result);
          switch (result) {
            case "error":
              toastr.error("Ocorreu um erro ao cadastrar novo cliente. [2]");
              break;
            case "cnpj":
              toastr.warning(
                "CNPJ já cadastrado. Por favor, insira um novo CNPJ válido."
              );
              break;
            case "fields":
              toastr.warning("Verifique os campos obrigatórios.");
              break;
            case "success":
              toastr.success(
                "Cadastro do cliente realizado com sucesso! Sua página será recarregada."
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
$(".btn-submit-register").click(handleRegisterClient);

/* 

Update

 */
function handleUpdateClient() {
  $("#form-edit-client").validate({
    rules: {
      cnpj: {
        required: true,
      },
      "razao-social": {
        required: true,
      },
      "telefone-empresa": {
        required: true,
      },
      "email-responsavel": {
        email: true,
      },
      cep: {
        required: true,
      },
      endereco: {
        required: true,
      },
      bairro: {
        required: true,
      },
      cidade: {
        required: true,
      },
      estado: {
        required: true,
      },
      pais: {
        required: true,
      },
    },
    messages: {
      cnpj: "Por favor, digite o CNPJ do cliente.",
      "razao-social": "Por favor, digite a razão social do cliente.",
      "telefone-emrpesa": "Por favor, digite um telefone para o cliente.",
      "email-responsavel": "Por favor, digite um e-mail válido.",
      cep: "Por favor, digite o CEP do cliente.",
      endereco: "Por favor, digite o Endereço do cliente.",
      bairro: "Por favor, digite o Bairro do cliente.",
      cidade: "Por favor, digite a Cidade do cliente.",
      estado: "Por favor, digite o Estado do cliente.",
      pais: "Por favor, digite o País do cliente.",
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

      let data = $(form).serialize();
      let url = $(form).attr("data-id");

      $.ajax({
        url: urlSistema + url,
        type: "POST",
        data: data,
        error: function (error) {
          console.log(error);
          toastr.error("Ocorreu um erro ao atualizar cliente. [1]");
          $(".btn-submit-update").attr("disabled", false);
        },
        success: function (result) {
          result = result.trim();
          console.log(result);
          switch (result) {
            case "error":
              toastr.error("Ocorreu um erro ao atualizar cliente. [2]");
              break;
            case "cnpj":
              toastr.warning(
                "CNPJ já cadastrado. Por favor, insira um novo CNPJ válido."
              );
              break;
            case "fields":
              toastr.warning("Verifique os campos obrigatórios.");
              break;
            case "success":
              toastr.success(
                "Atualização do cliente realizada com sucesso! Sua página será recarregada."
              );
              setTimeout(() => location.reload(), 1500);
              break;
            default:
              toastr.warning("Falha ao realizar cadastro.");
          }
          $(".btn-submit-update").attr("disabled", false);
        },
      });
    },
  });
}
$(".btn-submit-update").click(handleUpdateClient);
