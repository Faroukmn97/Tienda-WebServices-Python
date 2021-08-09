
$(document).ready(function () {
    function navegationpageprincipal(url) {
    location.href = url;
}
  /*   $("#btregistrar").click(function (e) {
        $('#load-modal-id').css('display','flex');
        e.preventDefault();
        var nombre = $("#nameregister").val();
        var email = $("#emailregister").val();
        var pass = $("#passwordregister").val();
        var passconf = $("#passwordConfirm").val();
        var dataString = 'user=' + nombre + '&clave=' + pass + '&email=' + email;
        if ($("#emailregister").val().indexOf('@', 0) === -1 || $("#emailregister").val().indexOf('.', 0) === -1) {
            swal("datos incorrectos", "Email incorrecto", "error");
        } else
        if (!pass === passconf && pass.length <= 0 && passconf.length <= 0) {
            swal("datos incorrectos", "contraseñas no coinciden" + nombre, "error");
        } else {
            $.ajax({
                method: "POST",
                data: dataString,
                url: "",
                beforeSend: function () {
                },
                success: function (data) {
                    console.log(data);
                    var resp = JSON.parse(data);
                    
                    if (resp.flag===1) {
                        swal("Correcto", resp.mensaje, "success");                        
                        navegationpageprincipal("login.jsp");
                        $('#load-modal-id').css('display','none');
                    } else if(resp.flag===2){
                        swal("Advertencia",resp.mensaje,"info");
                        $('#load-modal-id').css('display','none');
                    }else{
                        swal("Advertencia",resp.mensaje,"info");
                        $('#load-modal-id').css('display','none');
                    }
                   
                },
                error: function (data) {

                }
            });
        }
    }); */
});