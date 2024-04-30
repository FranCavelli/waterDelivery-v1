var registrarEmpleado = document.getElementsByClassName('registerEmpleadoHide')[0],
    empleadoImg = document.getElementsByClassName('empleadoImg')[0],
    dueñoImg = document.getElementsByClassName('dueñoImg')[0],
    registrarDueño = document.getElementsByClassName('registerDueñoHide')[0],
    contadorClicksEmpleado=0,
    contadorClicksDueño=0;

var BotonEmpleadoRegistrarse = document.getElementsByClassName('registrarseBotton')[0],
    PestañaRegistrarseEmpleado = document.getElementsByClassName('opcionRegistrarseEmpleadoOculto')[0],
    contadorClicksEmpleadoRegistrarse=0;

function clickImgEmpleado() {
    if(contadorClicksEmpleado==0){
        registrarEmpleado.classList.remove('registerEmpleadoHide');
        registrarEmpleado.classList.add('registerEmpleado');
        contadorClicksEmpleado=1;
        registrarDueño.classList.remove('registerDueño');
        registrarDueño.classList.add('registerDueñoHide');
        contadorClicksDueño=0;
    }else{
        registrarEmpleado.classList.remove('registerEmpleado');
        registrarEmpleado.classList.add('registerEmpleadoHide');
        PestañaRegistrarseEmpleado.classList.remove('registrarseEmpleado');
        PestañaRegistrarseEmpleado.classList.add('opcionRegistrarseEmpleadoOculto');
        contadorClicksEmpleado=0;
        contadorClicksEmpleadoRegistrarse=0;
    }
}

function clickImgDueño() {
    if(contadorClicksDueño==0){
        registrarDueño.classList.remove('registerDueñoHide');
        registrarDueño.classList.add('registerDueño');
        contadorClicksDueño=1;
        registrarEmpleado.classList.remove('registerEmpleado');
        registrarEmpleado.classList.add('registerEmpleadoHide');
        contadorClicksEmpleado=0;
        PestañaRegistrarseEmpleado.classList.remove('registrarseEmpleado');
        PestañaRegistrarseEmpleado.classList.add('opcionRegistrarseEmpleadoOculto');
        contadorClicksEmpleadoRegistrarse=0;
    }else{
        registrarDueño.classList.remove('registerDueño');
        registrarDueño.classList.add('registerDueñoHide');
        contadorClicksDueño=0;
    }
}

empleadoImg.addEventListener('click', clickImgEmpleado, true);
dueñoImg.addEventListener('click', clickImgDueño, true);

function clickRegistrarseEmpleado() {
    if(contadorClicksEmpleadoRegistrarse== 0){
        PestañaRegistrarseEmpleado.classList.remove('opcionRegistrarseEmpleadoOculto');
        PestañaRegistrarseEmpleado.classList.add('registrarseEmpleado');
        registrarEmpleado.classList.remove('registerEmpleado');
        registrarEmpleado.classList.add('registerEmpleadoHide');
        contadorClicksEmpleado=1;
        contadorClicksEmpleadoRegistrarse=1;
    }else{
        registrarEmpleado.classList.remove('registerEmpleado');
        registrarEmpleado.classList.add('registerEmpleadoHide');
        PestañaRegistrarseEmpleado.classList.remove('registrarseEmpleado');
        PestañaRegistrarseEmpleado.classList.add('opcionRegistrarseEmpleadoOculto');
        contadorClicksEmpleado=0;
        contadorClicksEmpleadoRegistrarse=0;
    }
}

BotonEmpleadoRegistrarse.addEventListener('click', clickRegistrarseEmpleado, true);