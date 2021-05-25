//cambiar entre tablas
function tabUser(evt, tabAluPro) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabAluPro).style.display = "block";
    evt.currentTarget.className += " active";
}
//validar formulario
function validar() {
    nom = document.getElementById('nom').value
    ape = document.getElementById('ape').value
    ape2 = document.getElementById('ape2').value
    dni = document.getElementById('dni').value
    tel = document.getElementById('tel').value
    email = document.getElementById('email').value
    curs = document.getElementById('curs').value
    mensaje = document.getElementById('mensaje')

    if (user == '' && pass == '') {
        mensaje.innerHTML = 'Campo usuario y contraseña obligatorios'
        return false
    } else if (user == '') {
        mensaje.innerHTML = 'Campo usuario obligatorio'
        return false
    } else if (pass == '') {
        mensaje.innerHTML = 'Campo contraseña obligatorio'
        return false
    } else {
        return true
    }

}
//animacion carga
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 100);
    var i, tabcontent, tablinks;
    var tipo = document.getElementById("tipo").value
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tipo).style.display = "block";
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}