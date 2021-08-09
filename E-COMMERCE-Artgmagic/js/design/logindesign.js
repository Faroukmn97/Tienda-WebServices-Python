// ejecución de funciones
document.getElementById("btn_register").addEventListener("click",register_design);
document.getElementById("btn_Login").addEventListener("click",login_design);
window.addEventListener("resize",Pagewidth);
// fin ejecución de funciones
// Variables declaradas
var Container_login_register = document.querySelector(".container_login-register");
var form_login = document.querySelector(".form_login");
var form_register = document.querySelector(".form_register");
var container_t_login = document.querySelector(".container_t-login");
var container_t_register = document.querySelector(".container_t-register");

function Pagewidth(){
    if(window.innerWidth >850)
    {
        container_t_login.style.display="block";
        container_t_register.style.display="block";
    }else{
        container_t_register.style.display="block";
        container_t_register.style.opacity="1";
        container_t_login.style.display="none";
        form_login.style.display="block";
        form_register.style.display="none";
        Container_login_register.style.left="0px";
    }
}
Pagewidth();
// animación para el login
function login_design(){
    if(window.innerWidth > 850)
    {
        form_register.style.display = "none";
        Container_login_register.style.left="10px";
        form_login.style.display="block";
        container_t_register.style.opacity="1";
        container_t_login.style.opacity="0";
    }else{
        form_register.style.display = "none";
        Container_login_register.style.left="0px";
        form_login.style.display="block";
        container_t_register.style.display="block";
        container_t_login.style.display="none";
    }
    
   }

// animación para el registro
function register_design(){
    if(window.innerWidth > 850)
    {
        form_register.style.display = "block";
        Container_login_register.style.left="410px";
        form_login.style.display="none";
        container_t_register.style.opacity="0";
        container_t_login.style.opacity="1";
    }
    else
    {
        form_register.style.display = "block";
        Container_login_register.style.left="0px";
        form_login.style.display="none";
        container_t_register.style.display="none";
        container_t_login.style.display="block";
        container_t_login.style.opacity="1";
    }
 
}

