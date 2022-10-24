function btnLogout() {
    // let idioma = $(this).data("lang");
    // let url = urlSistema + '/lang/' + idioma;
    // console.log(idioma);

    $.ajax({
        url: urlSistema + '/Logout/logout',
        type: 'post',
        success: function(result) {
            location.reload();
        }
    });
};