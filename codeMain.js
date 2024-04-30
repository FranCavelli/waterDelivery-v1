var perfil = document.getElementsByClassName('profile')[0],
    perfilExpander = document.getElementsByClassName('expandirOpcionesPerfilOculto')[0],
    contadorClicksUsuario = 0;

var clientes = document.getElementsByClassName('clientes')[0],
    clientesExpandir = document.getElementsByClassName('expandirOpcionesClientesOculto')[0],
    contadorClicksClientes = 0;

var repartidores = document.getElementsByClassName('repartidores')[0], 
    repartidoresExpandir = document.getElementsByClassName('expandirOpcionesClientesRepartidoresOculto')[0],
    contadorClicksRepartidores = 0;

var productos = document.getElementsByClassName('productos')[0],
    productosExpandir = document.getElementsByClassName('expandirOpcionesProductosOculto')[0],
    contadorClicksProductos = 0;

var reparto = document.getElementsByClassName('reparto')[0],
    repartoExpandir = document.getElementsByClassName('expandirOpcionesRepartoOculto')[0],
    contadorClicksReparto = 0;

var revendedores = document.getElementsByClassName('revendedores')[0],
    revendedoresExpandir = document.getElementsByClassName('expandirOpcionesrevendedoresOculto')[0],
    contadorClicksrevendedores = 0;

function clickPerfilExpandir() {
    if(contadorClicksUsuario==0){
        perfilExpander.classList.remove('expandirOpcionesPerfilOculto');
        perfilExpander.classList.add('expandirOpcionesPerfil');
        contadorClicksUsuario=1;
        clientesExpandir.classList.remove('expandirOpcionesClientes');
        clientesExpandir.classList.add('expandirOpcionesClientesOculto');
        contadorClicksClientes=0;
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidores=0;
        productosExpandir.classList.add('expandirOpcionesProductosOculto');
        productosExpandir.classList.remove('expandirOpcionesProductos');
        contadorClicksProductos=0;
        repartoExpandir.classList.add('expandirOpcionesRepartoOculto');
        repartoExpandir.classList.remove('expandirOpcionesReparto');
        contadorClicksReparto=0;
        revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
        contadorClicksrevendedores=0;
        expandirMas.classList.remove('expandirOpcionesMas');
        expandirMas.classList.add('expandirOpcionesmasOculto');
        contadorClicksMas=0;
    }else{
        perfilExpander.classList.add('expandirOpcionesPerfilOculto');
        perfilExpander.classList.remove('expandirOpcionesPerfil');
        contadorClicksUsuario=0;
    }
}

function clickClientesExpandir() {
    if(contadorClicksClientes==0){
        clientesExpandir.classList.remove('expandirOpcionesClientesOculto');
        clientesExpandir.classList.add('expandirOpcionesClientes');
        contadorClicksClientes=1;
        perfilExpander.classList.add('expandirOpcionesPerfilOculto');
        perfilExpander.classList.remove('expandirOpcionesPerfil');
        contadorClicksUsuario=0;
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidores=0;
        productosExpandir.classList.add('expandirOpcionesProductosOculto');
        productosExpandir.classList.remove('expandirOpcionesProductos');
        contadorClicksProductos=0;
        repartoExpandir.classList.add('expandirOpcionesRepartoOculto');
        repartoExpandir.classList.remove('expandirOpcionesReparto');
        contadorClicksReparto=0;
        revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
        contadorClicksrevendedores=0;
        expandirMas.classList.remove('expandirOpcionesMas');
        expandirMas.classList.add('expandirOpcionesmasOculto');
        contadorClicksMas=0;
    }else{  
    clientesExpandir.classList.remove('expandirOpcionesClientes');
    clientesExpandir.classList.add('expandirOpcionesClientesOculto');
    contadorClicksClientes=0;
    }
}

