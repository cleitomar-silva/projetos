var formLogin       =   document.getElementById("login");
var formCadLogin    =   document.getElementById("cad-login");
var btnRegistrar    =   document.getElementById("btn-registrar");
var btnLogin        =   document.getElementById("btn-login");

btnRegistrar.onclick = function () {
    formLogin.style.display = "none";
    formCadLogin.style.display = "block";
}

btnLogin.onclick = function(){
    formCadLogin.style.display = "none";
    formLogin.style.display = "block";
}



