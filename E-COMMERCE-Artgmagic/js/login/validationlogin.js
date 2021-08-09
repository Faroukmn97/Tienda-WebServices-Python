
$(document).ready(function () {

    const formlogin = document.getElementById("form_login_id")

    formlogin.addEventListener("submit", e=>{
        e.preventDefault();
      //  console.log(emailuser);
      const emailuser = $("#emailuser").val(); 
      const passworduser = $("#passworduser").val();
        validate_credentials(emailuser,passworduser);
    })

    function navegationpageprincipal() {
        location.href = "index.php"
    }

    function validate_credentials(emailUser,passwordUser) {
        $('#load-modal-id').css('display','flex');
        var access = false;
        console.log(emailUser);
        console.log(passwordUser);
        if (emailUser === "" || passwordUser === "") {
            alert("Está vacio");
            $('#load-modal-id').css('display','none');
        } else
        {
            var credenciales = JSON.stringify({emailuse: emailUser, passworduse: passwordUser});
            console.log(credenciales);
            $.ajax({
                method: "POST",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                url: GlobalApisLocation+"UserController.php?op=LoginUser",
                data: credenciales,
                success: function (data) {
                    console.log(data.detail);
                $('#warnings_id').html(data.detail); 
                switch(data.detail){
                    case 'No existe el usuario':
                    $('#warnings_id').html(data.detail); 
                    $('#load-modal-id').css('display','none');
                    break;
                    case 'Email incorrecta':
                    $('#warnings_id').html(data.detail); 
                    $('#load-modal-id').css('display','none');
                    break;
                    case 'Logeado':
                    $('#warnings_id').html(data.detail); 
                    var user = data.userid;
                    var nameus = data.usename;
                    var emailus = data.usemail;
                    var detailuser = data.detail;
                    var loginobs = JSON.stringify({userx:user,nameusx:nameus,emailusx:emailus, detailuserx:detailuser});
                    console.log(loginobs);
                        $.ajax({
                            method: 'POST',
                            url: 'http://localhost/E-COMMERCE-Artgmagic/session.php',
                            dataType: "html",
                             data: {userx:user, emailusx:emailus,nameusx:nameus, detailuserx:detailuser},
                            success: function(data) {
                                console.log(data);
                                $('#load-modal-id').css('display','none');
                               location.href = "index.php";
                            },
                            error: function (data) {
                                console.error(data);
                            }
                        });
                    break;
                    case 'Contraseña incorrecta':
                    $('#warnings_id').html(data.detail); 
                    $('#load-modal-id').css('display','none');
                    break;

                }
                },
                error: function (data) {
                    console.error(data);
                }
            });
        }
    }

});

