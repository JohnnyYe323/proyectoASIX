var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 100);
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}

function validar_form() {
    var nom = document.getElementById('nom').value;
    var ape = document.getElementById('ape').value;
    var ape2 = document.getElementById('ape2').value;
    var tel = document.getElementById('tel').value;
    var email = document.getElementById('email').value;
    var curso = document.getElementById('dept').value;
    var re = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    var mensajeNom = document.getElementById('mensajeNom');
    var mensajeApe = document.getElementById('mensajeApe');
    var mensajeApe2 = document.getElementById('mensajeApe2');
    var mensajeTel = document.getElementById('mensajeTel');
    var mensajeMail = document.getElementById('mensajeMail');
    var mensajeCurso = document.getElementById('mensajeDept');
    var validar =true;
    mensajeNom.innerHTML = '';
    mensajeApe.innerHTML = '';
    mensajeApe2.innerHTML = '';
    mensajeTel.innerHTML = '';
    mensajeMail.innerHTML = '';
    mensajeCurso.innerHTML = '';

    if (/^[A-Z][a-z]*/.test(nom) == false) {
        mensajeNom.innerHTML = 'Este campo solo puede contener letras, </br> la primera ha de ser mayúscula.';
        mensajeNom.style.color = "red";
        validar=false;
    }
    if (/^[A-Z][a-z]*/.test(ape) == false) {
        mensajeApe.innerHTML = 'Este campo solo puede contener letras, </br> la primera ha de ser mayúscula.';
        mensajeApe.style.color = "red";
        validar=false;
    }
    if (/^[A-Z][a-z]*/.test(ape2) == false) {
        mensajeApe2.innerHTML = 'Este campo solo puede contener letras, </br> la primera ha de ser mayúscula.';
        mensajeApe2.style.color = "red";
        validar=false;
    } 
    if (!(/^\d{5}$/.test(tel))) {
        mensajeTel.innerHTML = 'Este campo debe tener 5 números.';
        mensajeTel.style.color = "red";
        validar=false;
    } 
    if (!re.test(email)) {
        mensajeMail.innerHTML = 'El email no es correcto.';
        mensajeMail.style.color = "red";
        validar=false;
    } 
    if (curso == null || curso == 0) {
        mensajeCurso.innerHTML = 'Debe seleccionar un departamento.';
        mensajeCurso.style.color = "red";
        validar=false;
    } 
    return validar;
    
}