function clickRepartidoresExpandir() {
    if(contadorClicksRepartidores==0){
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidores=1;
        perfilExpander.classList.add('expandirOpcionesPerfilOculto');
        perfilExpander.classList.remove('expandirOpcionesPerfil');
        contadorClicksUsuario=0;
        clientesExpandir.classList.remove('expandirOpcionesClientes');
        clientesExpandir.classList.add('expandirOpcionesClientesOculto');
        contadorClicksClientes=0;
        productosExpandir.classList.add('expandirOpcionesProductosOculto');
        productosExpandir.classList.remove('expandirOpcionesProductos');
        contadorClicksProductos=0;
        repartoExpandir.classList.add('expandirOpcionesRepartoOculto');
        repartoExpandir.classList.remove('expandirOpcionesReparto');
        contadorClicksReparto=0;
        revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
        contadorClicksrevendedores=0;
        expandirMas.classList.remove('expandirOpcionesMas');
        expandirMas.classList.add('expandirOpcionesmasOculto');
        contadorClicksMas=0;
    }else{
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidores=0;
    }
}

function clickProductosExpandir() {
    if(contadorClicksProductos==0){
        productosExpandir.classList.remove('expandirOpcionesProductosOculto');
        productosExpandir.classList.add('expandirOpcionesProductos');
        contadorClicksProductos=1;
        perfilExpander.classList.add('expandirOpcionesPerfilOculto');
        perfilExpander.classList.remove('expandirOpcionesPerfil');
        contadorClicksUsuario=0;
        clientesExpandir.classList.remove('expandirOpcionesClientes');
        clientesExpandir.classList.add('expandirOpcionesClientesOculto');
        contadorClicksClientes=0;
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidores=0;
        repartoExpandir.classList.add('expandirOpcionesRepartoOculto');
        repartoExpandir.classList.remove('expandirOpcionesReparto');
        contadorClicksReparto=0;
        revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
        contadorClicksrevendedores=0;
        expandirMas.classList.remove('expandirOpcionesMas');
        expandirMas.classList.add('expandirOpcionesmasOculto');
        contadorClicksMas=0;
    }else{
        productosExpandir.classList.add('expandirOpcionesProductosOculto');
        productosExpandir.classList.remove('expandirOpcionesProductos');
        contadorClicksProductos=0;
    }
}

function clickRepartoExpandir() {
    if(contadorClicksReparto==0){
        repartoExpandir.classList.remove('expandirOpcionesRepartoOculto');
        repartoExpandir.classList.add('expandirOpcionesReparto');
        contadorClicksReparto=1;
        perfilExpander.classList.add('expandirOpcionesPerfilOculto');
        perfilExpander.classList.remove('expandirOpcionesPerfil');
        contadorClicksUsuario=0;
        clientesExpandir.classList.remove('expandirOpcionesClientes');
        clientesExpandir.classList.add('expandirOpcionesClientesOculto');
        contadorClicksClientes=0;
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidores=0;
        productosExpandir.classList.add('expandirOpcionesProductosOculto');
        productosExpandir.classList.remove('expandirOpcionesProductos');
        contadorClicksProductos=0;
        revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
        contadorClicksrevendedores=0;
        expandirMas.classList.remove('expandirOpcionesMas');
        expandirMas.classList.add('expandirOpcionesmasOculto');
        contadorClicksMas=0;
    }else{
        repartoExpandir.classList.add('expandirOpcionesRepartoOculto');
        repartoExpandir.classList.remove('expandirOpcionesReparto');
        contadorClicksReparto=0;
    }
}

reparto.addEventListener('click', clickRepartoExpandir);

function clickRevendedoresExpandir() {
    if(contadorClicksrevendedores==0){
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.add('expandirOpcionesrevendedores');
        contadorClicksrevendedores=1;
        perfilExpander.classList.add('expandirOpcionesPerfilOculto');
        perfilExpander.classList.remove('expandirOpcionesPerfil');
        contadorClicksPerfil=0;
        clientesExpandir.classList.remove('expandirOpcionesClientes');
        clientesExpandir.classList.add('expandirOpcionesClientesOculto');
        contadorClicksClientes=0;
        repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
        repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
        contadorClicksRepartidoress=0;
        productosExpandir.classList.add('expandirOpcionesProductosOculto');
        productosExpandir.classList.remove('expandirOpcionesProductos');
        contadorClicksProductos=0;
        expandirMas.classList.remove('expandirOpcionesMas');
        expandirMas.classList.add('expandirOpcionesmasOculto');
        contadorClicksMas=0;
    }else{
        revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
        revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
        contadorClicksrevendedores=0;
    }
}


