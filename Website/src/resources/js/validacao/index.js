//
// nova senha //
//

function forgotPassword() {
  $("#form-forgot-password").validate({
    rules: {
      "email": {
        required: true,
      },
    },
    messages: {
      "email": "Por favor, digite o email.",

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
      let data = $(form).serialize();
      let url = "validacao/novaSenha";
      $(".btn-submit-update").attr("disabled", true);
      $.ajax({
        url: urlSistema + url,
        type: "POST",
        data: data,
        error: function (error) {
          console.log(error);
          toastr.error("Ocorreu um erro ao resetar a senha. [1]");
          $(".btn-submit-update").attr("disabled", false);
        },
        success: function (result) {
          result = result.trim();
          console.log(result);
          switch (result) {
            case "error":
              toastr.error("Ocorreu um erro ao resetar a senha. [2]");
              break;
            case "fields":
              toastr.warning("Verifique os campos obrigatórios.");
              break;
            case "success":
              toastr.success(
                "Reset da senha realizado com sucesso! Sua página será recarregada. Verifique seu email."
              );
              setTimeout(() => location.reload(), 1500);
              break;
            default:
              toastr.warning("Falha ao realizar ao solicitar o reset da senha.");
          }
          $(".btn-submit-update").attr("disabled", false);
        },
      });
    },
  });
}
$(".btn-new-pass").click(forgotPassword);