function CardConvite() {
    $.ajax({
        url: urlSistema + "Eventos/listarVW",
        type: "GET",
        success: function (result) {
            let tableIPs = JSON.parse(result);
            console.log("Convites");
            console.log(tableIPs);
            if (tableIPs != null) {
                let tabela = $("#tableCard");
                tabela.find("div").remove();
                $.each(tableIPs, function (i, IPs) {
                    console.log("Convite");
                    console.log(IPs);
                    $(tabela).append(
                        `<div class="col-sm-3" id="` + IPs.Cod + `" style="margin-bottom: 15px;min-width: 256px;">` +
                        `<div class="position-relative p-1 card-convite">` +
                        `<img src="` + urlSistema + `/resources/img/Convite/` + IPs.Cod + `.jpg" alt="` + IPs.Titulo + `" class="img-convite">` +
                        `<div class="ribbon-wrapper ribbon-lg">` +
                        `<div class="ribbon bg-` + IPs.StatusCor + `">` +
                        IPs.StatusDesc +
                        `</div>` +
                        `</div>` +
                        `<div class="bg-` + IPs.StatusCor + ` pl-2">` +
                        IPs.Titulo + ` <small> - ` + IPs.DataEventoDesc + `</small><br>` +
                        `<small>` + IPs.Descricao + `</small>` +
                        `</div>` +
                        `</div>` +
                        `</div>`
                    );
                });
                console.log("tableIPs Fim");
            } else {
                console.log("tableIPs null");
            }
        },
        error: function (result) {
            console.log(result);
        }
    });

}


function configCampos(cvtEditar, cvtCod) {
    if (cvtEditar == '1E') {
        $('.cvtVis').remove();
        if (cvtCod != '') {
            $('#ConviteAdd').remove();
        } else {
            $('#ConviteSave').remove();
            $('#ConviteVoltar').remove();
        }
    } else {
        $('.cvtEdit').remove();
    }
};

function bntCardConvite(btnVoltar) {
    window.location.replace(
        urlSistema + btnVoltar
    );
};

function bntConviteEdit(Cod) {
    window.location.replace(
        urlSistema + `Eventos/evento/` + Cod
    );
};

function bntConviteAdd() {

    var dados = new FormData(document.getElementById('form_convite'));
    var file = document.getElementById('customFile').files[0];
    if (file) {
        dados.append('customFile', file);
    }
    dados.append('cadUserID', "123321");
    dados.append('Titulo', $("selTitulo").attr('value'));
    dados.append('Status', '1');
    dados.append('Descricao', $("selEvento").attr('value'));
    dados.append('DataEvento', $("selDataEvento").attr('value'));
    dados.append('HoraInicio', $("selHoraInicio").attr('value'));
    dados.append('HoraFim', $("selHoraFim").attr('value'));
    dados.append('TipoEventoID', $("selTipoEvento").attr('value'));
    dados.append('TipoPublicoID', $("selTipoPublico").attr('value'));
    dados.append('PresenteVirtual', $("selPresenteVirtual").attr('value'));
    dados.append('Convidar', $("selConvidar").attr('value'));
    dados.append('Compartilhar', $("selCompartilha").attr('value'));
    dados.append('ListaConvidados', $("selListaConvidados").attr('value'));
    dados.append('MuralRecado', $("selMuralRecado").attr('value'));
    dados.append('Endereco', $("selEndereco").attr('value'));
    dados.append('Obs', $("selObs").attr('value'));

    $.ajax({
        url: urlSistema + "Eventos/addConvite",
        type: 'POST',
        data: dados,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            console.log(Item);
            parent.msgtoast("success", "Convite salvo.");
            console.log(`Eventos/evento/` + result.Cod + '2E');
        },
        error: function (result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("danger", result);
        }
    });
};

function bntConviteSave(cCod) {

    var dados = new FormData(document.getElementById('form_convite'));
    var file = document.getElementById('customFile').files[0];
    if (file) {
        dados.append('customFile', file);
    }
    dados.append('Cod', cCod.substring(0, cCod.length - 2));
    dados.append('Titulo', $("selTitulo").attr('value'));
    dados.append('Descricao', $("selEvento").attr('value'));
    dados.append('DataEvento', $("selDataEvento").attr('value'));
    dados.append('HoraInicio', $("selHoraInicio").attr('value'));
    dados.append('HoraFim', $("selHoraFim").attr('value'));
    dados.append('TipoEventoID', $("selTipoEvento").attr('value'));
    dados.append('TipoPublicoID', $("selTipoPublico").attr('value'));
    dados.append('PresenteVirtual', $("selPresenteVirtual").is(':checked'));
    dados.append('Convidar', $("selConvidar").is(':checked'));
    dados.append('Compartilhar', $("selCompartilha").is(':checked'));
    dados.append('ListaConvidados', $("selListaConvidados").is(':checked'));
    dados.append('MuralRecado', $("selMuralRecado").is(':checked'));
    dados.append('Endereco', $("selEndereco").attr('value'));
    dados.append('Obs', $("selObs").attr('value'));


    $.ajax({
        url: urlSistema + "Eventos/updConvite",
        type: "POST",
        data: dados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result) {
            console.log(result);
            parent.msgtoast("success", "Convite salvo.");

            // window.location.replace(
            //     urlSistema + `Convites/convite/` + cCod.substring(0, cCod.length - 2) + '2E'
            // );


        },
        error: function (result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("danger", result);
        }
    });
    // }else{
    //     parent.msgtoast("error", "Campos obrigatórios.");
    // }

    // $('#ConviteSave').prop("disabled", false);
    // $('#ConviteAdd').prop("disabled", false);

};