perfil.addEventListener('click', clickPerfilExpandir, true);
clientes.addEventListener('click', clickClientesExpandir, true);
repartidores.addEventListener('click', clickRepartidoresExpandir, true);
productos.addEventListener('click', clickProductosExpandir, true);
revendedores.addEventListener('click', clickRevendedoresExpandir, true);

/*================ REPARTO ==================*/ 

var mas = document.getElementsByClassName('mas')[0],
    expandirMas = document.getElementsByClassName('expandirOpcionesmasOculto')[0],
    contadorClicksMas = 0;

    function clickMasExpandir() {
        if(contadorClicksMas==0){
            expandirMas.classList.remove('expandirOpcionesmasOculto');
            expandirMas.classList.add('expandirOpcionesMas');
            contadorClicksMas=1;
            clientesExpandir.classList.remove('expandirOpcionesClientes');
            clientesExpandir.classList.add('expandirOpcionesClientesOculto');
            contadorClicksClientes=0;
            repartidoresExpandir.classList.add('expandirOpcionesClientesRepartidoresOculto');
            repartidoresExpandir.classList.remove('expandirOpcionesClientesRepartidores');
            contadorClicksRepartidores=0;
            productosExpandir.classList.add('expandirOpcionesProductosOculto');
            productosExpandir.classList.remove('expandirOpcionesProductos');
            contadorClicksProductos=0;
            repartoExpandir.classList.add('expandirOpcionesRepartoOculto');
            repartoExpandir.classList.remove('expandirOpcionesReparto');
            contadorClicksReparto=0;
            revendedoresExpandir.classList.add('expandirOpcionesrevendedoresOculto');
            revendedoresExpandir.classList.remove('expandirOpcionesrevendedores');
            contadorClicksrevendedores=0;
        }else{
            expandirMas.classList.remove('expandirOpcionesMas');
            expandirMas.classList.add('expandirOpcionesmasOculto');
            contadorClicksMas=0;
        }
    }

    mas.addEventListener('click', clickMasExpandir, true);

var responsiveBoton = document.getElementsByClassName('responsiveMenuIcono')[0],
    responsiveMenu = document.getElementsByClassName('responsiveMenuDisMenu')[0],
    responsiveExt = document.getElementsByClassName('responsiveMenuDisExt')[0],
    cruz = document.getElementsByClassName('fa-xmark')[0],
    ContadorClicksResponsive = 0;

function clickResponsive(){
    if(ContadorClicksResponsive==0){
        responsiveMenu.classList.add('responsiveMenu');
        responsiveExt.classList.add('responsiveMenuExt');
        responsiveMenu.classList.remove('responsiveMenuDisMenu');
        responsiveExt.classList.remove('responsiveMenuDisExt');
        ContadorClicksResponsive=1;
    }else{
        responsiveMenu.classList.remove('responsiveMenu');
        responsiveExt.classList.remove('responsiveMenuExt');
        responsiveMenu.classList.add('responsiveMenuDisMenu');
        responsiveExt.classList.add('responsiveMenuDisExt');
        ContadorClicksResponsive=0;
    }
}

responsiveBoton.addEventListener('click', clickResponsive, true);

function clickCruzResponsive(){
    responsiveMenu.classList.remove('responsiveMenu');
    responsiveExt.classList.remove('responsiveMenuExt');
    responsiveMenu.classList.add('responsiveMenuDisMenu');
    responsiveExt.classList.add('responsiveMenuDisExt');
    ContadorClicksResponsive=0;
}

cruz.addEventListener('click', clickCruzResponsive, true);

//ESPONSIVE OPCIONES//

var usuariosResp = document.getElementsByClassName('usuariosResp')[0],
    usuariosRespOpc = document.getElementsByClassName('usuariosRespOpc')[0],
    usuariosRespOpc2 = document.getElementsByClassName('usuariosRespOpc2')[0],
    contadorClicksUsuarioResp = 0;

