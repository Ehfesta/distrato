function configCampos(cvtEditar) {

    $('#selData').mask('00/00/0000');

    $('.taginput').tagsinput({
        confirmKeys: [13, 32, 44],
    });

    if (cvtEditar == '1E') {
        $('.cvtVis').remove();
    } else {
        $('.cvtEdit').remove();
        $('.bootstrap-tagsinput').remove();

    }
};



function bntPerfilEdit(Cod) {
    window.location.replace(
        urlSistema + `Perfil/index/` + Cod
    );
};

function bntPerfilSave(cCod) {

    var dados = new FormData(document.getElementById('form_perfil'));
    var file = document.getElementById('customFile').files[0];
    if (file) {
        dados.append('customFile', file);
    }

    dados.append('Cod', cCod.substring(0, cCod.length - 2));
    dados.append('Nome', $("#selNome").val().trim());
    dados.append('Data', $("#selData").val().trim());
    dados.append('Sexo', $("#selSexo").val().trim());
    dados.append('EstadoCivil', $("#selEstadoCivil").val().trim());
    dados.append('Localizacao', $("#selLocalizacao").val().trim());
    dados.append('Descricao', $("#selDescricao").val().trim());
    dados.append('TagMusica', $("#selTagMusica").val().trim());
    dados.append('TagEvento', $("#selTagEvento").val().trim());
    dados.append('TagComida', $("#selTagComida").val().trim());
    dados.append('TagBebida', $("#selTagBebida").val().trim());
    dados.append('lnkFacebook', $("#lnkFacebook").val().trim());
    dados.append('lnkInstagram', $("#lnkInstagram").val().trim());
    dados.append('lnkTwitter', $("#lnkTwitter").val().trim());
    dados.append('lnkGoogle', $("#lnkGoogle").val().trim());
    dados.append('lnkLinkedin', $("#lnkLinkedin").val().trim());

    $.ajax({
        url: urlSistema + "Perfil/updPerfil",
        type: "POST",
        data: dados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result) {
            console.log(result);
            parent.msgtoast("success", "Convite salvo.");

            parent.window.location.replace(
                urlSistema + `dashboard`
            );

        },
        error: function(result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("error", result);
        }
    });
};

function preview() {
    frame = document.getElementById("UserImg");
    frame.src = URL.createObjectURL(event.target.files[0]);
}