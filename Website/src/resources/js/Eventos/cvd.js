CardConviteCVD();

function CardConviteCVD() {
    // alert(func);
    $.ajax({
        url: urlSistema + "Eventos/listarCVD",
        type: "GET",
        success: function(result) {
            let tableIPs = JSON.parse(result);
            console.log(tableIPs);
            let tabela = $("#tableCard");
            if (tableIPs != null && tableIPs.length > 0) {
                
                tabela.find("div").remove();
                $.each(tableIPs, function(i, IPs) {
                    cardConc = (IPs.conv_Status >= '4') ? "card-convitesConc" : "";

                    ribbon = "";
                    if (IPs.Confirmado > '0') {
                        ribbon += `<div class="ribbon-wrapper ribbon-lg">`;
                        ribbon += `<div class="ribbon bg-` + ((IPs.Confirmado == '1') ? 'Success' : 'Danger') + `">`;
                        ribbon += IPs.ConfirmadoDesc;
                        ribbon += `</div>`;
                        ribbon += `</div>`;
                    }
                    $(tabela).append(

                        `<div class="` + cardConc + `" onclick="bntAbreConvite('` + IPs.conv_Cod + `');" id="` + IPs.conv_Cod + `" style="margin-bottom: 15px;">` +
                        `<div class="position-relative p-1 card-convites">` +
                        `<img src="` + urlSistema + `/resources/img/Convite/` + IPs.conv_Cod + `.jpg" alt="` + IPs.conv_Titulo + `" class="img-convites">` +
                        ribbon +
                        `<div class="bg-secondary pl-2">` +
                        IPs.conv_Titulo + ` <small> - ` + IPs.conv_DataEventoDesc + `</small><br><small>Hoster: ` + IPs.conv_cadUserHoster + `</small>` +
                        `</div>` +
                        `</div>` +
                        `</div>`
                    );
                });
            } else {
                $(tabela).append(
                    `<div class="" style="margin-bottom: 15px;">` +
                        `<div class="position-relative p-1">` +
                        `<img src="` + urlSistema + `/resources/img/Convite/noImage.gif" class="img-convites">` +
                        `<div class="bg-gray pl-2">Nenhum convite encontrado<br>` +
                        `</div>` +
                        `</div>` +
                        `</div>`
                );
            }
        },
        error: function(result) {
            console.log(result);
        }
    });
}


function bntAbreConvite(Cod) {
    window.location.replace(
        urlSistema + `Eventos/evento/` + Cod + '2E'
    );
};