function clickUsuarioResp(){
    if(contadorClicksUsuarioResp==0){
        usuariosRespOpc.classList.remove('usuariosRespOpc');
        usuariosRespOpc.classList.add('clientesRespOpcADD');
        contadorClicksUsuarioResp = 1;
        if(usuariosRespOpc2 != undefined){
            usuariosRespOpc2.classList.remove('usuariosRespOpc2');
            usuariosRespOpc2.classList.add('clientesRespOpcADD');
        }
        productosRespOpc.classList.add('productosRespOpc');
        contadorClicksProductosResp = 0;
        if(usuariosRespOpc2 != undefined){
            productosRespOpc2.classList.add('productosRespOpc2');
        }
        if(usuariosRespOpc2 != undefined){
            masRespOpc.classList.add('masRespOpc');
            masRespOpc2.classList.add('masRespOpc2');
            contadorClicksMasResp = 0;
            revendedoresRespOpc.classList.add('revendedoresRespOpc');
            revendedoresRespOpc2.classList.add('revendedoresRespOpc2');
            contadorClicksrevendedoresResp = 0;
        }
        if(usuariosRespOpc2 != undefined){
            repartoRespOpc.classList.add('repartoRespOpc');
        }
        contadorClicksRepartoResp = 0;
        clientesRespOpc.classList.add('clientesRespOpc');
        contadorClicksClientesResp = 0;
        if(usuariosRespOpc2 != undefined){
            clientesRespOpc2.classList.add('clientesRespOpc2');
        }
    }else{
        usuariosRespOpc.classList.add('usuariosRespOpc');
        if(usuariosRespOpc2 != undefined){
            usuariosRespOpc2.classList.add('usuariosRespOpc2');
        }
        contadorClicksUsuarioResp = 0;
    }
}

usuariosResp.addEventListener('click', clickUsuarioResp, true);

//
var clientesResp = document.getElementsByClassName('clientesResp')[0],
    clientesRespOpc = document.getElementsByClassName('clientesRespOpc')[0],
    clientesRespOpc2 = document.getElementsByClassName('clientesRespOpc2')[0],
    contadorClicksClientesResp = 0;

function clickClientesResp(){
    if(contadorClicksClientesResp==0){
        clientesRespOpc.classList.remove('clientesRespOpc');
        clientesRespOpc.classList.add('clientesRespOpcADD');
        if(usuariosRespOpc2 != undefined){
            clientesRespOpc2.classList.remove('clientesRespOpc2');
            clientesRespOpc2.classList.add('clientesRespOpcADD');
        }
        contadorClicksClientesResp = 1;
        productosRespOpc.classList.add('productosRespOpc');
        if(usuariosRespOpc2 != undefined){
            productosRespOpc2.classList.add('productosRespOpc2');
        }
        contadorClicksProductosResp = 0;
        if(usuariosRespOpc2 != undefined){
            masRespOpc.classList.add('masRespOpc');
            masRespOpc2.classList.add('masRespOpc2');
            contadorClicksMasResp = 0;
            revendedoresRespOpc.classList.add('revendedoresRespOpc');
            revendedoresRespOpc2.classList.add('revendedoresRespOpc2');
            contadorClicksrevendedoresResp = 0;
        }
        if(usuariosRespOpc2 != undefined){
            repartoRespOpc.classList.add('repartoRespOpc');
        }
        contadorClicksRepartoResp = 0;
        usuariosRespOpc.classList.add('usuariosRespOpc');
        if(usuariosRespOpc2 != undefined){
            usuariosRespOpc2.classList.add('usuariosRespOpc2');
        }
        contadorClicksUsuarioResp = 0;
    }else{
        clientesRespOpc.classList.add('clientesRespOpc');
        if(usuariosRespOpc2 != undefined){
            clientesRespOpc2.classList.add('clientesRespOpc2');
        }
        contadorClicksClientesResp = 0;
    }
}

clientesResp.addEventListener('click', clickClientesResp, true);

var productosResp = document.getElementsByClassName('productosResp')[0],
    productosRespOpc = document.getElementsByClassName('productosRespOpc')[0],
    productosRespOpc2 = document.getElementsByClassName('productosRespOpc2')[0],
    contadorClicksProductosResp = 0;

