
ListaConvite();

function ListaConvite() {
    $.ajax({
        url: urlSistema + "Convites/listarVW",
        type: "GET",
        success: function (result) {
            let tableIPs = JSON.parse(result);
            console.log(tableIPs);
            if (tableIPs != null) {
                let tabela = $("#tableConvite");
                tabela.find("tr").remove();
                $.each(tableIPs, function (i, IPs) {
                    $(tabela).append(
                        `<tr class="odd">` +
                        `<td>`+ IPs.DataEvento.substring(8, 10) + "/" + IPs.DataEvento.substring(5, 7) + "/" + IPs.DataEvento.substring(0, 4) +`</td>` +
                            `<td class="dtr-control">`+ IPs.Titulo+`</td>` +
                            `<td>`+ IPs.Descricao +`</td>` +
                            `<td class="text-` + IPs.stsCor +`">` + IPs.stsDescricao + `</td>` +
                        `</tr>`
                    );
                });
            }
        },
        error: function (result) {
            console.log(result);
        }
    });
}

function bntCardConvite() {
    window.location.replace(
        urlSistema + `Convites`
    );
};
