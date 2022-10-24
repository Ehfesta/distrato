CardConvite();

function CardConvite() {
    // alert(func);
    $.ajax({
        url: urlSistema + "Convites/listarVW",
        type: "GET",
        success: function(result) {
            let tableIPs = JSON.parse(result);
            console.log(tableIPs);
            let tabela = $("#tableCard");
            if (tableIPs != null && tableIPs.length > 0) {
                
                tabela.find("div").remove();
                $.each(tableIPs, function(i, IPs) {
                    cardConc = (IPs.Status >= '4') ? "card-convitesConc" : "";
                    $(tabela).append(

                        `<div class="` + cardConc + `" onclick="bntAbreConvite('` + IPs.Cod + `');" id="` + IPs.Cod + `" style="margin-bottom: 15px;">` +
                        `<div class="position-relative p-1 card-convites">` +
                        `<img src="` + urlSistema + `/resources/img/Convite/` + IPs.Cod + `.jpg" alt="` + IPs.Titulo + `" class="img-convites">` +
                        `<div class="ribbon-wrapper ribbon-lg">` +
                        `<div class="ribbon bg-` + IPs.StatusCor + `">` +
                        IPs.StatusDesc +
                        `</div>` +
                        `</div>` +
                        `<div class="bg-` + IPs.StatusCor + ` pl-2">` +
                        IPs.Titulo + ` <small> - ` + IPs.DataEventoDesc + `</small><br>` +
                        `<small>` + IPs.StatusDesc + `</small>` +
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
        urlSistema + `Convites/convite/` + Cod + '2E'
    );
};