function clickProductosResp(){
    if(contadorClicksProductosResp==0){
        productosRespOpc.classList.remove('productosRespOpc');
        if(usuariosRespOpc2 != undefined){
            productosRespOpc2.classList.remove('productosRespOpc2');
            productosRespOpc2.classList.add('clientesRespOpcADD');
        }
        productosRespOpc.classList.add('clientesRespOpcADD');
        contadorClicksProductosResp = 1;
        clientesRespOpc.classList.add('clientesRespOpc');
        if(usuariosRespOpc2 != undefined){
            clientesRespOpc2.classList.add('clientesRespOpc2');
        }
        contadorClicksClientesResp = 0;
        if(usuariosRespOpc2 != undefined){
            masRespOpc.classList.add('masRespOpc');
            masRespOpc2.classList.add('masRespOpc2');
            contadorClicksMasResp = 0;
            revendedoresRespOpc.classList.add('revendedoresRespOpc');
            revendedoresRespOpc2.classList.add('revendedoresRespOpc2');
            contadorClicksrevendedoresResp = 0;
        }
        if(usuariosRespOpc2 != undefined){
            repartoRespOpc.classList.add('repartoRespOpc');
        }
        contadorClicksRepartoResp = 0;
        usuariosRespOpc.classList.add('usuariosRespOpc');
        if(usuariosRespOpc2 != undefined){
            usuariosRespOpc2.classList.add('usuariosRespOpc2');
        }
        contadorClicksUsuarioResp = 0;
    }else{
        productosRespOpc.classList.add('productosRespOpc');
        if(usuariosRespOpc2 != undefined){
            productosRespOpc2.classList.add('productosRespOpc2');
        }
        contadorClicksProductosResp = 0;
    }
}

productosResp.addEventListener('click', clickProductosResp, true);

//
var masResp = document.getElementsByClassName('masResp')[0],
    masRespOpc = document.getElementsByClassName('masRespOpc')[0],
    masRespOpc2 = document.getElementsByClassName('masRespOpc2')[0],
    masRespOpc3 = document.getElementsByClassName('masRespOpc3')[0],
    masRespOpc4 = document.getElementsByClassName('masRespOpc4')[0],
    contadorClicksMasResp = 0;

function clickMasResp(){
    if(contadorClicksMasResp==0){
        masRespOpc.classList.remove('masRespOpc');
        masRespOpc2.classList.remove('masRespOpc2');
        masRespOpc3.classList.remove('masRespOpc3');
        masRespOpc4.classList.remove('masRespOpc4');
        masRespOpc.classList.add('clientesRespOpcADD');
        masRespOpc2.classList.add('clientesRespOpcADD');
        masRespOpc3.classList.add('clientesRespOpcADD');
        masRespOpc4.classList.add('clientesRespOpcADD');
        contadorClicksMasResp = 1;
        clientesRespOpc.classList.add('clientesRespOpc');
        clientesRespOpc2.classList.add('clientesRespOpc2');
        contadorClicksClientesResp = 0;
        productosRespOpc.classList.add('productosRespOpc');
        productosRespOpc2.classList.add('productosRespOpc2');
        contadorClicksProductosResp = 0;
        revendedoresRespOpc.classList.add('revendedoresRespOpc');
        revendedoresRespOpc2.classList.add('revendedoresRespOpc2');
        contadorClicksrevendedoresResp = 0;
        if(usuariosRespOpc2 != undefined){
            repartoRespOpc.classList.add('repartoRespOpc');
        }
        contadorClicksRepartoResp = 0;
        usuariosRespOpc.classList.add('usuariosRespOpc');
        usuariosRespOpc2.classList.add('usuariosRespOpc2');
        contadorClicksUsuarioResp = 0;
    }else{
        masRespOpc.classList.add('masRespOpc');
        masRespOpc2.classList.add('masRespOpc2');
        masRespOpc3.classList.add('masRespOpc3');
        masRespOpc4.classList.add('masRespOpc4');
        contadorClicksMasResp = 0;
    }
}

