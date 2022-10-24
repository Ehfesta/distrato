usuarioSessao();
function usuarioSessao(){
    $.ajax({
        url: urlSistema + "/login/usuarioSessao",
        type: "GET",
        success: function (result){
            let idUsuario = JSON.parse(result);
                if(idUsuario != null) {
                    localStorage.setItem("idUsuario", idUsuario);
                }
        
        }
    })
}

function msgtoast(vIcon, Msg) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        icon: vIcon,
        title: Msg
    })
}