function ConfConviteOK(CodConvite) {
    dados = {
        'Convite': CodConvite,
        'Confirmado': 'XP38'
    };
    // console.log(dados);

    $.ajax({
        url: urlSistema + "Convites/ConfConvite",
        type: 'POST',
        data: dados,
        cache: false,
        success: function (result) {
            console.log(result);
            parent.msgtoast("success", "Presença confirmada.");
            window.location.replace(
                urlSistema + `Convites/convite/` + CodConvite
            );
        },
        error: function (result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("danger", result);
        }
    });
};

function ConfConviteOff(CodConvite) {
    dados = {
        'Convite': CodConvite,
        'Confirmado': 'VK32'
    };
    // console.log(dados);

    $.ajax({
        url: urlSistema + "Convites/ConfConvite",
        type: 'POST',
        data: dados,
        cache: false,
        success: function (result) {
            console.log(result);
            parent.msgtoast("success", "Confirmação em aberto.");
            window.location.replace(
                urlSistema + `Convites/convite/` + CodConvite
            );
        },
        error: function (result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("error", result);
        }
    });
};

function ConfConviteNao(CodConvite) {
    dados = {
        'Convite': CodConvite,
        'Confirmado': 'TF34'
    };
    // console.log(dados);

    $.ajax({
        url: urlSistema + "Convites/ConfConvite",
        type: 'POST',
        data: dados,
        cache: false,
        success: function (result) {
            console.log(result);
            parent.msgtoast("success", "Não poderei comparecer enviado.");
            window.location.replace(
                urlSistema + `Convites/convite/` + CodConvite
            );
        },
        error: function (result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("danger", result);
        }
    });
};

function btnComentarios(CodConvite, UserCod) {
    dados = {
        'Convite': CodConvite,
    };
    console.log(dados);

    $.ajax({
        url: urlSistema + "Convites/lstComentarios",
        type: 'POST',
        data: dados,
        cache: false,
        success: function (result) {
            console.log("result");
            console.log(result);

            result = JSON.parse(result);
            console.log(result);
            if (result != null) {
                let tabela = $("#direct-chat-messages");
                tabela.find("div").remove();
                $.each(result, function (i, row) {
                    if (row.UserCod == UserCod) {
                        $DeletarCom = "";
                        $(tabela).append(
                            '<div class="direct-chat-msg right">' +
                            '<div class="direct-chat-infos clearfix">' +
                            '<span class="direct-chat-name float-right">' + row.UserNome + '</span>' +
                            '<span class="direct-chat-timestamp float-left">' + row.dataDesc + '</span>' +
                            '</div>' +
                            '<img class="direct-chat-img" src="' + urlSistema + '/resources/img/Perfil/' + row.UserCod + '.jpg">' +
                            '<div class="direct-chat-text">' + row.Comentario + '</div>' +
                            '</div>'
                        );
                    } else {
                        $DeletarCom = "";
                        $(tabela).append(
                            '<div class="direct-chat-msg">' +
                            '<div class="direct-chat-infos clearfix">' +
                            '<span class="direct-chat-name float-left">' + row.UserNome + '</span>' +
                            '<span class="direct-chat-timestamp float-right">' + row.dataDesc + '</span>' +
                            '</div>' +
                            '<img class="direct-chat-img" src="' + urlSistema + '/resources/img/Perfil/' + row.UserCod + '.jpg">' +
                            '<div class="direct-chat-text">' + row.Comentario + '</div>' +
                            '</div>'
                        );
                    }
                });
            }
        },
        error: function (result) {
            console.log("erro");
            console.log(result);
            parent.msgtoast("danger", result);
        }
    });
};

function bntComentarioSend(CodConvite, UserCod) {

    dados = {
        ConviteID: CodConvite,
        Status: '1',
        UserCod: UserCod,
        Comentario: $("#ComMessage").val().trim()
    };

    $.ajax({
        url: urlSistema + "Convites/EnviaComentarios",
        type: "POST",
        data: dados,
        success: function (result) {
            parent.msgtoast("success", "Comentário enviado.");
            $("#ComMessage").val("");
            btnComentarios(CodConvite, UserCod);
        },
        error: function (result) {
            parent.msgtoast("danger", result);
        }
    });
};

function preview() {
    frame = document.getElementById("CoviteImg");
    frame.src = URL.createObjectURL(event.target.files[0]);
}