if(usuariosRespOpc2 != undefined){
    masResp.addEventListener('click', clickMasResp, true);
}
//
var revendedoresResp = document.getElementsByClassName('revendedoresResp')[0],
    revendedoresRespOpc = document.getElementsByClassName('revendedoresRespOpc')[0],
    revendedoresRespOpc2 = document.getElementsByClassName('revendedoresRespOpc2')[0],
    contadorClicksrevendedoresResp = 0;

function clickRevendedoresResp(){
    if(contadorClicksrevendedoresResp==0){
        revendedoresRespOpc.classList.remove('revendedoresRespOpc');
        revendedoresRespOpc2.classList.remove('revendedoresRespOpc2');
        revendedoresRespOpc.classList.add('clientesRespOpcADD');
        revendedoresRespOpc2.classList.add('clientesRespOpcADD');
        contadorClicksrevendedoresResp = 1;
        clientesRespOpc.classList.add('clientesRespOpc');
        clientesRespOpc2.classList.add('clientesRespOpc2');
        contadorClicksClientesResp = 0;
        productosRespOpc.classList.add('productosRespOpc');
        productosRespOpc2.classList.add('productosRespOpc2');
        contadorClicksProductosResp = 0;
        repartoRespOpc.classList.add('repartoRespOpc');
        contadorClicksRepartoResp = 0;
        masRespOpc.classList.add('masRespOpc');
        masRespOpc2.classList.add('masRespOpc2');
        contadorClicksMasResp = 0;
        usuariosRespOpc.classList.add('usuariosRespOpc');
        usuariosRespOpc2.classList.add('usuariosRespOpc2');
        contadorClicksUsuarioResp = 0;
    }else{
        revendedoresRespOpc.classList.add('revendedoresRespOpc');
        revendedoresRespOpc2.classList.add('revendedoresRespOpc2');
        contadorClicksrevendedoresResp = 0;
    }
}

if(usuariosRespOpc2 != undefined){
    revendedoresResp.addEventListener('click', clickRevendedoresResp, true);
}

//
var repartoResp = document.getElementsByClassName('repartoResp')[0],
    repartoRespOpc = document.getElementsByClassName('expandirOpcionesRepartoLista')[0],
    repartoRespOpc2 = document.getElementsByClassName('expandirOpcionesRepartoLista2')[0],
    repartoRespOpc3 = document.getElementsByClassName('expandirOpcionesRepartoLista3')[0],
    repartoRespOpc4 = document.getElementsByClassName('expandirOpcionesRepartoLista4')[0],
    repartoRespOpc5 = document.getElementsByClassName('expandirOpcionesRepartoLista5')[0],
    repartoRespOpc6 = document.getElementsByClassName('expandirOpcionesRepartoLista6')[0],
    repartoRespOpc7 = document.getElementsByClassName('expandirOpcionesRepartoLista7')[0],
    repartoRespOpc8 = document.getElementsByClassName('expandirOpcionesRepartoLista8')[0],
    repartoRespOpc9 = document.getElementsByClassName('expandirOpcionesRepartoLista9')[0],
    repartoRespOpc10 = document.getElementsByClassName('expandirOpcionesRepartoLista10')[0],
    repartoRespOpc11 = document.getElementsByClassName('expandirOpcionesRepartoLista11')[0],
    repartoRespOpc12 = document.getElementsByClassName('expandirOpcionesRepartoLista12')[0],
    repartoRespOpc13 = document.getElementsByClassName('expandirOpcionesRepartoLista13')[0],
    repartoRespOpcc4 = document.getElementsByClassName('repartoRespOpc4')[0],
    contadorClicksRepartoResp = 0;

