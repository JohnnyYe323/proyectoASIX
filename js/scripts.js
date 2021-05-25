function validar() {
    user = document.getElementById('user').value
    pass = document.getElementById('pass').value
    mensaje = document.getElementById('mensaje')

    if (user == '' && pass == '') {
        mensaje.innerHTML = 'Campo usuario y <br> contraseña obligatorios'
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