function clickRepartoResp(){
    if(contadorClicksRepartoResp==0){
        if(repartoRespOpc != undefined){
            repartoRespOpc.style.display="block";
            repartoRespOpc.style.background="#fff";
        }
        if(repartoRespOpc2 != undefined){
            repartoRespOpc2.style.display="block";
            repartoRespOpc2.style.background="#fff";
        }
        if(repartoRespOpc3 != undefined){
            repartoRespOpc3.style.display="block";
            repartoRespOpc3.style.background="#fff";
        }
        if(repartoRespOpc4 != undefined){
            repartoRespOpc4.style.display="block";
            repartoRespOpc4.style.background="#fff";
        }
        if(repartoRespOpc5 != undefined){
            repartoRespOpc5.style.display="block";
            repartoRespOpc5.style.background="#fff";
        }
        if(repartoRespOpc6 != undefined){
            repartoRespOpc6.style.display="block";
            repartoRespOpc6.style.background="#fff";
        }
        if(repartoRespOpc7 != undefined){
            repartoRespOpc7.style.display="block";
            repartoRespOpc7.style.background="#fff";
        }
        if(repartoRespOpc8 != undefined){
            repartoRespOpc8.style.display="block";
            repartoRespOpc8.style.background="#fff";
        }
        if(repartoRespOpc9 != undefined){
            repartoRespOpc9.style.display="block";
            repartoRespOpc9.style.background="#fff";
        }
        if(repartoRespOpc10 != undefined){
            repartoRespOpc10.style.display="block";
            repartoRespOpc10.style.background="#fff";
        }
        if(repartoRespOpc11 != undefined){
            repartoRespOpc11.style.display="block";
            repartoRespOpc11.style.background="#fff";
        }
        if(repartoRespOpc12 != undefined){
            repartoRespOpc12.style.display="block";
            repartoRespOpc12.style.background="#fff";
        }
        if(repartoRespOpc13 != undefined){
            repartoRespOpc13.style.display="block";
            repartoRespOpc13.style.background="#fff";
        }
        if(repartoRespOpcc4 != undefined){
            repartoRespOpcc4.style.display="block";
            repartoRespOpcc4.style.background="#8abc00";
        }
        contadorClicksRepartoResp = 1;
        if(usuariosRespOpc2 != undefined){
            revendedoresRespOpc.classList.add('revendedoresRespOpc');
            revendedoresRespOpc2.classList.add('revendedoresRespOpc2');
            contadorClicksrevendedoresResp = 0;
            masRespOpc.classList.add('masRespOpc');
            masRespOpc2.classList.add('masRespOpc2');
            contadorClicksMasResp = 0;
            productosRespOpc2.classList.add('productosRespOpc2');
            clientesRespOpc2.classList.add('clientesRespOpc2');
        }
        productosRespOpc.classList.add('productosRespOpc');
        contadorClicksProductosResp = 0;
        clientesRespOpc.classList.add('clientesRespOpc');
        contadorClicksClientesResp = 0;
        usuariosRespOpc.classList.add('usuariosRespOpc');
        if(usuariosRespOpc2 != undefined){
            usuariosRespOpc2.classList.add('usuariosRespOpc2');
        }
        contadorClicksUsuarioResp = 0;
    }else{
        if(repartoRespOpc != undefined){
        repartoRespOpc.style.display="none";
        }
        if(repartoRespOpc2 != undefined){
        repartoRespOpc2.style.display="none";
        }
        if(repartoRespOpc3 != undefined){
        repartoRespOpc3.style.display="none";
        }
        if(repartoRespOpc4 != undefined){
        repartoRespOpc4.style.display="none";
        }
        if(repartoRespOpcc4 != undefined){
        repartoRespOpcc4.style.display="none";
        }
        if(repartoRespOpc5 != undefined){
        repartoRespOpc5.style.display="none";
        }
        if(repartoRespOpc6 != undefined){
        repartoRespOpc6.style.display="none";
        }
        if(repartoRespOpc7 != undefined){
        repartoRespOpc7.style.display="none";
        }
        if(repartoRespOpc8 != undefined){
        repartoRespOpc8.style.display="none";
        }
        if(repartoRespOpc9 != undefined){
        repartoRespOpc9.style.display="none";
        }
        if(repartoRespOpc10 != undefined){
        repartoRespOpc10.style.display="none";
        }
        if(repartoRespOpc11 != undefined){
        repartoRespOpc11.style.display="none";
        }
        if(repartoRespOpc12 != undefined){
        repartoRespOpc12.style.display="none";
        }
        if(repartoRespOpc13 != undefined){
        repartoRespOpc13.style.display="none";
        }
        contadorClicksRepartoResp = 0;
    }
}

repartoResp.addEventListener('click', clickRepartoResp, true);